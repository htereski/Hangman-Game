<?php

namespace App\Providers;

use App\Listeners\LoginListener;
use App\Services\GameService;
use App\Services\GameServiceImpl;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GameService::class, GameServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            'Illuminate\Auth\Events\Login',
            LoginListener::class
        );
    }
}
