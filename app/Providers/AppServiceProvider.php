<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Debug query log.
        if ($this->app->environment('local')) {
            $this->app['db']->connection()->enableQueryLog();
            $this->app['events']->listen('kernel.handled', function ($request, $response) {
                if ($request->has('sql-debug')) {
                    $queries = $this->app['db']->getQueryLog();
                    dd($queries);
                }
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        // header('Access-Control-Allow-Headers: Origin, Content-Type, Access-Control-Allow-Headers, Authorization, X-CSRF-TOKEN, X-Requested-With');
    }
}
