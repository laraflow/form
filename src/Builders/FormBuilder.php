<?php

namespace Hafijul233\Form\Builders;

use BadMethodCallException;
use DateTime;
use Hafijul233\Form\Traits\ComponentTrait;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Traits\Macroable;

/**
 * Class FormBuilder
 */
class FormBuilder
{
    use Macroable, ComponentTrait {
        Macroable::__call as macroCall;
        ComponentTrait::__call as componentCall;
    }

    protected $payload;

    /**
     * The URL generator instance.
     *
     * @var UrlGenerator
     */
    protected $url;

    /**
     * The View factory instance.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The CSRF token used by the form builder.
     *
     * @var string
     */
    protected $csrfToken;

    /**
     * Consider Request variables while auto fill.
     *
     * @var bool
     */
    protected $considerRequest = false;

    /**
     * The session store implementation.
     *
     * @var Session
     */
    protected $session;

    /**
     * The current model instance for the form.
     *
     * @var mixed
     */
    protected $model;

    /**
     * An array of label names we've created.
     *
     * @var array
     */
    protected $labels = [];

    protected $request;

    /**
     * The reserved form open attributes.
     *
     * @var array
     */
    protected $reserved = ['method', 'url', 'route', 'action', 'files'];

    /**
     * The form methods that should be spoofed, in uppercase.
     *
     * @var array
     */
    protected $spoofedMethods = ['DELETE', 'PATCH', 'PUT'];

    /**
     * The types of inputs to not fill values on by default.
     *
     * @var array
     */
    protected $skipValueTypes = ['file', 'password', 'checkbox', 'radio'];

    /**
     * Input Type.
     *
     * @var string|null
     */
    protected $type = 'text';

    /**
     * Create a new form builder instance.
     *
     * @param Factory $view
     * @param string|null $csrfToken
     * @param UrlGenerator|null $url
     * @param Request|null $request
     */
    public function __construct(Factory $view, string $csrfToken = null, UrlGenerator $url = null, Request $request = null)
    {
        $this->view = $view;
        $this->csrfToken = $csrfToken;
        $this->url = $url;
        $this->request = $request;
    }

    /**
     * Create a new model based form builder.
     *
     * @param mixed $model
     * @param array $options
     * @return HtmlString
     */
    public function model($model, array $options = []): HtmlString
    {
        $this->model = $model;

        return $this->open($options);
    }

    /**
     * Open up a new HTML form.
     *
     * @param array $options
     * @return HtmlString
     */
    public function open(array $options = []): HtmlString
    {
        $method = Arr::get($options, 'method', 'post');

        // We need to extract the proper method from the attributes. If the method is
        // something other than GET or POST we'll use POST since we will spoof the
        // actual method since forms don't support the reserved methods in HTML.
        $attributes['method'] = $this->getMethod($method);

        $attributes['action'] = $this->getAction($options);

        $attributes['accept-charset'] = 'UTF-8';

        // If the method is PUT, PATCH or DELETE we will need to add a spoofer hidden
        // field that will instruct the Symfony request to pretend the method is a
        // different method than it actually is, for convenience from the forms.
        $append = $this->getAppendage($method);

        if (isset($options['files']) && $options['files']) {
            $options['enctype'] = 'multipart/form-data';
        }

        // Finally we're ready to create the final form HTML field. We will attribute
        // format the array of attributes. We will also add on the appendage which
        // is used to spoof requests for this PUT, PATCH, etc. methods on forms.
        $attributes = array_merge(

            $attributes, Arr::except($options, $this->reserved)

        );

        // Finally, we will concatenate all of the attributes into a single string so
        // we can build out the final form open statement. We'll also append on an
        // extra value for the hidden _method field if it's needed for the form.
        $attributes = $this->attributes($attributes);

        return $this->toHtmlString('<form' . $attributes . '>' . $append);
    }

    /**
     * Parse the form action method.
     *
     * @param string $method
     * @return string
     */
    protected function getMethod(string $method): string
    {
        $method = strtoupper($method);

        return $method !== 'GET' ? 'POST' : $method;
    }

