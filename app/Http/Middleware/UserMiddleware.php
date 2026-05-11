<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // 1. Ensure the user is authenticated (though the 'auth' middleware usually handles this)
        if (!$user) {
            return redirect()->route('user.login');
        }

        // 2. Custom Logic: Example - Ensure the user has completed their Pendaftaran
        // If the 'nisn' is null, it means they haven't finished their profile
        if (empty($user->nisn)) {
            return redirect()->route('user.daftar')
                ->with('warning', 'Anda harus melengkapi data pendaftaran terlebih dahulu.');
        }

        // 3. If all checks pass, allow the request to proceed to the controller
        return $next($request);
    }
}