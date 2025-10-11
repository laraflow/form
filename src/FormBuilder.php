<?php

namespace Laraflow\Form;

use BadMethodCallException;
use DateTime;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Support\ViewErrorBag;
use Laraflow\Form\Traits\ComponentTrait;

/**
 * Class FormBuilder
 */
class FormBuilder
{
    use ComponentTrait, Macroable {
        Macroable::__call as macroCall;
        ComponentTrait::__call as componentCall;
    }

    const ICON_PREPEND = 'before';

    const ICON_APPEND = 'after';

    /**
     * @var array
     */
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

    /**
     * @var Request|null
     */
    protected $request;

    /**
     * @var Request|ViewErrorBag|mixed
     */
    protected $errors;

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
     */
    public function __construct(Factory $view, ?string $csrfToken = null, ?UrlGenerator $url = null, ?Request $request = null)
    {
        $this->view = $view;
        $this->csrfToken = $csrfToken;
        $this->url = $url;
        $this->request = $request;

        $this->errors = ($this->request->hasSession())
            ? $this->request->session()->get('errors')
            : new ViewErrorBag;
    }

    /**
     * Dynamically handle calls to the class.
     *
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
    // --------------------------------------------- Usable Methods ---------------------------------------------------//

    /**
     * Get the session store implementation.
     *
     * @return Session $session
     */
    public function getSessionStore(): Session
    {
        return $this->session;
    }

    /**
     * Set the session store implementation.
     *
     * @return $this
     */
    public function setSessionStore(Session $session): self
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Create a new model based form builder.
     *
     * @param  mixed  $model
     * @return HtmlString
     */
    public function model($model, array $options = [])
    {
        $this->model = $model;

        return $this->open($options);
    }

    /**
     * Open up a new HTML form.
     * Form::open()
     *
     * @return HtmlString
     */
    public function open(array $options = [])
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

        // Finally, we will concatenate all the attributes into a single string so
        // we can build out the final form open statement. We'll also append on an
        // extra value for the hidden _method field if it's needed for the form.
        $attributes = $this->attributes($attributes);

