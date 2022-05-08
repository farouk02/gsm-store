<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $session_locale = session('locale');
        if (in_array($session_locale, config('app.locales'))) {
            $locale = $session_locale;
        } else {
            $locale = config('app.locale');
        }
        App::setLocale($locale);

        return $next($request);
    }
}