    /**
     * Get the form action from the options.
     *
     * @param array $options
     * @return string
     */
    protected function getAction(array $options): string
    {
        // We will also check for a "route" or "action" parameter on the array so that
        // developers can easily specify a route or controller action when creating
        // a form providing a convenient interface for creating the form actions.
        if (isset($options['url'])) {
            return $this->getUrlAction($options['url']);
        }

        if (isset($options['route'])) {
            return $this->getRouteAction($options['route']);
        }

        // If an action is available, we are attempting to open a form to a controller
        // action route. So, we will use the URL generator to get the path to these
        // actions and return them from the method. Otherwise, we'll use current.
        elseif (isset($options['action'])) {
            return $this->getControllerAction($options['action']);
        }

        return $this->url->current();
    }

    /**
     * Get the action for a "url" option.
     *
     * @param array|string $options
     * @return string
     */
    protected function getUrlAction($options): string
    {
        if (is_array($options)) {
            return $this->url->to($options[0], array_slice($options, 1));
        }

        return $this->url->to($options);
    }

    /**
     * Get the action for a "route" option.
     *
     * @param array|string $options
     * @return string
     */
    protected function getRouteAction($options): string
    {
        if (is_array($options)) {
            $parameters = array_slice($options, 1);

            if (array_keys($options) === [0, 1]) {
                $parameters = head($parameters);
            }

            return $this->url->route($options[0], $parameters);
        }

        return $this->url->route($options);
    }

    /**
     * Get the action for an "action" option.
     *
     * @param array|string $options
     * @return string
     */
    protected function getControllerAction($options): string
    {
        if (is_array($options)) {
            return $this->url->action($options[0], array_slice($options, 1));
        }

        return $this->url->action($options);
    }

    /**
     * Get the form appendage for the given method.
     *
     * @param string $method
     * @return string
     */
    protected function getAppendage(string $method): string
    {
        [$method, $appendage] = [strtoupper($method), ''];

        // If the HTTP method is in this list of spoofed methods, we will attach the
        // method spoofer hidden input to the form. This allows us to use regular
        // form to initiate PUT and DELETE requests in addition to the typical.
        if (in_array($method, $this->spoofedMethods)) {
            $appendage .= $this->hidden('_method', $method);
        }

        // If the method is something other than GET we will go ahead and attach the
        // CSRF token to the form, as this can't hurt and is convenient to simply
        // always have available on every form the developers creates for them.
        if ($method !== 'GET') {
            $appendage .= $this->token();
        }

        return $appendage;
    }

    /**
     * Create a hidden input field.
     *
     * @param string $name
     * @param null $value
     * @param array $options
     * @return HtmlString
     */
    public function hidden(string $name, $value = null, array $options = []): HtmlString
    {
        return $this->input('hidden', $name, $value, $options);
    }

    /**
     * Create a form input field.
     *
     * @param string $type
     * @param string $name
     * @param null $value
     * @param array $options
     * @return HtmlString
     */
    public function input(string $type, string $name, $value = null, array $options = []): HtmlString
    {
        $this->type = $type;

        if (!isset($options['name'])) {
            $options['name'] = $name;
        }

        // We will get the appropriate value for the given field. We will look for the
        // value in the session for the value in the old input data then we'll look
        // in the model instance if one is set. Otherwise we will just use empty.
        $id = $this->getIdAttribute($name, $options);

        if (!in_array($type, $this->skipValueTypes)) {
            $value = $this->getValueAttribute($name, $value);
        }

        // Once we have the type, value, and ID we can merge them into the rest of the
        // attributes array so we can convert them into their HTML attribute format
        // when creating the HTML element. Then, we will return the entire input.
        $merge = compact('type', 'value', 'id');

        $options = array_merge($options, $merge);

        return $this->toHtmlString('<input' . $this->attributes($options) . '>');
    }

