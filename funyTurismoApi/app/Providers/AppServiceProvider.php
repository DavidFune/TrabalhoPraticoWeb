<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    // injeção de dependencia
    public function register()
    {
        $this->app->bind(
         'App\Repositories\PacoteRepositoryInterface', 
         'App\Repositories\PacoteRepositoryEloquent');
    }
}
