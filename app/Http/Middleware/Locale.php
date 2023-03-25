<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;
use Illuminate\Http\Request;

class Locale {

    public function handle(Request $request, Closure $next) {
        if (Session::has('locale')) {
            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            if ($locale != 'en' && $locale != 'es') {
                $locale = 'en';
            }
        }

        App::setLocale($locale);

        return $next($request);
    }
}