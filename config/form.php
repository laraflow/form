<?php

return [
    /**
     * Form style validation and other component will
     * be selected form this section
     *
     * @var string style
     * @value bootstrap3, bootstrap4, bootstrap5
     */
    'style' => 'bootstrap4',

    /**
     * Form local language for field that support localization
     *
     * @reference month, day etc
     *
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
        '1' => 'January',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
    ],

    /**
     * Form day values what value and label day dropdown
     * will have
     *
     * @var array month
     */
    'days' => [
        '1' => 'Saturday',
        '2' => 'Sunday',
        '3' => 'Monday',
        '4' => 'Tuesday',
        '5' => 'Wednesday',
        '6' => 'Thursday',
        '7' => 'Friday',
    ],
];
