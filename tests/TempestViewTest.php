<?php

it('can test', closure: function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Hello Laravel')
        ->assertSee('Tempest View');
});
