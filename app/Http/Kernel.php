<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Other middleware entries...

    protected $routeMiddleware = [
        // Other middleware entries...

        'guest' => \App\Http\Middleware\RedirectIfGuest::class,
    ];

    // Other methods...
}
