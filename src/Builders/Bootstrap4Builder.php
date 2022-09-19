<?php


namespace Laraflow\Form\Builders;


use Illuminate\Support\HtmlString;
use Laraflow\Form\FormBuilder;
use Laraflow\Form\Interfaces\FormInterface;

class Bootstrap4Builder implements FormInterface
{

    /**
     * Create a form label element.
     *
     * @param string $name
     * @param null $title
     * @param bool $required
     * @param array $options
     * @param bool $escape_html
     * @return HtmlString
     */
    public function label(string $name, $title = null, bool $required = false, array $options = [], bool $escape_html = true)
    {
        // TODO: Implement label() method.
    }

    /**
     * Create a text input field.
     *
     * @param string $name
     * @param null $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function text(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement text() method.
    }

    /**
     * Create a password input field.
     *
     * @param string $name
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function password(string $name, bool $required = false, array $options = [])
    {
        // TODO: Implement password() method.
    }

    /**
     * Create a range input field.
     *
     * @param string $name
     * @param null $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function range(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement range() method.
    }

    /**
     * Create a search input field.
     *
     * @param string $name
     * @param null $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function search(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement search() method.
    }

    /**
     * Create an e-mail input field.
     *
     * @param string $name
     * @param null $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function email(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement email() method.
    }

    /**
     * Create a tel input field.
     *
     * @param string $name
     * @param null $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function tel(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement tel() method.
    }

    /**
     * Create a number input field.
     *
     * @param string $name
     * @param null $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function number(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement number() method.
    }

    /**
     * Create a date input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function date(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement date() method.
    }

    /**
     * Create a datetime input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function datetime(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement datetime() method.
    }

    /**
     * Create a datetime-local input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function datetimeLocal(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement datetimeLocal() method.
    }

    /**
     * Create a time input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function time(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement time() method.
    }

    /**
     * Create a url input field.
     *
     * @param string $name
     * @param null $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function url(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement url() method.
    }

    /**
     * Create a week input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function week(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement week() method.
    }

    /**
     * Create a file input field.
     *
     * @param string $name
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function file(string $name, bool $required = false, array $options = [])
    {
        // TODO: Implement file() method.
    }

    /**
     * Create a textarea input field.
     *
     * @param string $name
     * @param null $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function textarea(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement textarea() method.
    }

    /**
     * Create a select year field.
     *
     * @param string $name
     * @param mixed $begin
     * @param mixed $end
     * @param mixed $selected
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function selectYear(string $name, $begin, $end, $selected = null, bool $required = false, array $options = [])
    {
        // TODO: Implement selectYear() method.
    }

    /**
     * Create a select range field.
     *
     * @param string $name
     * @param mixed $begin
     * @param mixed $end
     * @param null $selected
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function selectRange(string $name, $begin, $end, $selected = null, bool $required = false, array $options = [])
    {
        // TODO: Implement selectRange() method.
    }

    /**
     * Create a select box field.
     *
     * @param string $name
     * @param array $list
     * @param null $selected
     * @param bool $required
     * @param array $selectAttributes
     * @param array $optionsAttributes
     * @param array $optgroupsAttributes
     * @return HtmlString
     */
    public function select(string $name, array $list = [], $selected = null, bool $required = false, array $selectAttributes = [], array $optionsAttributes = [], array $optgroupsAttributes = [])
    {
        // TODO: Implement select() method.
    }

    /**
     * Create a select month field.
     *
     * @param string $name
     * @param null $selected
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function selectMonth(string $name, $selected = null, bool $required = false, array $options = [])
    {
        // TODO: Implement selectMonth() method.
    }

    /**
     * Create a checkbox input field.
     *
     * @param string $name
     * @param mixed $value
     * @param null $checked
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function checkbox(string $name, $value = 1, $checked = null, bool $required = false, array $options = [])
    {
        // TODO: Implement checkbox() method.
    }

    /**
     * Create a radio button input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function radio(string $name, $value = null, bool $checked = false, bool $required = false, array $options = [])
    {
        // TODO: Implement radio() method.
    }

    /**
     * Create a HTML reset input element.
     *
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function reset(string $value, array $options = [])
    {
        // TODO: Implement reset() method.
    }

    /**
     * Create a HTML image input element.
     *
     * @param string $url
     * @param null $name
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function image(string $url, $name = null, bool $required = false, array $options = [])
    {
        // TODO: Implement image() method.
    }

    /**
     * Create a month input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function month(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement month() method.
    }

    /**
     * Create a color input field.
     *
     * @param string $name
     * @param null $value
     * @param bool $required
     * @param array $options
     * @return HtmlString
     */
    public function color(string $name, $value = null, bool $required = false, array $options = [])
    {
        // TODO: Implement color() method.
    }

    /**
     * Create a submit button element.
     *
     * @param string $name
     * @param null $value
     * @param bool $button
     * @param array $options
     * @return HtmlString
     */
    public function submit(string $name = 'submit', $value = null, bool $button = false, array $options = [])
    {
        // TODO: Implement submit() method.
    }

    /**
     * Create a button element.
     *
     * @param string|null $value
     * @param array $options
     * @return HtmlString
     */
    public function button(string $value = null, array $options = [])
    {
        // TODO: Implement button() method.
    }

    /**
     * Create a datalist box field.
     *
     * @param string $id
     * @param array $list
     * @return HtmlString
     */
    public function datalist(string $id, array $list = [])
    {
        // TODO: Implement datalist() method.
    }

    /**
     * Create a form error display element.
     *
     * @param string $name
     * @param bool $all
     * @param array $options
     * @return HtmlString
     */
    public function error(string $name, bool $all = false, array $options = [])
    {
        // TODO: Implement error() method.
    }
}
