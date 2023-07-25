<?php

namespace App\Providers;

use App\Traits\Provider\Contracts\WithProviderCommonFunctions;
use App\Traits\Provider\ProviderCommonFunctions;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider implements WithProviderCommonFunctions
{
    use ProviderCommonFunctions;

    /**
     * Providers depended on this provider
     */
    private array $providers = [
        ContainerServiceProvider::class,
        RepositoriesServiceProvider::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerProviders();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
