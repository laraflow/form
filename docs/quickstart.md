# Quick start

It is recommended to publish form config file to access globally, which helps initializing and previewing the website
locally.

## Installation

To get start using this package follow these instructions. You can install the package via composer:

```bash
composer require laraflow/form
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
