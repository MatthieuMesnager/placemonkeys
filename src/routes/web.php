<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceholderImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('page.home');
Route::get('/{width}/{height?}', PlaceholderImageController::class);
