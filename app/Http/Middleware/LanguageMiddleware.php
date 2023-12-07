<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Session;
use App\Models\Language;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('locale')){
            Session::put('locale',App::getLocale());
		}
        App::setLocale(session('locale'));

        $currLang = Language::where('code',session('locale'))->where('status', 1)->first();

        // Languages other than current selcetd language
        $languagesNotCurrent = Language::where('code','!=',session('locale'))
                                ->where('status', 1)->get();
       
        View::share('clang', $currLang);
        View::share('languages', $languagesNotCurrent);

        return $next($request);
    }
}
