<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;

final class HomeController
{
    public function __invoke(): ViewContract
    {
        return View::make('pages.home');
    }
}
