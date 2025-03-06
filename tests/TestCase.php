<?php

namespace Tempest\ViewForLaravel\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Tempest\ViewForLaravel\TempestViewProvider;
use Tempest\ViewForLaravel\Tests\Controllers\ViewController;
use function Tempest\Support\path;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        foreach (glob(__DIR__ . '/Views/*.view.php') as $file) {
            $basename = path($file)->basename();
            copy($file, resource_path("views/{$basename}"));
        }
    }

    protected function getPackageProviders($app): array
    {
        return [
            TempestViewProvider::class,
        ];
    }

    protected function defineRoutes($router): void
    {
        $router->get('/view-full-path', [ViewController::class, 'fullPath']);
        $router->get('/view-without-extension', [ViewController::class, 'withoutExtension']);
        $router->get('/view-without-path', [ViewController::class, 'withoutPath']);
    }
}
