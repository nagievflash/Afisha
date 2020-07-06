<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Relations\Relation;


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
         Date::setlocale(config('app.locale'));

         Relation::morphMap([
            'events' => 'App\Event',
        ]);
     }
}
