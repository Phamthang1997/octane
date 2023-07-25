<?php

namespace App\Traits\Provider;

use App\Http\Middleware\AllowCors;
use App\Http\Middleware\AlwaysReturnJson;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

trait HasRouteProvider
{
    /**
     * Register tenant route resolved by path
     *
     * @param array $middlewares
     * @param string $prefix
     * @param string $path
     * @return boolean
     */
    public function registerPaths(array $middlewares, string $prefix, mixed $filePaths): bool
    {
        // add resolve middleware by path
        $middlewares = array_merge([AlwaysReturnJson::class], $middlewares);
        $this->registerRouteFromPaths($middlewares, $prefix, $filePaths);

        return true;
    }

    /**
     * Register route by route file path
     *
     * @param array $middlewares
     * @param string $prefix
     * @param string $filePath
     * @return void
     */
    public function registerRouteFromPath(array $middlewares, string $prefix, string $filePath): void
    {
        if (File::exists($filePath)) {
            Route::middleware($middlewares)->prefix($prefix)
                ->group($filePath);
        }
    }

    /**
     * Register route by directory
     *
     * @param array $middlewares
     * @param string $prefix
     * @param mixed $filePaths
     * @return void
     */
    public function registerRouteFromPaths(array $middlewares, string $prefix, mixed $filePaths): void
    {
        if (empty($filePaths)) {
            return;
        }
        if (is_string($filePaths)) {
            $filePaths = [$filePaths];
        }
        $middlewares = array_merge($middlewares, [AllowCors::class]);
        foreach ($filePaths as $filePath) {
            $this->registerRouteFromPath($middlewares, $prefix, $filePath);
        }
    }
}
