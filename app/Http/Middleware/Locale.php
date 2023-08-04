<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App;
use App\Enums\Locale as EnumsLocale;
use Config;
use Session;

class Locale
{
    private $locale;

    public function __construct(EnumsLocale $locale)
    {
        $this->locale = $locale;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentLocale = Session::get('locale');
        if (empty($currentLocale)) {
            $enableLocale = env('ENABLE_LOCALE', 'en');

            if (!in_array($enableLocale, $this->locale::LIST_LOCALE)) {
                $enableLocale = 'en';
            }

            Session::put('locale', $enableLocale);
            App::setLocale($enableLocale);

            return $next($request);
        }

        if (in_array($currentLocale, Config::get('app.locales'))) {
            $locale = $currentLocale;
        } else {
            $locale = Config::get('app.locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
