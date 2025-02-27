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

    public function toResponse($request): Response
    {
        $viewRenderer = app()->get(ViewRenderer::class);

        return response($viewRenderer->render($this));
    }
}
