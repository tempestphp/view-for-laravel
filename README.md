
<p align="center">
  <a href="https://tempestphp.com">
    <img src=".github/tempest-logo.svg" width="100" />
  </a>
    <h1 align="center" ">Laravel support for tempest/view</h1>
</p>

<div align="center">
  Bringing <a href="https://tempestphp.com/view">tempest/view</a> to Laravel.
  <br />
  Read the <a href="https://tempestphp.com/docs/framework/views/">documentation</a> to get started.
</div>

<br />
<br />

## Installation

You can install the package via composer:

```bash
composer require tempest/view-for-laravel
```

## Usage

From any controller, simply return an instance of `\Tempest\ViewForLaravel\TempestView`:

```php
use Tempest\ViewForLaravel\GenericTempestView;

final readonly class HomeController
{
    public function __invoke()
    {
        return new GenericTempestView(__DIR__ . '/Views/home.view.php');
    }
}
```

```html
<!-- home.view.php -->
<x-layout>
    <h1>Hello Laravel</h1>
</x-layout>

<!-- x-layout.view.php -->
<x-component name="x-layout">
    <html lang="en">
    <head>
        <title>Tempest View</title>
    </head>
    <body>
        <x-slot />
    </body>
    </html>
</x-component>
```