    /**
     * Get the ID attribute for a field name.
     *
     * @param string $name
     * @param array $attributes
     * @return string|null
     */
    public function getIdAttribute(string $name, array $attributes): ?string
    {
        if (array_key_exists('id', $attributes)) {
            return $attributes['id'];
        }

        if (in_array($name, $this->labels)) {
            return $name;
        }

        return null;
    }

    /**
     * Get the value that should be assigned to the field.
     *
     * @param string|null $name
     * @param null $value
     * @return mixed
     */
    public function getValueAttribute(string $name = null, $value = null)
    {
        if (is_null($name)) {
            return $value;
        }

        $old = $this->old($name);

        if (!is_null($old) && $name !== '_method') {
            return $old;
        }

        if (function_exists('app')) {
            $hasNullMiddleware = app("Illuminate\Contracts\Http\Kernel")
                ->hasMiddleware('\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull');

            if ($hasNullMiddleware
                && is_null($old)
                && is_null($value)
                && !is_null($this->view->shared('errors'))
                && count(is_countable($this->view->shared('errors')) ? $this->view->shared('errors') : []) > 0
            ) {
                return null;
            }
        }

        $request = $this->request($name);
        if (!is_null($request) && $name != '_method') {
            return $request;
        }

        if (!is_null($value)) {
            return $value;
        }

        if (isset($this->model)) {
            return $this->getModelValueAttribute($name);
        }

        return null;
    }

    /**
     * Get a value from the session's old input.
     *
     * @param string $name
     * @return mixed
     */
    public function old(string $name)
    {
        /*if (isset($this->session)) {*/
        $key = $this->transformKey($name);
        $payload = $this->session->getOldInput($key);

        if (!is_array($payload)) {
            return $payload;
        }

        if (!in_array($this->type, ['select', 'checkbox'])) {
            if (!isset($this->payload[$key])) {
                $this->payload[$key] = collect($payload);
            }

            if (!empty($this->payload[$key])) {
                return $this->payload[$key]->shift();
            }
        }

        return $payload;
        /*    }

            return [];*/
    }

    /**
     * Transform key from array to dot syntax.
     *
     * @param string $key
     * @return mixed
     */
    protected function transformKey(string $key)
    {
        return str_replace(['.', '[]', '[', ']'], ['_', '', '.', ''], $key);
    }

    /**
     * Get value from current Request
     *
     * @param $name
     * @return array|null|string
     */
    protected function request($name)
    {
        if (!$this->considerRequest) {
            return null;
        }

        if (!isset($this->request)) {
            return null;
        }

        return $this->request->input($this->transformKey($name));
    }

    /**
     * Get the model value that should be assigned to the field.
     *
     * @param string $name
     * @return mixed
     */
    protected function getModelValueAttribute(string $name)
    {
        $key = $this->transformKey($name);

        if ((is_string($this->model) || is_object($this->model)) && method_exists($this->model, 'getFormValue')) {
            return $this->model->getFormValue($key);
        }

        return data_get($this->model, $key);
    }

    /**
     * Transform the string to an Html serializable object
     *
     * @param $html
     * @return HtmlString
     */
    protected function toHtmlString($html): HtmlString
    {
        return new HtmlString($html);
    }

    /**
     * Build an HTML attribute string from an array.
     *
     * @param array $attributes
     * @return string
     */
    public function attributes(array $attributes): string
    {
        $html = [];

        foreach ((array)$attributes as $key => $value) {
            $element = $this->attributeElement($key, $value);

            if ($element != null) {
                $html[] = $element;
            }
        }

        return count($html) > 0 ? ' ' . implode(' ', $html) : '';
    }

    /**
     * Build a single attribute element.
     *
     * @param string $key
     * @param mixed $value
     * @return string
     */
    protected function attributeElement(string $key, $value): string
    {
        // For numeric keys we will assume that the value is a boolean attribute
        // where the presence of the attribute represents a true value and the
        // absence represents a false value.
        // This will convert HTML attributes such as "required" to a correct
        // form instead of using incorrect numerics.
        if (is_numeric($key)) {
            return $value;
        }

        // Treat boolean attributes as HTML properties
        if (is_bool($value) && $key !== 'value') {
            return $value ? $key : '';
        }

        if (is_array($value) && $key === 'class') {
            return 'class="' . implode(' ', $value) . '"';
        }

        if (!is_null($value)) {
            return $key . '="' . e($value, false) . '"';
        }

        return '';
    }

