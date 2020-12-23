# 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/angeloo/laravel-me.svg?style=flat-square)](https://packagist.org/packages/angeloo/laravel-me)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/angeloo/laravel-me/run-tests?label=tests)](https://github.com/angeloo/laravel-me/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/angeloo/laravel-me.svg?style=flat-square)](https://packagist.org/packages/angeloo/laravel-me)


Simple Laravel package to get an endpoint that return the current user data 


## Installation

You can install the package via composer:

```bash
composer require angeloo/laravel-me
```

You can publish and run the migrations with:

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Angeloo\Me\MeServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    /*
     * The eloquent resource to use for the response.
     */
    'resource' => \Angeloo\Me\Http\Resources\MeResource::class,

    /*
     * The user's relationships you want to load.
     */
    'with' => []
];
```

## Usage

``` php
// in a routes files behind auth gate

Route::meApi('me');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover any security related issues, please email angelo.maiorano@gmail.com instead of using the issue tracker.

## Credits

- [Angelo Maiorano](https://github.com/angeloo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
