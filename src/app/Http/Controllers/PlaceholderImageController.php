<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PlaceholderImageRequest;
use App\Images\Modifiers\BlurModifier;
use App\Images\Modifiers\GreyscaleModifier;
use App\Images\Modifiers\SepiaModifier;
use App\Images\Modifiers\SpookyModifier;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Laravel\Facades\Image;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

final class PlaceholderImageController
{
    public function __invoke(PlaceholderImageRequest $request): Response
    {
        if ($request->shouldBypassCache()) {
            return $this->buildResponse(
                image: $this->generateImage($request),
            );
        }

        /**
         * Cache key generation
         */
        $cacheKey = sprintf(
            'image.%dx%d.%s',
            $request->validated('width'),
            $request->validated('height'),
            md5(json_encode($request->modifiers()) ?: '')
        );

        return Cache::remember(
            key: $cacheKey,
            ttl: now()->addDay(),
            callback: fn() => $this->buildResponse(
                image: $this->generateImage($request),
            ),
        );
    }

    private function generateImage(PlaceholderImageRequest $request): ImageInterface
    {
        /**
         * Retrieve images
         */
        $availableImages = new Collection(Storage::disk('local')->allFiles('images'));
        $randomlyPickedImageFilePath = $availableImages->random();

        /**
         * Create image object
         */
        $image = Image::read(Storage::disk('local')->path($randomlyPickedImageFilePath))->cover(
            width: intval($request->validated('width')),
            height: intval($request->validated('height')),
        );

        /**
         * Apply modifiers
         */
        $modifiers = $request->modifiers();

        foreach ($modifiers as $key => $value) {
            $image = match ($key) {
                'greyscale' => $image->modify(new GreyscaleModifier()),
                'sepia' => $image->modify(new SepiaModifier()),
                'spooky' => $image->modify(new SpookyModifier()),
                'blur' => $image->modify(new BlurModifier(intval($value)))
            };
        }

        return $image;
    }

    private function buildResponse(ImageInterface $image): Response
    {
        $image = $image->toWebp();

        return new Response($image, SymfonyResponse::HTTP_OK, [
            'Content-Type' => $image->mediaType(),
            'Content-Length' => $image->size(),
            'Cache-Control' => 'public, max-age=86400',
            'Etag' => md5($image->toString()),
        ]);
    }
}