    /**
     * Generate a hidden field with the current CSRF token.
     *
     * @return string
     */
    public function token()
    {
        $token = !empty($this->csrfToken) ? $this->csrfToken : $this->session->token();

        return $this->hidden('_token', $token);
    }

    /**
     * Get the current model instance on the form builder.
     *
     * @return mixed $model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the model instance on the form builder.
     *
     * @param mixed $model
     * @return void
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * Close the current form.
     *
     * @return string
     */
    public function close()
    {
        $this->labels = [];

        $this->model = null;

        return $this->toHtmlString('</form>');
    }

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
    public function label(string $name, $title = null, bool $required = false, array $options = [], $escape_html = true): HtmlString
    {
        $this->labels[] = $name;

        $options = $this->attributes($options);

        $title = $this->formatLabel($name, $title);

        if ($escape_html) {
            $title = $this->entities($title);
        }

        if ($required) {
            $title = '<span style="color: #dc3545; font-weight:700">*</span> ' . $title;
        }

        return $this->toHtmlString("<label for=\"{$name}\" {$options}>{$title}</label>");
    }

    /**
     * Format the label value.
     *
     * @param string $name
     * @param string|null $value
     * @return string
     */
    protected function formatLabel(string $name, string $value = null): string
    {
        return $value ?: ucwords(str_replace('_', ' ', $name));
    }

    /**
     * Convert an HTML string to entities.
     *
     * @param string $value
     * @return string
     */
    public function entities(string $value): string
    {
        return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Create a text input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function text(string $name, $value = null, array $options = []): HtmlString
    {
        return $this->input('text', $name, $value, $options);
    }

    /**
     * Create a password input field.
     *
     * @param string $name
     * @param array $options
     * @return HtmlString
     */
    public function password(string $name, array $options = []): HtmlString
    {
        return $this->input('password', $name, '', $options);
    }

    /**
     * Create a range input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function range(string $name, $value = null, array $options = []): HtmlString
    {
        return $this->input('range', $name, $value, $options);
    }

    /**
     * Create a search input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function search(string $name, $value = null, array $options = []): HtmlString
    {
        return $this->input('search', $name, $value, $options);
    }

    /**
     * Create an e-mail input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function email(string $name, $value = null, array $options = []): HtmlString
    {
        return $this->input('email', $name, $value, $options);
    }

    /**
     * Create a tel input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function tel(string $name, $value = null, array $options = []): HtmlString
    {
        return $this->input('tel', $name, $value, $options);
    }

    /**
     * Create a number input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function number(string $name, $value = null, array $options = []): HtmlString
    {
        return $this->input('number', $name, $value, $options);
    }

    /**
     * Create a date input field.
     *
     * @param string $name
     * @param mixed $value
     * @param array $options
     * @return HtmlString
     */
    public function date(string $name, $value = null, array $options = []): HtmlString
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m-d');
        }

