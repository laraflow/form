# Hafijul233/Form
[![Latest Stable Version](https://poser.pugx.org/hafijul233/form/v)](//packagist.org/packages/hafijul233/form)
[![Total Downloads](https://poser.pugx.org/hafijul233/form/downloads)](//packagist.org/packages/hafijul233/form)
[![run-tests](https://github.com/hafijul233/form/workflows/run-tests/badge.svg)](//github.com/hafijul233/form/actions/workflows/run-tests.yml)
[![License](https://poser.pugx.org/hafijul233/form/license)](//packagist.org/packages/hafijul233/form)
[![Latest Unstable Version](https://poser.pugx.org/hafijul233/form/v/unstable)](//packagist.org/packages/hafijul233/form)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/hafijul233/form/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/hafijul233/form/?branch=main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/hafijul233/form/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/hafijul233/form/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/hafijul233/form/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)


## Introduction
[``hafijul233/form``](https://packagist.org/packages/hafijul233/form) is a collection of [Laravel Collective/HTML](https://packagist.org/packages/laravelcollective/html) components.
it was initially planed to create only [Bootstrap4](https://getbootstrap.com/) form element styles.

## Features
This package has basic form element style that is supported by bootstrap.
Some basic form styles are given below:
* Normal
* Icon Input Grouped
* Horizontal Columned
* Inline Elements

## Installation
To get start using this package follow these instructions.
You can install the package via composer:

```bash
composer require hafijul233/form
```

You need to publish the config file with:

```bash
php artisan vendor:publish --tag="form-config"
```

This is the contents of the published config file:

```php
return [
    /**
     * Form style validation and other component will
     * be selected form this section
     * @var string style
     * @value bootstrap3, bootstrap4, bootstrap5
     */
    'style' => 'bootstrap4',

    /**
     * Form local language for field that support localization
     *
     * @reference month, day etc
     * @var string style
     * @value bootstrap3, bootstrap4, bootstrap5
     */
    'locale' => 'en',

    /**
     * Form month values what value and label month dropdown
     * will have
     *
     * @var array month
     */

    'months' => [
        "1" => "January",
        "2" => "February",
        "3" => "March",
        "4" => "April",
        "5" => "May",
        "6" => "June",
        "7" => "July",
        "8" => "August",
        "9" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December"
    ],

    /**
     * Form day values what value and label day dropdown
     * will have
     * @var array month
     */

    'days' => [
        "1" => "Saturday",
        "2" => "Sunday",
        "3" => "Monday",
        "4" => "Tuesday",
        "5" => "Wednesday",
        "6" => "Thursday",
        "7" => "Friday"
    ],
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="form-views"
```

Done. Now you can fully utilize every form elements from these package

### Contributing

Thank you for considering contributing to the Form!
The contribution guide can be found in the [Form Wiki](https://github.com/hafijul233/form/wiki/).

### Security Vulnerabilities

If you discover a security vulnerability within Form Package,
please send an e-mail to Mohammad Hafijul Islam via [hafijul233@gmail.com](mailto:hafijul233@gmail.com).
All security vulnerabilities will be promptly addressed.

### License

The Form is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/hafijul233/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Hafijul Islam](https://github.com/hafijul233)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
