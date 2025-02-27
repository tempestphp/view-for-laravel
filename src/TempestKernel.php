<?php

namespace Tempest\ViewForLaravel;

use Tempest\Container\Container;
use Tempest\Container\GenericContainer;
use Tempest\Core\Composer;
use Tempest\Core\Kernel;
use Tempest\Core\Kernel\LoadConfig;
use Tempest\Core\Kernel\LoadDiscoveryClasses;
use Tempest\Core\Kernel\LoadDiscoveryLocations;
use Tempest\Core\ShellExecutors\GenericShellExecutor;

final class TempestKernel implements Kernel
{
    public readonly Container $container;

    public bool $discoveryCache;

    public array $discoveryClasses = [];

    public function __construct(
        public string $root,
        /** @var \Tempest\Discovery\DiscoveryLocation[] $discoveryLocations */
        public array $discoveryLocations = [],
    ) {
        $this->container = $this->createContainer();
    }

    public static function boot(
        string $root,
        array $discoveryLocations = [],
        ?Container $container = null,
    ): self {
        return new self(
            root: $root,
            discoveryLocations: $discoveryLocations,
        )
            ->registerKernel()
            ->loadComposer()
            ->loadDiscoveryLocations()
            ->loadConfig()
            ->loadDiscovery();
    }

    public function createContainer(): Container
    {
        $container = new GenericContainer();

        GenericContainer::setInstance($container);

        $container->singleton(Container::class, fn () => $container);

        return $container;
    }

    public function loadComposer(): self
    {
        $composer = new Composer(
            root: $this->root,
            executor: new GenericShellExecutor(),
        )->load();

        $this->container->singleton(Composer::class, $composer);

        return $this;
    }

    public function registerKernel(): self
    {
        $this->container->singleton(Kernel::class, $this);

        return $this;
    }

    public function loadDiscoveryLocations(): self
    {
        $this->container->invoke(LoadDiscoveryLocations::class);

        return $this;
    }

    public function loadDiscovery(): self
    {
        $this->container->invoke(LoadDiscoveryClasses::class);

        return $this;
    }

    public function loadConfig(): self
    {
        $this->container->invoke(LoadConfig::class);

        return $this;
    }

    public function shutdown(int|string $status = ''): never
    {
        exit($status);
    }
}
