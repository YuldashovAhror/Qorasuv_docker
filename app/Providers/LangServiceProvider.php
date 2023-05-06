<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LangServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view)
        {
            if (session()->get('locale') == '') {
                session()->put('locale', 'ru');
                app()->setLocale('ru');
            } else {
                app()->setLocale(session()->get('locale'));
            }
            $lang = session()->get('locale');

            $view->with(['lang'=>$lang]);
        });
    }
}
