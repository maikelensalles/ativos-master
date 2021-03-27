<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\NovidadeObserver;
use App\Novidade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Novidade::observe(NovidadeObserver::class);
    }
}
