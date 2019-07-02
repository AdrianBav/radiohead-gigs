<?php

namespace App\Providers;

use App\Concert;
use Illuminate\Support\Facades\View;
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
            $view->with('concerts', Concert::all());
        });
    }
}
