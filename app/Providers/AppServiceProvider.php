<?php

namespace App\Providers;

use AlgoliaSearch\Client;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Expose Algolia client 🚀
         * Scout doesn't expose it by default, but it's
         * useful to clear indexes, generate API keys and many other operations.
         */
        $this->app->singleton(Client::class, function () {
            return new Client(config('scout.algolia.id'), config('scout.algolia.secret'));
        });
    }
}
