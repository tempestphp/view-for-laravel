<?php

namespace Tempest\ViewForLaravel\Tests;

class TempestViewTest extends TestCase
{
    public function test_view_is_rendered(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Hello Laravel')
            ->assertSee('Tempest View');
    }

    public function test_view_from_resource_is_rendered(): void
    {
        $this->get('/view-from-resource')
            ->assertOk()
            ->assertSee('Hello Resource Laravel')
            ->assertSee('Tempest Resource View');
    }
}
