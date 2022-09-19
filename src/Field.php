<?php


namespace Laraflow\Form;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

/**
 * Class Field
 * @package Laraflow\Form
 */
class Field
{
    /**
     * The session store implementation.
     *
     * @var Session
     */
    protected $session;

    /**
     * The request object hold all data
     *
     * @var Request|null
     */
    protected $request;

    /**
     * The validation error bag object
     *
     * @var Request|ViewErrorBag|mixed
     */
    protected $errors;

    /**
     * The Human readable label
     *
     * @var string
     */
    protected $label;

    /**
     * The field name attribute value
     *
     * @var string
     */
    protected $name;

    /**
     * If this field is required to have value
     *
     * @var bool
     */
    protected $required = false;

    /**
     * If this field has a default value
     *
     * @var mixed
     */
    protected $default = null;

    /**
     * Render the field object to plain html field
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toHtmlString('<p>Test</p>');
    }

    /**
     * Transform the string to an Html serializable object
     *
     * @param $html
     * @return string
     */
    protected function toHtmlString($html): string
    {
        return (string)$html;
    }
}
