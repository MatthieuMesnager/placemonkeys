<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceholderImageController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/{width}/{height?}', PlaceholderImageController::class);
