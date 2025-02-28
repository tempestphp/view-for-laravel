<?php

namespace Tempest\ViewForLaravel\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Tempest\Container\Container;
use Tempest\Core\Kernel;
use Tempest\Discovery\DiscoveryLocation;
use Tempest\ViewForLaravel\TempestKernel;
use Tempest\ViewForLaravel\TempestViewProvider;
use Tempest\ViewForLaravel\Tests\Controllers\HomeController;
use Tempest\ViewForLaravel\Tests\Controllers\ViewFromResourceController;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $container = $this->app->get(Container::class);

        /** @var \Tempest\ViewForLaravel\TempestKernel $kernel */
        $kernel = $container->get(Kernel::class);

        $kernel->discoveryLocations[] = new DiscoveryLocation(
            namespace: 'Tempest\ViewForLaravel\Tests\Views',
            path: __DIR__ . '/Views',
        );

        copy(__DIR__ . '/ResourceViews/resource-home.view.php', resource_path('views/resource-home.view.php'));
        copy(__DIR__ . '/ResourceViews/x-resource-layout.view.php', resource_path('views/x-resource-layout.view.php'));
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
        $router->get('/view-from-resource', [ViewFromResourceController::class, 'viewFromResource']);
        $router->get('/view-from-resource-without-extension', [ViewFromResourceController::class, 'viewFromResourceWithoutExtension']);
    }
}
