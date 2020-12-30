# PHP Application

<a href="https://packagist.org/packages/mbunge/php-application"><img src="https://img.shields.io/packagist/php-v/mbunge/php-application" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/mbunge/php-application"><img src="https://img.shields.io/packagist/dt/mbunge/php-application" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/mbunge/php-application"><img src="https://img.shields.io/packagist/v/mbunge/php-application" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/mbunge/php-application"><img src="https://img.shields.io/packagist/l/mbunge/php-application" alt="License"></a>

This package provides an easy way to create a PHP Application.

## Features

- PSR-14 Events
- PSR-11 Container
- PSR-7 compatibility

See [Upcoming features](https://github.com/mbunge/php-application/issues?q=is%3Aissue+is%3Aopen+label%3A%22upcoming+feature%22) of next release.

## Concept

The [Application](./src/Application.php) acts as some kind of front controller and
initiates and execute a controller for a specific context like HTTP, CLI, etc

The application is not aware of concrete implementation details of controller

### Context controller

[Application controller](./src/ApplicationController.php) executes application logic for a specific context 
and is not related to MVC-Controller

Logic depend on the field of use

- Front-Controller
- middleware handler
- use-case or interceptor handler
- framework (http, cli, db) controller
- etc.

### Controller decorator

Controller decorators add more additional behaviors without changing context controller and is able to deal with 
frameworks like DI-Containers, routers, event dispatches, API-Clients etc. 

## Install

Via Composer

``` bash
$ composer require mbunge/php-application
```

## Usage

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Deployment

Only maintainers are allowed to deploy new versions!

1. Run `composer run release` which will run tests and on success update changelog, package version and creates a release tag
2. switch to master branch and merge develop branch
3. Run `composer run deploy` which will run tests and on success push tags, master branch and develop branch

## Security

If you discover any security related issues, please email marco_bunge@web.de instead of using the issue tracker.

## Credits

- [Marco Bunge][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/mbunge
[link-contributors]: ../../contributors
