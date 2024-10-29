<?php

namespace Rapidez\Confira;

use Illuminate\Support\ServiceProvider;

class ConfiraServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Normally views will we registred while booting but we're extending
        // the checkout theme so we need to register them earlier.
        $this->bootViews();

        $this->mergeConfigFrom(__DIR__.'/../config/rapidez/confira.php', 'rapidez.confira');
    }

    public function boot()
    {
        $this
            ->bootPublishables()
            ->bootTranslations();
    }

    public function bootViews() : self
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rapidez-ct');

        return $this;
    }

    public function bootPublishables() : self
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez-ct'),
        ], 'rapidez-confira-views');

        $this->publishes([
            __DIR__.'/../config/rapidez/confira.php' => config_path('rapidez/confira.php'),
        ], 'rapidez-confira-config');

        return $this;
    }

    protected function bootTranslations(): self
    {
        $this->loadJsonTranslationsFrom(__DIR__ . '/../lang');

        return $this;
    }
}
