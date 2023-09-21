<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNoFileUploaded
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Check if the user has uploaded files
            $user = Auth::user();

            if (!$user->hasUploadedFiles()) {
                // Redirect to the upload page if the user hasn't uploaded any files
                return redirect('/upload');
            }
        }

        return $next($request);

    }
}
