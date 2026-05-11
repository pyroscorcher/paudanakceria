<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use App\Http\Middleware\UserMiddleware; // <-- Ensure your middleware is imported here

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // 1. Correct Array Syntax for Middleware Aliases
        $middleware->alias([
            'user.access' => UserMiddleware::class,
        ]);

        // 2. Context-aware redirection for unauthenticated users
        $middleware->redirectGuestsTo(function (Request $request) {
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }
            return route('user.login');
        });
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();