<?php

namespace App\Providers;

use App\Partner\Handlers\PartnerHandlerFactory;
use App\Partner\Handlers\PartnerHandlerFactoryInterface;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PartnerHandlerFactoryInterface::class, PartnerHandlerFactory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
