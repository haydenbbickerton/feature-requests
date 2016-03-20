<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            /*
                If anything is wrong with the JWT token,
                redirect to login.

                 TODO: This is so janky, redo it.
             */
            try {
                JWTAuth::parseToken()->authenticate();
            } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                return $this->redirectToLogin();
            } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return $this->redirectToLogin();
            } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
                return $this->redirectToLogin();
            }

            return redirect(env('APP_UI_URL'));
        }

        return $next($request);
    }

    private function redirectToLogin()
    {
        Auth::logout();
        return redirect()
                ->route('auth.login')
                ->with('message', 'Your session has exired. Please log in again.')
                ->with('alert-class', 'alert-warning');
    }
}
