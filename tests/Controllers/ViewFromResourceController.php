<?php

namespace Tempest\ViewForLaravel\Tests\Controllers;

use Tempest\ViewForLaravel\TempestView;

final readonly class ViewFromResourceController
{
    public function __invoke()
    {
        return new TempestView('resource-home.view.php');
    }
}
