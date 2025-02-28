<?php

namespace Tempest\ViewForLaravel\Tests\Controllers;

use Tempest\ViewForLaravel\GenericTempestView;

final readonly class ViewController
{
    public function fullPath(): GenericTempestView
    {
        return new GenericTempestView(resource_path('views/home.view.php'));
    }

    public function withoutExtension(): GenericTempestView
    {
        return new GenericTempestView(resource_path('views/home'));
    }

    public function withoutPath(): GenericTempestView
    {
        return new GenericTempestView('home');
    }
}
