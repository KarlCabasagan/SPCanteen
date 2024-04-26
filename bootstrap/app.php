<?php

use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckIfAdmin;
use App\Http\Middleware\CheckUserHasRole;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\LoggedIn;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('logged-in', [
            CheckAuth::class,
        ]);
        $middleware->appendToGroup('admin', [
            CheckIfAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
