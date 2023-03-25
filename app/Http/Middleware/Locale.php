<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Locale {

    public function handle(Request $request, Closure $next) {
        $userLocale = $request->getPreferredLanguage(config('locales'));

        app()->setLocale($userLocale);

        return $next($request);
    }
}