        return $this->toHtmlString('<form'.$attributes.'>'.$append);
    }

    /**
     * Parse the form action method.
     *
     * @return string
     */
    protected function getMethod(string $method)
    {
        $method = strtoupper($method);

        return $method !== 'GET' ? 'POST' : $method;
    }

    /**
     * Get the form action from the options.
     *
     * @return string
     */
    protected function getAction(array $options)
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
     * Get the action for an "url" option.
     *
     * @param  array|string  $options
     * @return string
     */
    protected function getUrlAction($options)
    {
        if (is_array($options)) {
            return $this->url->to($options[0], array_slice($options, 1));
        }

        return $this->url->to($options);
    }

    /**
     * Get the action for a "route" option.
     *
     * @param  array|string  $options
     * @return string
     */
    protected function getRouteAction($options)
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
     * @param  array|string  $options
     * @return string
     */
    protected function getControllerAction($options)
    {
        if (is_array($options)) {
            return $this->url->action($options[0], array_slice($options, 1));
        }

        return $this->url->action($options);
    }

    /**
     * Get the form appendage for the given method.
     *
     * @return string
     */
    protected function getAppendage(string $method)
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
     * @param  null  $value
     * @return HtmlString
     */
    public function hidden(string $name, $value = null, bool $required = false, array $options = [])
    {
        return $this->input('hidden', $name, $value, $required, $options);
    }

    /**
     * Create a form input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function input(string $type, string $name, $value = null, bool $required = false, array $options = [])
    {
        $this->type = $type;

        if (! isset($options['name'])) {
            $options['name'] = $name;
        }

        if (isset($options['inline'])) {
            if (empty($options['placeholder'])) {
                $options['placeholder'] = "Enter {$name}";
            }
        }

        if (isset($options['icon'])) {
            unset($options['icon']);
        }

        // updating class fields
        $this->classAttributes($name, $options, 'field');

        // We will get the appropriate value for the given field. We will look for the
        // value in the session for the value in the old input data then we'll look
        // in the model instance if one is set. Otherwise we will just use empty.
        $id = $this->getIdAttribute($name, $options);

        if (! in_array($type, $this->skipValueTypes)) {
            $value = $this->getValueAttribute($name, $value);
        }

        // Once we have the type, value, and ID we can merge them into the rest of the
        // attributes array so we can convert them into their HTML attribute format
        // when creating the HTML element. Then, we will return the entire input.
        $merge = compact('type', 'value', 'id');

        $options = array_merge($options, $merge);

        if ($required === true) {
            $options['required'] = 'required';
        }

        return $this->toHtmlString('<input'.$this->attributes($options).'>');
    }

    protected function classAttributes($name, array &$options = [], string $field = 'field')
    {
        $style = config('form.style');

        $classes = config("form.styles.{$style}.{$field}", []);

        if ($this->errors instanceof ViewErrorBag && $this->errors->has($name)) {
            $classes = array_merge($classes, config("form.styles.{$style}.validation", []));
        }

        if (isset($options['class'])) {
            $classes = (is_array($options['class']))
                ? array_merge($classes, ($options['class'] ?? []))
                : [$classes, $options['class']];
        }

        $options['class'] = implode(' ', Arr::flatten($classes));
    }

    /**
     * Get the ID attribute for a field name.
     */
    protected function getIdAttribute(string $name, array $attributes): ?string
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
     * @param  null  $value
     * @return mixed
     */
    protected function getValueAttribute(?string $name = null, $value = null)
    {
        if (is_null($name)) {
            return $value;
        }

        $old = $this->old($name);

        if (! is_null($old) && $name !== '_method') {
            return $old;
        }

        if (function_exists('app')) {
            $hasNullMiddleware = app("Illuminate\Contracts\Http\Kernel")
                ->hasMiddleware('\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull');

            if ($hasNullMiddleware
                && is_null($old)
                && is_null($value)
                && ! is_null($this->view->shared('errors'))
                && count(is_countable($this->view->shared('errors')) ? $this->view->shared('errors') : []) > 0
            ) {
                return null;
            }
        }

        $request = $this->request($name);
        if (! is_null($request) && $name != '_method') {
            return $request;
        }

        if (! is_null($value)) {
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
     * @return mixed
     */
    public function old(string $name)
    {
        $key = $this->transformKey($name);
        $payload = $this->session->getOldInput($key);

        if (! is_array($payload)) {
            return $payload;
        }

        if (! in_array($this->type, ['select', 'checkbox'])) {
            if (! isset($this->payload[$key])) {
                $this->payload[$key] = collect($payload);
            }

            if (! empty($this->payload[$key])) {
                return $this->payload[$key]->shift();
            }
        }

        return $payload;
    }

    /**
     * Transform key from array to dot syntax.
     *
     * @return mixed
     */
    protected function transformKey(string $key)
    {
        return str_replace(['.', '[]', '[', ']'], ['_', '', '.', ''], $key);
    }

    /**
     * Get value from current Request
     *
     * @return array|null|string
     */
    protected function request($name)
    {
        if (! $this->considerRequest) {
            return null;
        }

        if (! isset($this->request)) {
            return null;
        }

        return $this->request->input($this->transformKey($name));
    }

    /**
     * Get the model value that should be assigned to the field.
     *
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
     * @return HtmlString
     */
    protected function toHtmlString($html)
    {
        return new HtmlString($html);
    }

    /**
     * Build an HTML attribute string from an array.
     *
     * @return string
     */
    protected function attributes(array $attributes)
    {
        $html = [];

        foreach ((array) $attributes as $key => $value) {
            $element = $this->attributeElement($key, $value);

            if ($element != null) {
                $html[] = $element;
            }
        }

        return count($html) > 0 ? ' '.implode(' ', $html) : '';
    }

    /**
     * Build a single attribute element.
     *
     * @param  mixed  $value
     * @return string
     */
    private function attributeElement(string $key, $value)
    {
        if (is_numeric($key)) {
            return $value;
        }

        // Treat boolean attributes as HTML properties
        if (is_bool($value) && $key !== 'value') {
            return $value ? $key : '';
        }

        if (is_array($value) && $key === 'class') {
            return 'class="'.implode(' ', $value).'"';
        }

        if (! is_null($value)) {
            return $key.'="'.e($value, false).'"';
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
        $token = ! empty($this->csrfToken) ? $this->csrfToken : $this->session->token();

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
     * @param  mixed  $model
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
     * @param  null  $title
     * @param  bool  $escape_html
     * @return HtmlString
     */
    public function label(string $name, $title = null, bool $required = false, array $options = [], $escape_html = true)
    {
        $this->labels[] = $name;

        if (isset($options['inline'])) {
            $options['style'] = 'display: none;';
        }

        $options = $this->attributes($options);

        $title = is_null($title)
            ? ucwords(str_replace('_', ' ', $name))
            : $title;

        if ($escape_html) {
            if (is_array($title)) {
                $title = implode(', ', $title);
            }
            $title = htmlentities($title, ENT_QUOTES, 'UTF-8', false);
        }

        if ($required) {
            $title = $title.'<span style="color: #dc3545; font-weight:700">*</span>';
        }

        return $this->toHtmlString("<label for=\"{$name}\" {$options}>{$title}</label>");
    }

    /**
     * Create a text input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function text(string $name, $value = null, bool $required = false, array $options = [])
    {
        return $this->input('text', $name, $value, $required, $options);
    }

    /**
     * Create a password input field.
     *
     * @return HtmlString
     */
    public function password(string $name, bool $required = false, array $options = [])
    {
        return $this->input('password', $name, null, $required, $options);
    }

    /**
     * Create a range input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function range(string $name, $value = null, bool $required = false, array $options = [])
    {
        $options['step'] = isset($options['step']) ? $options['step'] : 1;

        return $this->input('range', $name, $value, $required, $options);
    }

    /**
     * Create a search input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function search(string $name, $value = null, bool $required = false, array $options = [])
    {
        return $this->input('search', $name, $value, $required, $options);
    }

    /**
     * Create an e-mail input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function email(string $name, $value = null, bool $required = false, array $options = [])
    {
        return $this->input('email', $name, $value, $required, $options);
    }

    /**
     * Create a tel input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function tel(string $name, $value = null, bool $required = false, array $options = [])
    {
        return $this->input('tel', $name, $value, $required, $options);
    }

    /**
     * Create a number input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function number(string $name, $value = null, bool $required = false, array $options = [])
    {
        return $this->input('number', $name, $value, $required, $options);
    }

    /**
     * Create a date input field.
     *
     * @param  mixed  $value
     * @return HtmlString
     */
    public function date(string $name, $value = null, bool $required = false, array $options = [])
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m-d');
        }

        return $this->input('date', $name, $value, $required, $options);
    }

    /**
     * Create a datetime input field.
     *
     * @param  mixed  $value
     * @return HtmlString
     */
    public function datetime(string $name, $value = null, bool $required = false, array $options = [])
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m-d H:i:s');
        }

        return $this->input('datetime', $name, $value, $required, $options);
    }

    /**
     * Create a datetime-local input field.
     *
     * @param  mixed  $value
     * @return HtmlString
     */
    public function datetimeLocal(string $name, $value = null, bool $required = false, array $options = [])
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m-d\TH:i');
        }

        return $this->input('datetime-local', $name, $value, $required, $options);
    }

    /**
     * Create a time input field.
     *
     * @param  mixed  $value
     * @return HtmlString
     */
    public function time(string $name, $value = null, bool $required = false, array $options = [])
    {
        if ($value instanceof DateTime) {
            $value = $value->format('H:i');
        }

        return $this->input('time', $name, $value, $required, $options);
    }

    /**
     * Create a url input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function url(string $name, $value = null, bool $required = false, array $options = [])
    {
        return $this->input('url', $name, $value, $required, $options);
    }

    /**
     * Create a week input field.
     *
     * @param  mixed  $value
     * @return HtmlString
     */
    public function week(string $name, $value = null, bool $required = false, array $options = [])
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-\WW');
        }

        return $this->input('week', $name, $value, $required, $options);
    }

    /**
     * Create a file input field.
     *
     * @return HtmlString
     */
    public function file(string $name, bool $required = false, array $options = [])
    {
        return $this->input('file', $name, null, $required, $options);
    }

    // ------------------------------------------- Internal Methods ---------------------------------------------------//

    /**
     * Create a textarea input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function textarea(string $name, $value = null, bool $required = false, array $options = [])
    {
        $this->type = 'textarea';

        if (! isset($options['name'])) {
            $options['name'] = $name;
        }

        $this->classAttributes($name, $options, 'field');

        $options['id'] = $this->getIdAttribute($name, $options);

        $value = (string) $this->getValueAttribute($name, $value);

        if ($required === true) {
            $options['required'] = 'required';
        }

        return $this->toHtmlString('<textarea'.$this->attributes($options).'>'.e($value, false).'</textarea>');
    }

    /**
     * Create a select year field.
     *
     * @param  mixed  $begin
     * @param  mixed  $end
     * @return HtmlString
     */
    public function selectYear(string $name, $begin, $end, ?string $selected = null, bool $required = false, array $options = [])
    {
        return $this->selectRange($name, $begin, $end, $selected, $required, $options);
    }

    /**
     * Create a select range field.
     *
     * @param  string  $begin
     * @param  string  $end
     * @param  null  $selected
     * @return HtmlString
     */
    public function selectRange(string $name, $begin, $end, $selected = null, bool $required = false, array $options = [])
    {
        $step = 1;

        if (isset($options['step'])) {
            $step = $options['step'];
            unset($options);
        }

        $range = array_combine($range = range($begin, $end, $step), $range);

        return $this->select($name, $range, $selected, $required, $options);
    }

    /**
     * Create a select box field.
     *
     * @param  null  $selected
     * @return HtmlString
     */
    public function select(
        string $name,
        array $list = [],
        $selected = null,
        bool $required = false,
        array $selectAttributes = [],
        array $optionsAttributes = [],
        array $optgroupsAttributes = []
    ) {
        $this->type = 'select';

        $this->classAttributes($name, $selectAttributes, 'field');
        // When building a select box the "value" attribute is really the selected one
        // so we will use that when checking the model or session for a value which
        // should provide a convenient method of re-populating the forms on post.
        $selected = $this->getValueAttribute($name, $selected);

        $selectAttributes['id'] = $this->getIdAttribute($name, $selectAttributes);

        if (! isset($selectAttributes['name'])) {
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

        if ($required === true) {
            $selectAttributes['required'] = 'required';
        }

        $list = implode('', $html);

        return $this->toHtmlString("<select{$this->attributes($selectAttributes)}>{$list}</select>");
    }

    /**
     * Create a placeholder select element option.
     *
     * @return HtmlString
     */
    protected function placeholderOption($display, $selected)
    {
        $selected = $this->getSelectedValue(null, $selected);

        $options = [
            'selected' => $selected,
            'value' => '',
        ];

        return $this->toHtmlString('<option'.$this->attributes($options).'>'.e($display, false).'</option>');
    }

    /**
     * Determine if the value is selected.
     *
     * @param  string|null  $value
     * @param  mixed  $selected
     * @return mixed
     */
    protected function getSelectedValue($value, $selected)
    {
        if (is_array($selected)) {
            return in_array($value, $selected, true) || in_array((string) $value, $selected, true) ? 'selected' : null;
        } elseif ($selected instanceof Collection) {
            return $selected->contains($value) ? 'selected' : null;
        }
        /** @phpstan-ignore-next-line */
        if (is_int($value) && is_bool($selected)) {
            return (bool) $value === $selected;
        }

        return ((string) $value === (string) $selected) ? 'selected' : null;
    }

    /**
     * Get the select option for the given value.
     *
     * @param  mixed  $display
     * @param  string|null  $selected
     * @return HtmlString
     */
    protected function getSelectOption($display, string $value, $selected = null, array $attributes = [], array $optgroupAttributes = [])
    {
        if (is_iterable($display)) {
            return $this->optionGroup($display, $value, $selected, $optgroupAttributes, $attributes);
        }

        return $this->option($display, $value, $selected, $attributes);
    }

    /**
     * Create an option group form element.
     *
     * @param  int  $level
     * @return HtmlString
     */
    protected function optionGroup(array $list, string $label, string $selected, array $attributes = [], array $optionsAttributes = [], $level = 0)
    {
        $html = [];
        $space = str_repeat('&nbsp;', $level);
        foreach ($list as $value => $display) {
            $optionAttributes = $optionsAttributes[$value] ?? [];
            if (is_iterable($display)) {
                $html[] = $this->optionGroup($display, $value, $selected, $attributes, $optionAttributes, $level + 5);
            } else {
                $html[] = $this->option($space.$display, $value, $selected, $optionAttributes);
            }
        }

        return $this->toHtmlString('<optgroup label="'.e($space.$label, false).'"'.$this->attributes($attributes).'>'.implode('', $html).'</optgroup>');
    }

    /**
     * Create a select element option.
     *
     * @param  string|null  $selected
     * @return HtmlString
     */
    protected function option(string $display, string $value, $selected = null, array $attributes = [])
    {
        $selected = $this->getSelectedValue($value, $selected);

        $options = array_merge(['value' => $value, 'selected' => $selected], $attributes);

        $string = '<option'.$this->attributes($options).'>';
        if ($display !== null) {
            $string .= e($display, false).'</option>';
        }

        return $this->toHtmlString($string);
    }

    /**
     * Create a select month field.
     *
     * @param  null  $selected
     * @return HtmlString
     */
    public function selectMonth(string $name, $selected = null, bool $required = false, array $options = [])
    {
        $months = config('form.months', [
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

        return $this->select($name, $months, $selected, $required, $options);
    }

    /**
     * Create a checkbox input field.
     *
     * @param  mixed  $value
     * @param  null  $checked
     * @return HtmlString
     */
    public function checkbox(string $name, $value = 1, $checked = null, bool $required = false, array $options = [])
    {
        return $this->checkable('checkbox', $name, $value, $checked, $required, $options);
    }

    /**
     * Create a checkable input field.
     *
     * @param  mixed  $value
     * @return HtmlString
     */
    protected function checkable(string $type, string $name, $value, ?bool $checked = null, bool $required = false, array $options = [])
    {
        $this->type = $type;

        $checked = $this->getCheckedState($type, $name, $value, $checked);

        if ($checked) {
            $options['checked'] = 'checked';
        }

        return $this->input($type, $name, $value, $required, $options);
    }

    /**
     * Get the check state for a checkable input.
     *
     * @param  mixed  $value
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
     * @param  mixed  $value
     */
    protected function getCheckboxCheckedState(string $name, $value, bool $checked): bool
    {
        $request = $this->request($name);

        if (! $this->oldInputIsEmpty() && is_null($this->old($name)) && ! $request) {
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
            return (bool) $posted;
        }
    }

    /**
     * Determine if the old input is empty.
     */
    private function oldInputIsEmpty(): bool
    {
        return count((array) $this->session->getOldInput()) === 0;
    }

    /**
     * Determine if old input or model input exists for a key.
     */
    protected function missingOldAndModel(string $name): bool
    {
        return is_null($this->old($name)) && is_null($this->getModelValueAttribute($name));
    }

    /**
     * Get the check state for a radio input.
     *
     * @param  mixed  $value
     */
    protected function getRadioCheckedState(string $name, $value, bool $checked): bool
    {
        $request = $this->request($name);

        if ($this->missingOldAndModel($name) && ! $request) {
            return $checked;
        }

        return $this->compareValues($name, $value);
    }

    /**
     * Determine if the provide value loosely compares to the value assigned to the field.
     * Use loose comparison because Laravel model casting may be in affect and therefore
     * 1 == true and 0 == false.
     */
    protected function compareValues(string $name, string $value): bool
    {
        return $this->getValueAttribute($name) == $value;
    }

    /**
     * Create a radio button input field.
     *
     * @param  mixed  $value
     * @return HtmlString
     */
    public function radio(string $name, $value = null, bool $checked = false, bool $required = false, array $options = [])
    {
        if (is_null($value)) {
            $value = $name;
        }

        return $this->checkable('radio', $name, $value, $checked, $required, $options);
    }

    /**
     * Create a HTML reset input element.
     *
     * @param  array  $attributes
     * @return HtmlString
     */
    public function reset(string $value, $attributes = [])
    {
        return $this->input('reset', null, $value, false, $attributes);
    }

    /**
     * Create a HTML image input element.
     *
     * @param  null  $name
     * @param  array  $attributes
     * @return HtmlString
     */
    public function image(string $url, $name = null, bool $required = false, $attributes = [])
    {
        $attributes['src'] = $this->url->asset($url);

        return $this->input('image', $name, null, $required, $attributes);
    }

    /**
     * Create a month input field.
     *
     * @param  mixed  $value
     * @return HtmlString
     */
    public function month(string $name, $value = null, bool $required = false, array $options = [])
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m');
        }

        return $this->input('month', $name, $value, $required, $options);
    }

    /**
     * Create a color input field.
     *
     * @param  null  $value
     * @return HtmlString
     */
    public function color(string $name, $value = null, bool $required = false, array $options = [])
    {
        return $this->input('color', $name, $value, $required, $options);
    }

    /**
     * Create a submit button element.
     *
     * @param  string  $name
     * @param  null  $value
     * @param  bool  $button
     * @return HtmlString
     */
    public function submit($name = 'submit', $value = null, $button = false, array $options = [])
    {
        if ($button) {
            $options['type'] = 'submit';
            $options['name'] = $name;

            $this->classAttributes($name, $options, 'submit');

            return $this->button($value, $options);
        }

        return $this->input('submit', null, $value, false, $options);
    }

    /**
     * Create a button element.
     *
     * @param  string  $value
     * @return HtmlString
     */
    public function button($value = null, array $options = [])
    {
        if (! array_key_exists('type', $options)) {
            $options['type'] = 'button';
        }

        return $this->toHtmlString('<button'.$this->attributes($options).'>'.$value.'</button>');
    }

    /**
     * Create a datalist box field.
     *
     * @param  array  $list
     * @return HtmlString
     */
    public function datalist(string $id, $list = [])
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
     */
    protected function isAssociativeArray(array $array): bool
    {
        return array_values($array) !== $array;
    }

    /**
     * Create a form error display element.
     *
     * @return HtmlString
     */
    public function error(string $name, bool $all = false, array $options = [])
    {
        $this->classAttributes($name, $options, 'error');

        /*        if (empty($options['class'])) {
                    $options['class'] = config('form.error_class', 'invalid-feedback');
                }*/

        return $this->getErrorMessage($name, $all, $options);
    }

    /**
     * @return HtmlString
     */
    protected function getErrorMessage(string $name, bool $list = false, array $options = [])
    {
        $errors = null;

        if ($this->request->hasSession()) {
            $errors = $this->request->session()->get('errors');
        }

        if ($errors == null) {
            $errors = new ViewErrorBag;
        }

        $errorMessage = ($list)
            ? (($errors->all($name) ?? []))
            : ($errors->first($name) ?? null);

        $message = null;

        $options = $this->attributes($options);

        if (is_array($errorMessage)) {
            $message = "<ul id=\"{$name}-error\">";
            foreach ($errorMessage as $error) {
                $message .= ("<li {$options}>{$error}</li>");
            }
            $message .= '</ul>';
        } else {
            $message = ("<span id=\"{$name}-error\" {$options}>{$errorMessage}</span>");
        }

        return $this->toHtmlString($message);
    }

    /**
     * Set the text area size using the quick "size" attribute.
     */
    protected function setQuickTextAreaSize(array $options): array
    {
        $segments = explode('x', $options['size']);

        return array_merge($options, ['cols' => $segments[0], 'rows' => $segments[1]]);
    }

    /**
     * Take Request in fill process
     */
    protected function considerRequest(bool $consider = true)
    {
        $this->considerRequest = $consider;
    }
}
