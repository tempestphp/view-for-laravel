<?php

namespace Tempest\ViewForLaravel\Tests\Controllers;

use Tempest\ViewForLaravel\TempestView;

final readonly class ViewFromResourceController
{
    public function viewFromResource(): TempestView
    {
        return new TempestView('resource-home.view.php');
    }

    public function viewFromResourceWithoutExtension(): TempestView
    {
        return new TempestView('resource-home');
    }
}
