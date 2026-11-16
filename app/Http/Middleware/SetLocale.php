<?php

namespace App\Http\Middleware;

use App\Models\News;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $lang = $request->query('lang');

        // Мова з параметра ?lang=xx запам'ятовується в сесії для наступних сторінок
        if (is_string($lang) && preg_match('/^[a-z]{2,5}$/', $lang)) {
            session(['locale' => $lang]);
        }

        app()->setLocale(session('locale', News::MAIN_LOCALE));

        return $next($request);
    }
}
