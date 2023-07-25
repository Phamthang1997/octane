<?php

namespace App\Traits\Provider;

trait ProviderCommonFunctions
{
    /**
     * Register depended providers
     *
     * @return void
     */
    public function registerProviders(): void
    {
        if (empty($this->app) || empty($this->providers)) {
            return;
        }
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
}
