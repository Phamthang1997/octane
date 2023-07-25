<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Carbon\Laravel\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->bindRepositories();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Bind repositories
     *
     * @return void
     */
    private function bindRepositories(): void
    {
        $repositories = [
            BaseRepository::class => BaseRepositoryInterface::class,
            UserRepository::class => UserRepositoryInterface::class,
        ];

        foreach ($repositories as $instance => $contract) {
            $this->app->singletonIf($contract, $instance);
        }
    }
}
