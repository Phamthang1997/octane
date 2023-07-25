<?php

namespace App\Traits\Provider\Contracts;

interface WithRouteProvider
{
    /**
     * Register tenant route resolved by path
     *
     * @param array $middlewares
     * @param string $prefix
     * @param mixed $filePaths
     * @return boolean
     */
    public function registerPaths(array $middlewares, string $prefix, mixed $filePaths): bool;

    /**
     * Register route by route file path
     *
     * @param array $middlewares
     * @param string $prefix
     * @param string $filePath
     * @return void
     */
    public function registerRouteFromPath(array $middlewares, string $prefix, string $filePath): void;


    /**
     * Register route by directory
     *
     * @param array $middlewares
     * @param string $prefix
     * @param mixed $filePaths
     * @return void
     */
    public function registerRouteFromPaths(array $middlewares, string $prefix, mixed $filePaths): void;
}
