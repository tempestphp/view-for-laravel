<?php

use Tempest\ViewForLaravel\GenericTempestView;

if (! function_exists('tempestView')) {
    function tempestView(string $path, array $data = []): GenericTempestView
    {
        return new GenericTempestView($path, $data);
    }
}
