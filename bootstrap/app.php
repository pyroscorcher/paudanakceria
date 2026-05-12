<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // Customizing the unauthenticated redirect logic
        $middleware->redirectGuestsTo(function (Request $request) {
            // If the guest attempted to access an admin route
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }

            // Default fallback for standard users
            return route('user.login');
        });

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();