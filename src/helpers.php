<?php

if (!function_exists('wrapper')) {
    /**
     * @param array $options
     * @return string
     */
    function wrapper(array &$options = [])
    {
        $style = config('form.style', 'bootstrap4');

        if (isset($options['normal'])) {
            $wrapper = 'normal';
        } elseif (isset($options['inline'])) {
            $wrapper = 'inline';
        } elseif (isset($options['group'])) {
            $wrapper = 'group';
        } elseif (isset($options['horizon'])) {
            $wrapper = 'horizon';
        } else {
            $wrapper = 'normal';
        }

        return config("form.styles.{$style}.wrapper.{$wrapper}", 'form-group');
    }
}
