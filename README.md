# Verimor notifications channel for Laravel 5.3+

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/umuttaymaz/laravel-verimor-sms/master.svg?style=flat-square)](https://travis-ci.org/umuttaymaz/laravel-verimor-sms)
[![StyleCI](https://styleci.io/repos/123347343/shield)](https://styleci.io/repos/123153620)
[![Total Downloads](https://img.shields.io/packagist/dt/umuttaymaz/laravel-verimor-sms.svg?style=flat-square)](https://packagist.org/packages/umuttaymaz/laravel-verimor-sms)

This package makes it easy to send notifications using [VerimorSMS](https://verimor.com.tr) with Laravel 5.3+.

## Contents

- [Installation](#installation)
	- [Setting up the VerimorSMSAPI](#setting-up-the-VerimorSMSAPI-service)
- [Usage](#usage)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

You can install the package via composer:

```bash
composer require umuttaymaz/laravel-verimor-sms
```

Then you must install the service provider:
```php
// config/app.php
'providers' => [
    ...
    UmutTaymaz\VerimorSMSAPI\VerimorServiceProvider::class
],

'alias' => [
    ...
    'Verimor' => UmutTaymaz\VerimorSMSAPI\Facades\Verimor::class
]
```

### Setting up the VerimorSMSAPI service

Add your Verimor username, password and default sender name to your `.env`:

```
VERIMOR_USERNAME=username
VERIMOR_PASSWORD=apiPassword
```
## Usage

```php
return Verimor::send('Example Message', function ($sms){
        $sms->to(['phoneNumber1', 'phoneNumber2']);
});
```

or

```php
return Verimor::send('Example Message', function ($sms){
        $sms->to('phoneNumber');
});
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email umut@kreator.com.tr instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Umut Taymaz](https://github.com/umuttaymaz)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
