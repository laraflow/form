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
            unset($options['normal']);
        } else if (isset($options['inline'])) {
            $wrapper = 'inline';
            unset($options['inline']);
        } elseif (isset($options['group'])) {
            $wrapper = 'group';
            unset($options['group']);
        } elseif (isset($options['horizon'])) {
            $wrapper = 'horizon';
            unset($options['horizon']);
        } else {
            $wrapper = 'normal';
        }


        return config("form.styles.{$style}.wrapper.{$wrapper}", 'form-group');
    }
}
