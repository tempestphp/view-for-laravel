<?php

namespace Tempest\ViewForLaravel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tempest\Container\Container;
use Tempest\Core\Tempest;
use Tempest\View\ViewRenderer;
use function Tempest\root_path;

class TempestViewProvider extends PackageServiceProvider
{
    public function register(): self
    {
        // TODO: change root to Laravel's root
        $this->app->singleton(Container::class, fn () => TempestKernel::boot(root_path()));
        $this->app->singleton(ViewRenderer::class, fn () => $this->app->get(Container::class)->get(ViewRenderer::class));

        return parent::register();
    }

    public function configurePackage(Package $package): void
    {
        $package->name('tempest-view-for-laravel');
    }
}
