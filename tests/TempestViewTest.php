<?php

namespace Tempest\ViewForLaravel\Tests;

class TempestViewTest extends TestCase
{
    public function test_it_works(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Hello Laravel')
            ->assertSee('Tempest View');
    }
}
