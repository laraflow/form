<?php

return [
    /**
     * Form style validation and other component will
     * be selected form this section
     *
     * @var string style
     *
     * @value bootstrap3, bootstrap4, bootstrap5
     */
    'style' => env('FORM_STYLE', 'bootstrap4'),

    'styles' => [
        'bootstrap4' => [
            'wrapper' => [
                'normal' => 'form-group',
                'group' => 'form-group',
                'horizon' => 'form-group row',
                'inline' => 'form-inline',
            ],
            'field' => ['form-control'],
            'validation' => ['is-invalid'], // if validation false color class
            'error' => ['d-block invalid-feedback'], // if validation false color class
            'submit' => ['btn btn-primary', 'font-weight-bold'],
            'cancel' => ['invalid-feedback'],
            'horizon_label_size' => '2',
        ],
    ],

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
