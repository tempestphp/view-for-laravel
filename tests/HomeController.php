<?php

namespace Tempest\ViewForLaravel\Tests;

use Tempest\ViewForLaravel\TempestView;

final readonly class HomeController
{
    public function __invoke()
    {
        return new TempestView(__DIR__ . '/Views/home.view.php');
    }
}
