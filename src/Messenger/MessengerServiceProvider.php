<?php

namespace ArtisanAli\Messenger;

use Illuminate\Support\ServiceProvider;
use ArtisanAli\Messenger\Contracts\MessageInterface;
use ArtisanAli\Messenger\Contracts\MessageThreadInterface;
use ArtisanAli\Messenger\Contracts\MessageThreadParticipantInterface;

class MessengerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'messenger');

        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../config/messenger.php' => config_path('messenger.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/messenger.php', 'messenger');

        $this->app->singleton('messenger', function ($app) {
            return new Messenger();
        });

        $this->app->bind(MessageInterface::class, config('messenger.models.message'));
        $this->app->bind(MessageThreadInterface::class, config('messenger.models.thread'));
        $this->app->bind(MessageThreadParticipantInterface::class, config('messenger.models.participant'));
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['messenger'];
    }
}
