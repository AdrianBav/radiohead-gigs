<?php

namespace App\Providers;

use App\Concert;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.partials.menu', 'layouts.tiles.concerts'], function ($view) {
            $allConcerts = Cache::rememberForever('allConcerts', function () {
                return Concert::all();
            });

            $view->with('concerts', $allConcerts);
        });
    }
}
