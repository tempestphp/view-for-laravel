<?php

namespace Tempest\ViewForLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tempest\Container\Container;
use Tempest\View\ViewRenderer;

class TempestViewProvider extends PackageServiceProvider
{
    public function register(): self
    {
        $this->app->singleton(Container::class, fn () => TempestKernel::boot(base_path())->container);
        $this->app->singleton(ViewRenderer::class, fn () => $this->app->get(Container::class)->get(ViewRenderer::class));

        return parent::register();
    }

    public function configurePackage(Package $package): void
    {
        $package->name('tempest-view-for-laravel');
    }
}
