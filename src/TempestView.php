<?php

namespace Tempest\ViewForLaravel;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Tempest\View\IsView;
use Tempest\View\View;
use Tempest\View\ViewRenderer;

final class TempestView implements Responsable, View
{
    use IsView;

    public function __construct(
        string $path,
        array $data = [],
    ) {
        if (! str_ends_with($path, '.view.php')) {
            $path = $path . '.view.php';
        }

        $this->path = $path;
        $this->data = $data;
    }

    public function toResponse($request): Response
    {
        $viewRenderer = app()->get(ViewRenderer::class);

        return response($viewRenderer->render($this));
    }
}
