# Laravel support for tempest/view

## Installation

You can install the package via composer:

```bash
composer require tempest/view-for-laravel
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="view-for-laravel-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="view-for-laravel-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="view-for-laravel-views"
```

## Usage

```php
$viewForLaravel = new Tempest\ViewForLaravel();
echo $viewForLaravel->echoPhrase('Hello, Tempest!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Brent Roose](https://github.com/tempest)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