        return $this->input('date', $name, $value, $options);
    }

    /**
     * Create a datetime input field.
     *
     * @param string $name
     * @param mixed $value
     * @param array $options
     * @return HtmlString
     */
    public function datetime(string $name, $value = null, array $options = []): HtmlString
    {
        if ($value instanceof DateTime) {
            $value = $value->format(DateTime::RFC3339);
        }

        return $this->input('datetime', $name, $value, $options);
    }

    /**
     * Create a datetime-local input field.
     *
     * @param string $name
     * @param mixed $value
     * @param array $options
     * @return HtmlString
     */
    public function datetimeLocal(string $name, $value = null, array $options = []): HtmlString
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m-d\TH:i');
        }

        return $this->input('datetime-local', $name, $value, $options);
    }

    /**
     * Create a time input field.
     *
     * @param string $name
     * @param mixed $value
     * @param array $options
     * @return HtmlString
     */
    public function time(string $name, $value = null, array $options = []): HtmlString
    {
        if ($value instanceof DateTime) {
            $value = $value->format('H:i');
        }

        return $this->input('time', $name, $value, $options);
    }

    /**
     * Create a url input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function url(string $name, $value = null, array $options = []): HtmlString
    {
        return $this->input('url', $name, $value, $options);
    }

    /**
     * Create a week input field.
     *
     * @param string $name
     * @param mixed $value
     * @param array $options
     * @return HtmlString
     */
    public function week(string $name, $value = null, array $options = []): HtmlString
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-\WW');
        }

        return $this->input('week', $name, $value, $options);
    }

    /**
     * Create a file input field.
     *
     * @param string $name
     * @param array $options
     * @return HtmlString
     */
    public function file(string $name, array $options = []): HtmlString
    {
        return $this->input('file', $name, null, $options);
    }

    /**
     * Create a textarea input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function textarea(string $name, $value = null, array $options = []): HtmlString
    {
        $this->type = 'textarea';

        if (!isset($options['name'])) {
            $options['name'] = $name;
        }

        // Next we will look for the rows and cols attributes, as each of these are put
        // on the textarea element definition. If they are not present, we will just
        // assume some sane default values for these attributes for the developer.
        $options = $this->setTextAreaSize($options);

        $options['id'] = $this->getIdAttribute($name, $options);

        $value = (string)$this->getValueAttribute($name, $value);

        unset($options['size']);

        // Next we will convert the attributes into a string form. Also we have removed
        // the size attribute, as it was merely a short-cut for the rows and cols on
        // the element. Then we'll create the final textarea elements HTML for us.
        $options = $this->attributes($options);

        return $this->toHtmlString('<textarea' . $options . '>' . e($value, false) . '</textarea>');
    }

    /**
     * Set the text area size on the attributes.
     *
     * @param array $options
     * @return array
     */
    protected function setTextAreaSize(array $options): array
    {
        if (isset($options['size'])) {
            return $this->setQuickTextAreaSize($options);
        }

        // If the "size" attribute was not specified, we will just look for the regular
        // columns and rows attributes, using sane defaults if these do not exist on
        // the attributes array. We'll then return this entire options array back.
        $cols = Arr::get($options, 'cols', 50);

        $rows = Arr::get($options, 'rows', 10);

        return array_merge($options, compact('cols', 'rows'));
    }

    /**
     * Set the text area size using the quick "size" attribute.
     *
     * @param array $options
     * @return array
     */
    protected function setQuickTextAreaSize(array $options): array
    {
        $segments = explode('x', $options['size']);

        return array_merge($options, ['cols' => $segments[0], 'rows' => $segments[1]]);
    }

    /**
     * Create a select year field.
     *
     * @param string $name
     * @param string $begin
     * @param string $end
     * @param string|null $selected
     * @param array $options
     * @return HtmlString
     */
    public function selectYear(string $name, string $begin, string $end, string $selected = null, array $options = []): HtmlString
    {
        return $this->selectRange($name, $begin, $end, $selected, $options);
    }

    /**
     * Create a select range field.
     *
     * @param string $name
     * @param string $begin
     * @param string $end
     * @param string $selected
     * @param array $options
     * @return HtmlString
     */
    public function selectRange(string $name, $begin, $end, $selected = null, array $options = []): HtmlString
    {
        $range = array_combine($range = range($begin, $end), $range);

        return $this->select($name, $range, $selected, $options);
    }

    /**
     * Create a select box field.
     *
     * @param string $name
     * @param array $list
     * @param null $selected
     * @param array $selectAttributes
     * @param array $optionsAttributes
     * @param array $optgroupsAttributes
     * @return HtmlString
     */
    public function select(
        string $name,
        array $list = [],
        $selected = null,
        array $selectAttributes = [],
        array $optionsAttributes = [],
        array $optgroupsAttributes = []
    ): HtmlString
    {
        $this->type = 'select';

        // When building a select box the "value" attribute is really the selected one
        // so we will use that when checking the model or session for a value which
        // should provide a convenient method of re-populating the forms on post.
        $selected = $this->getValueAttribute($name, $selected);

        $selectAttributes['id'] = $this->getIdAttribute($name, $selectAttributes);

        if (!isset($selectAttributes['name'])) {
            $selectAttributes['name'] = $name;
        }

        // We will simply loop through the options and build an HTML value for each of
        // them until we have an array of HTML declarations. Then we will join them
        // all together into one single HTML element that can be put on the form.
        $html = [];

        if (isset($selectAttributes['placeholder'])) {
            $html[] = $this->placeholderOption($selectAttributes['placeholder'], $selected);
            unset($selectAttributes['placeholder']);
        }

        foreach ($list as $value => $display) {
            $optionAttributes = $optionsAttributes[$value] ?? [];
            $optgroupAttributes = $optgroupsAttributes[$value] ?? [];
            $html[] = $this->getSelectOption($display, $value, $selected, $optionAttributes, $optgroupAttributes);
        }

        // Once we have all of this HTML, we can join this into a single element after
        // formatting the attributes into an HTML "attributes" string, then we will
        // build out a final select statement, which will contain all the values.
        $selectAttributes = $this->attributes($selectAttributes);

        $list = implode('', $html);

        return $this->toHtmlString("<select{$selectAttributes}>{$list}</select>");
    }

    /**
     * Create a placeholder select element option.
     *
     * @param $display
     * @param $selected
     * @return HtmlString
     */
    protected function placeholderOption($display, $selected): HtmlString
    {
        $selected = $this->getSelectedValue(null, $selected);

        $options = [
            'selected' => $selected,
            'value' => '',
        ];

        return $this->toHtmlString('<option' . $this->attributes($options) . '>' . e($display, false) . '</option>');
    }

    /**
     * Determine if the value is selected.
     *
     * @param string $value
     * @param mixed $selected
     * @return mixed
     */
    protected function getSelectedValue(string $value, $selected)
    {
        if (is_array($selected)) {
            return in_array($value, $selected, true) || in_array((string)$value, $selected, true) ? 'selected' : null;
        } elseif ($selected instanceof Collection) {
            return $selected->contains($value) ? 'selected' : null;
        }
        /** @phpstan-ignore-next-line */
        if (is_int($value) && is_bool($selected)) {
            return (bool)$value === $selected;
        }

        return ((string)$value === (string)$selected) ? 'selected' : null;
    }

    /**
     * Get the select option for the given value.
     *
     * @param mixed $display
     * @param string $value
     * @param string $selected
     * @param array $attributes
     * @param array $optgroupAttributes
     * @return HtmlString
     */
    public function getSelectOption($display, string $value, string $selected, array $attributes = [], array $optgroupAttributes = []): HtmlString
    {
        if (is_iterable($display)) {
            return $this->optionGroup($display, $value, $selected, $optgroupAttributes, $attributes);
        }

        return $this->option($display, $value, $selected, $attributes);
    }

    /**
     * Create an option group form element.
     *
     * @param array $list
     * @param string $label
     * @param string $selected
     * @param array $attributes
     * @param array $optionsAttributes
     * @param int $level
     * @return HtmlString
     */
    protected function optionGroup(array $list, string $label, string $selected, array $attributes = [], array $optionsAttributes = [], $level = 0): HtmlString
    {
        $html = [];
        $space = str_repeat('&nbsp;', $level);
        foreach ($list as $value => $display) {
            $optionAttributes = $optionsAttributes[$value] ?? [];
            if (is_iterable($display)) {
                $html[] = $this->optionGroup($display, $value, $selected, $attributes, $optionAttributes, $level + 5);
            } else {
                $html[] = $this->option($space . $display, $value, $selected, $optionAttributes);
            }
        }

        return $this->toHtmlString('<optgroup label="' . e($space . $label, false) . '"' . $this->attributes($attributes) . '>' . implode('', $html) . '</optgroup>');
    }

    /**
     * Create a select element option.
     *
     * @param string $display
     * @param string $value
     * @param string $selected
     * @param array $attributes
     * @return HtmlString
     */
    protected function option(string $display, string $value, string $selected, array $attributes = []): HtmlString
    {
        $selected = $this->getSelectedValue($value, $selected);

        $options = array_merge(['value' => $value, 'selected' => $selected], $attributes);

        $string = '<option' . $this->attributes($options) . '>';
        if ($display !== null) {
            $string .= e($display, false) . '</option>';
        }

        return $this->toHtmlString($string);
    }

    /**
     * Create a select month field.
     *
     * @param string $name
     * @param string $selected
     * @param array $options
     * @param string $format
     * @return HtmlString
     */
    public function selectMonth(string $name, $selected = null, $format = '%B', array $options = []): HtmlString
    {
        $months = Config::get('form.months', [
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
        ]);

        return $this->select($name, $months, $selected, $options);
    }

    /**
     * Create a checkbox input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @param array $options
     * @return HtmlString
     */
    public function checkbox(string $name, $value = 1, $checked = null, array $options = []): HtmlString
    {
        return $this->checkable('checkbox', $name, $value, $checked, $options);
    }

    /**
     * Create a checkable input field.
     *
     * @param string $type
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @param array $options
     * @return HtmlString
     */
    protected function checkable(string $type, string $name, $value, bool $checked, array $options = []): HtmlString
    {
        $this->type = $type;

        $checked = $this->getCheckedState($type, $name, $value, $checked);

        if ($checked) {
            $options['checked'] = 'checked';
        }

        return $this->input($type, $name, $value, $options);
    }

    /**
     * Get the check state for a checkable input.
     *
     * @param string $type
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @return bool
     */
    protected function getCheckedState(string $type, string $name, $value, bool $checked): bool
    {
        switch ($type) {
            case 'checkbox':
                return $this->getCheckboxCheckedState($name, $value, $checked);

            case 'radio':
                return $this->getRadioCheckedState($name, $value, $checked);

            default:
                return $this->compareValues($name, $value);
        }
    }

    /**
     * Get the check state for a checkbox input.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @return bool
     */
    protected function getCheckboxCheckedState(string $name, $value, bool $checked): bool
    {
        $request = $this->request($name);

        if (!$this->oldInputIsEmpty() && is_null($this->old($name)) && !$request) {
            return false;
        }

        if ($this->missingOldAndModel($name) && is_null($request)) {
            return $checked;
        }

        $posted = $this->getValueAttribute($name, $checked);

        if (is_array($posted)) {
            return in_array($value, $posted);
        } elseif ($posted instanceof Collection) {
            return $posted->contains('id', $value);
        } else {
            return (bool)$posted;
        }
    }

    /**
     * Determine if the old input is empty.
     *
     * @return bool
     */
    public function oldInputIsEmpty(): bool
    {
        return count((array)$this->session->getOldInput()) === 0;
    }

    /**
     * Determine if old input or model input exists for a key.
     *
     * @param string $name
     * @return bool
     */
    protected function missingOldAndModel(string $name): bool
    {
        return is_null($this->old($name)) && is_null($this->getModelValueAttribute($name));
    }

    /**
     * Get the check state for a radio input.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @return bool
     */
    protected function getRadioCheckedState(string $name, $value, bool $checked): bool
    {
        $request = $this->request($name);

        if ($this->missingOldAndModel($name) && !$request) {
            return $checked;
        }

        return $this->compareValues($name, $value);
    }

    /**
     * Determine if the provide value loosely compares to the value assigned to the field.
     * Use loose comparison because Laravel model casting may be in affect and therefore
     * 1 == true and 0 == false.
     *
     * @param string $name
     * @param string $value
     * @return bool
     */
    protected function compareValues(string $name, string $value): bool
    {
        return $this->getValueAttribute($name) == $value;
    }

    /**
     * Create a radio button input field.
     *
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @param array $options
     * @return HtmlString
     */
    public function radio(string $name, $value = null, $checked = null, array $options = []): HtmlString
    {
        if (is_null($value)) {
            $value = $name;
        }

        return $this->checkable('radio', $name, $value, $checked, $options);
    }

    /**
     * Create a HTML reset input element.
     *
     * @param string $value
     * @param array $attributes
     * @return HtmlString
     */
    public function reset(string $value, $attributes = []): HtmlString
    {
        return $this->input('reset', null, $value, $attributes);
    }

    /**
     * Create a HTML image input element.
     *
     * @param string $url
     * @param null $name
     * @param array $attributes
     * @return HtmlString
     */
    public function image(string $url, $name = null, $attributes = []): HtmlString
    {
        $attributes['src'] = $this->url->asset($url);

        return $this->input('image', $name, null, $attributes);
    }

    /**
     * Create a month input field.
     *
     * @param string $name
     * @param mixed $value
     * @param array $options
     * @return HtmlString
     */
    public function month(string $name, $value = null, array $options = []): HtmlString
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m');
        }

        return $this->input('month', $name, $value, $options);
    }

    /**
     * Create a color input field.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function color(string $name, $value = null, array $options = []): HtmlString
    {
        return $this->input('color', $name, $value, $options);
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
    public function submit($name = 'submit', $value = null, $button = false, array $options = []): HtmlString
    {
        if ($button) {
            $options['type'] = 'submit';
            $options['name'] = $name;

            if (empty($options['class'])) {
                $options['class'] = Config::get('form.submit_class', 'btn btn-primary fw-bold');
            }

            return $this->button($value, $options);
        }

        return $this->input('submit', null, $value, $options);
    }

    /**
     * Create a button element.
     *
     * @param string $value
     * @param array $options
     * @return HtmlString
     */
    public function button($value = null, array $options = []): HtmlString
    {
        if (!array_key_exists('type', $options)) {
            $options['type'] = 'button';
        }

        return $this->toHtmlString('<button' . $this->attributes($options) . '>' . $value . '</button>');
    }

    /**
     * Create a datalist box field.
     *
     * @param string $id
     * @param array $list
     * @return HtmlString
     */
    public function datalist(string $id, $list = []): HtmlString
    {
        $this->type = 'datalist';

        $attributes['id'] = $id;

        $html = [];

        if ($this->isAssociativeArray($list)) {
            foreach ($list as $value => $display) {
                $html[] = $this->option($display, $value, null, []);
            }
        } else {
            foreach ($list as $value) {
                $html[] = $this->option($value, $value, null, []);
            }
        }

        $attributes = $this->attributes($attributes);

        $list = implode('', $html);

        return $this->toHtmlString("<datalist{$attributes}>{$list}</datalist>");
    }

    /**
     * Determine if an array is associative.
     *
     * @param array $array
     * @return bool
     */
    protected function isAssociativeArray(array $array): bool
    {
        return array_values($array) !== $array;
    }

    /**
     * Create a form error display element.
     *
     * @param string $name
     * @param array $options
     * @return HtmlString
     */
    public function error(string $name, array $options = []): HtmlString
    {
        if (empty($options['class'])) {
            $options['class'] = Config::get('form.error_class', 'invalid-feedback');
        }

        $options = $this->attributes($options);

        $message = $this->request->session()->get('errors')->first($name) ?? null;

        return $this->toHtmlString("<span id=\"{$name}-error\" {$options}>{$message}</span>");
    }

    /**
     * Take Request in fill process
     *
     * @param bool $consider
     */
    public function considerRequest(bool $consider = true)
    {
        $this->considerRequest = $consider;
    }

    /**
     * Get the session store implementation.
     *
     * @return  Session  $session
     */
    public function getSessionStore(): Session
    {
        return $this->session;
    }

    /**
     * Set the session store implementation.
     *
     * @param Session $session
     * @return $this
     */
    public function setSessionStore(Session $session): self
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Dynamically handle calls to the class.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     *
     * @throws BadMethodCallException
     */
    public function __call(string $method, array $parameters)
    {
        if (static::hasComponent($method)) {
            return $this->componentCall($method, $parameters);
        }

        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }
}
