<?php

namespace Hafijul233\Form\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Html
 *
 * @see \Hafijul233\Form\Builders\HtmlBuilder
 */
class Html extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'html';
    }
}
