<?php

namespace Tempest\ViewForLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tempest\Container\Container;
use Tempest\Discovery\DiscoveryLocation;
use Tempest\View\ViewRenderer;

class TempestViewProvider extends PackageServiceProvider
{
    public function register(): self
    {
        $this->app->singleton(
            abstract: Container::class,
            concrete: fn () => TempestKernel::boot(
                root: base_path(),
                discoveryLocations: [
                    new DiscoveryLocation(
                        'Views\\',
                        resource_path('views'),
                    ),
                ],
            )->container,
        );

        $this->app->singleton(ViewRenderer::class, fn () => $this->app->get(Container::class)->get(ViewRenderer::class));

        return parent::register();
    }

    public function configurePackage(Package $package): void
    {
        $package->name('tempest-view-for-laravel');
    }
}
