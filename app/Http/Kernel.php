<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        // ... Laravel defaults ...

        // ✅ Custom Middleware
        'isAdmin' => \App\Http\Middleware\IsAdmin::class,
       'isMember' => \App\Http\Middleware\IsMember::class,
        //'isLeader' => \App\Http\Middleware\IsLeader::class,
    ];
}
