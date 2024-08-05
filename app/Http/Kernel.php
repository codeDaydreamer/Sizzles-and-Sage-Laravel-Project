<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Other middleware entries...

    protected $routeMiddleware = [
        // Other middleware
        'redirect.if.authenticated' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    ];


    // Other methods...
}
