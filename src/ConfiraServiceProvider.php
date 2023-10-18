<?php

namespace Rapidez\Confira;

use Illuminate\Support\ServiceProvider;

class ConfiraServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rapidez-confira.php', 'rapidez-confira');
    }

    public function boot()
    {
        $this
            ->bootViews()
            ->bootPublishables();
    }

    public function bootViews() : self
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rapidez-confira');

        return $this;
    }

    public function bootPublishables() : self
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez-confira'),
        ], 'rapidez-confira-views');

        $this->publishes([
            __DIR__.'/../config/rapidez-confira.php' => config_path('rapidez-confira.php'),
        ], 'rapidez-confira-config');

        return $this;
    }
}
