<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Intervention\Image\Laravel\Facades\Image;

final class CreditsController
{
    public function __invoke(): ViewContract
    {
        $credits = Cache::rememberForever('credits', function () {
            return (new Collection(Storage::disk('local')->allFiles('images')))->transform(function (string $filePath) {
                // Keep only the file name from the given path
                $explodedPath = explode('/', $filePath);
                $fileName = array_pop($explodedPath);

                // Remove the filename extension
                $explodedFileName = explode('.', $fileName);
                $cleanFileName = array_shift($explodedFileName);

                // Retrieve image info, author, image ID, etc...
                $imageInfo = explode('-', $cleanFileName, 2);
                $unsplashImageAuthor = reset($imageInfo);
                $unsplashImageId = end($imageInfo);

                $imageData = Image::read(Storage::disk('local')->path($filePath))->cover(
                    width: 400,
                    height: 400,
                )->toWebp()->toDataUri();

                return [
                    'id' => $unsplashImageId,
                    'author' => $unsplashImageAuthor,
                    'imageData' => $imageData,
                    'links' => [
                        'author' => "https://unsplash.com/@$unsplashImageAuthor",
                        'image' => "https://unsplash.com/photos/$unsplashImageId",
                    ],
                ];
            });
        });

        $paginatedCredits = (new LengthAwarePaginator(
            items: $credits->forPage(Paginator::resolveCurrentPage() ?: 1, 12),
            total: $credits->count(),
            perPage: 12,
            currentPage: Paginator::resolveCurrentPage() ?: 1,
        ))->withPath(route('page.credits'));

        return View::make('pages.credits')->with('credits', $paginatedCredits);
    }
}
