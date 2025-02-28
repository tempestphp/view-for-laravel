<?php

namespace Tempest\ViewForLaravel\Tests;

use Tempest\ViewForLaravel\Tests\Controllers\ViewController;

class TempestViewTest extends TestCase
{
    public function test_view_is_rendered(): void
    {
        $this->get(action([ViewController::class, 'fullPath']))
            ->assertOk()
            ->assertSee('Hello Laravel')
            ->assertSee('Tempest View');

        $this->get(action([ViewController::class, 'withoutExtension']))
            ->assertOk()
            ->assertSee('Hello Laravel')
            ->assertSee('Tempest View');

        $this->get(action([ViewController::class, 'withoutPath']))
            ->assertOk()
            ->assertSee('Hello Laravel')
            ->assertSee('Tempest View');
    }
}
