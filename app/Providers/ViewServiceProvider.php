<?php

namespace App\Providers;

use App\Composers\CategoryComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'index', 'categories.index', 'categories.create', 'categories.edit',
            'products.index', 'products.create', 'products.edit'
        ], CategoryComposer::class);
    }
}
