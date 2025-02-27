<?php

namespace Tempest\ViewForLaravel\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Tempest\Container\Container;
use Tempest\Discovery\DiscoveryLocation;
use Tempest\ViewForLaravel\TempestKernel;
use Tempest\ViewForLaravel\TempestViewProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->singleton(Container::class, fn () => TempestKernel::boot(
            root: __DIR__ . '/../',
            discoveryLocations: [
                new DiscoveryLocation(
                    namespace: 'Tempest\ViewForLaravel\Tests',
                    path: __DIR__,
                )
            ]
        )->container);
    }

    protected function getPackageProviders($app)
    {
        return [
            TempestViewProvider::class,
        ];
    }

    protected function defineRoutes($router)
    {
        $router->get('/', HomeController::class);
    }
}
