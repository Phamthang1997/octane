<?php

namespace App\Providers;

use App\Services\Contracts\UserServiceInterface;
use App\Services\UserService;
use Carbon\Laravel\ServiceProvider;

class ContainerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->bindServices();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Bind services
     *
     * @return void
     */
    private function bindServices(): void
    {
        $services = [
            UserService::class => UserServiceInterface::class
        ];

        foreach ($services as $instance => $contract) {
            $this->app->singletonIf($contract, $instance);
        }
    }
}
