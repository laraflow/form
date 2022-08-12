<?php

namespace Hafijul233\Form\Builders;

use BadMethodCallException;
use Hafijul233\Form\Traits\ComponentTrait;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Traits\Macroable;

class HtmlBuilder
{
    use Macroable, ComponentTrait {
        Macroable::__call as macroCall;
        ComponentTrait::__call as componentCall;
    }

    /**
     * The URL generator instance.
     *
     * @var UrlGenerator
     */
    protected $url;

    /**
     * The View Factory instance.
     *
     * @var Factory
     */
    protected $view;

    /**
     * Create a new HTML builder instance.
     *
     * @param UrlGenerator|null $url
     * @param Factory $view
     */
    public function __construct(UrlGenerator $url, Factory $view)
    {
        $this->url = $url;
        $this->view = $view;
    }

    /**
     * Convert entities to HTML characters.
     *
     * @param string $value
     * @return string
     */
    public function decode($value)
    {
        return html_entity_decode($value, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Generate a link to a JavaScript file.
     *
     * @param string $url
     * @param array $attributes
     * @param null $secure
     * @return HtmlString
     */
    public function script(string $url, $attributes = [], $secure = null)
    {
        $attributes['src'] = $this->url->asset($url, $secure);

        return $this->toHtmlString('<script' . $this->attributes($attributes) . '></script>');
    }

    /**
     * Transform the string to an Html serializable object
     *
     * @param string $html
     * @return HtmlString
     */
    protected function toHtmlString(string $html): HtmlString
    {
        return new HtmlString($html);
    }

    /**
     * Generate a link to a CSS file.
     *
     * @param string $url
     * @param array $attributes
     * @param bool $secure
     * @return HtmlString
     */
    public function style($url, $attributes = [], $secure = null)
    {
        $defaults = ['media' => 'all', 'type' => 'text/css', 'rel' => 'stylesheet'];

        $attributes = array_merge($defaults, $attributes);

        $attributes['href'] = $this->url->asset($url, $secure);

        return $this->toHtmlString('<link' . $this->attributes($attributes) . '>');
    }

    /**
     * Generate an HTML image element.
     *
     * @param string $url
     * @param string $alt
     * @param array $attributes
     * @param bool $secure
     * @return HtmlString
     */
    public function image($url, $alt = null, $attributes = [], $secure = null)
    {
        $attributes['alt'] = $alt;

        return $this->toHtmlString('<img src="' . $this->url->asset($url,
                $secure) . '"' . $this->attributes($attributes) . '>');
    }

    /**
     * Generate a link to a Favicon file.
     *
     * @param string $url
     * @param array $attributes
     * @param bool $secure
     * @return HtmlString
     */
    public function favicon($url, $attributes = [], $secure = null)
    {
        $defaults = ['rel' => 'shortcut icon', 'type' => 'image/x-icon'];

        $attributes = array_merge($defaults, $attributes);

        $attributes['href'] = $this->url->asset($url, $secure);

        return $this->toHtmlString('<link' . $this->attributes($attributes) . '>');
    }

    /**
     * Generate a HTTPS HTML link.
     *
     * @param string $url
     * @param string $title
     * @param array $attributes
     * @param bool $escape
     * @return HtmlString
     */
    public function secureLink($url, $title = null, $attributes = [], $escape = true)
    {
        return $this->link($url, $title, $attributes, true, $escape);
    }

    /**
     * Generate a HTML link.
     *
     * @param string $url
     * @param string $title
     * @param array $attributes
     * @param bool $secure
     * @param bool $escape
     * @return HtmlString
     */
    public function link($url, $title = null, $attributes = [], $secure = null, $escape = true)
    {
        $url = $this->url->to($url, [], $secure);

        if (is_null($title) || $title === false) {
            $title = $url;
        }

        if ($escape) {
            $title = $this->entities($title);
        }

        return $this->toHtmlString('<a href="' . $this->entities($url) . '"' . $this->attributes($attributes) . '>' . $title . '</a>');
    }


    /**
     * Generate a HTTPS HTML link to an asset.
     *
     * @param string $url
     * @param string $title
     * @param array $attributes
     * @param bool $escape
     * @return HtmlString
     */
    public function linkSecureAsset($url, $title = null, $attributes = [], $escape = true)
    {
        return $this->linkAsset($url, $title, $attributes, true, $escape);
    }

    /**
     * Generate a HTML link to an asset.
     *
     * @param string $url
     * @param string $title
     * @param array $attributes
     * @param bool $secure
     * @param bool $escape
     * @return HtmlString
     */
    public function linkAsset($url, $title = null, $attributes = [], $secure = null, $escape = true)
    {
        $url = $this->url->asset($url, $secure);

        return $this->link($url, $title ?: $url, $attributes, $secure, $escape);
    }

    /**
     * Generate a HTML link to a named route.
     *
     * @param string $name
     * @param string $title
     * @param array $parameters
     * @param array $attributes
     * @param bool $secure
     * @param bool $escape
     * @return HtmlString
     */
    public function linkRoute($name, $title = null, $parameters = [], $attributes = [], $secure = null, $escape = true)
    {
        return $this->link($this->url->route($name, $parameters), $title, $attributes, $secure, $escape);
    }

    /**
     * Generate a HTML link to a controller action.
     *
     * @param string $action
     * @param string $title
     * @param array $parameters
     * @param array $attributes
     * @param bool $secure
     * @param bool $escape
     * @return HtmlString
     */
    public function linkAction($action, $title = null, $parameters = [], $attributes = [], $secure = null, $escape = true)
    {
        return $this->link($this->url->action($action, $parameters), $title, $attributes, $secure, $escape);
    }

    /**
     * Generate a HTML link to an email address.
     *
     * @param string $email
     * @param string $title
     * @param array $attributes
     * @param bool $escape
     * @return HtmlString
     */
    public function mailto($email, $title = null, $attributes = [], $escape = true)
    {
        $email = $this->email($email);

        $title = $title ?: $email;

        if ($escape) {
            $title = $this->entities($title);
        }

        $email = $this->obfuscate('mailto:') . $email;

        return $this->toHtmlString('<a href="' . $email . '"' . $this->attributes($attributes) . '>' . $title . '</a>');
    }

    /**
     * Obfuscate an e-mail address to prevent spam-bots from sniffing it.
     *
     * @param string $email
     * @return string
     */
    public function email($email)
    {
        return str_replace('@', '&#64;', $this->obfuscate($email));
    }

    /**
     * Obfuscate a string to prevent spam-bots from sniffing it.
     *
     * @param string $value
     * @return string
     */
    public function obfuscate($value)
    {
        $safe = '';

        foreach (str_split($value) as $letter) {
            if (ord($letter) > 128) {
                return $letter;
            }

            // To properly obfuscate the value, we will randomly convert each letter to
            // its entity or hexadecimal representation, keeping a bot from sniffing
            // the randomly obfuscated letters out of the string on the responses.
            switch (rand(1, 3)) {
                case 1:
                    $safe .= '&#' . ord($letter) . ';';
                    break;

                case 2:
                    $safe .= '&#x' . dechex(ord($letter)) . ';';
                    break;

                case 3:
                    $safe .= $letter;
            }
        }

        return $safe;
    }

    /**
     * Generates non-breaking space entities based on number supplied.
     *
     * @param int $num
     * @return string
     */
    public function nbsp($num = 1)
    {
        return str_repeat('&nbsp;', $num);
    }

    /**
     * Generate an ordered list of items.
     *
     * @param array $list
     * @param array $attributes
     * @return HtmlString|string
     */
    public function ol($list, $attributes = [])
    {
        return $this->listing('ol', $list, $attributes);
    }

    /**
     * Create a listing HTML element.
     *
     * @param string $type
     * @param array $list
     * @param array $attributes
     * @return HtmlString|string
     */
    protected function listing($type, $list, $attributes = [])
    {
        $html = '';

        if (count($list) === 0) {
            return $html;
        }

        // Essentially we will just spin through the list and build the list of the HTML
        // elements from the array. We will also handled nested lists in case that is
        // present in the array. Then we will build out the final listing elements.
        foreach ($list as $key => $value) {
            $html .= $this->listingElement($key, $type, $value);
        }

        $attributes = $this->attributes($attributes);

        return $this->toHtmlString("<{$type}{$attributes}>{$html}</{$type}>");
    }

    /**
     * Create the HTML for a listing element.
     *
     * @param mixed $key
     * @param string $type
     * @param mixed $value
     * @return string
     */
    protected function listingElement($key, $type, $value)
    {
        if (is_array($value)) {
            return $this->nestedListing($key, $type, $value);
        } else {
            return '<li>' . e($value, false) . '</li>';
        }
    }

    /**
     * Create the HTML for a nested listing attribute.
     *
     * @param mixed $key
     * @param string $type
     * @param mixed $value
     * @return string
     */
    protected function nestedListing($key, $type, $value)
    {
        if (is_int($key)) {
            return $this->listing($type, $value);
        } else {
            return '<li>' . $key . $this->listing($type, $value) . '</li>';
        }
    }

    /**
     * Generate an un-ordered list of items.
     *
     * @param array $list
     * @param array $attributes
     * @return HtmlString|string
     */
    public function ul($list, $attributes = [])
    {
        return $this->listing('ul', $list, $attributes);
    }

    /**
     * Generate a description list of items.
     *
     * @param array $list
     * @param array $attributes
     * @return HtmlString
     */
    public function dl(array $list, array $attributes = [])
    {
        $attributes = $this->attributes($attributes);

        $html = "<dl{$attributes}>";

        foreach ($list as $key => $value) {
            $value = (array)$value;

            $html .= "<dt>$key</dt>";

            foreach ($value as $v_key => $v_value) {
                $html .= "<dd>$v_value</dd>";
            }
        }

        $html .= '</dl>';

        return $this->toHtmlString($html);
    }

    /**
     * Generate a meta tag.
     *
     * @param string $name
     * @param string $content
     * @param array $attributes
     * @return HtmlString
     */
    public function meta($name, $content, array $attributes = [])
    {
        $defaults = compact('name', 'content');

        $attributes = array_merge($defaults, $attributes);

        return $this->toHtmlString('<meta' . $this->attributes($attributes) . '>');
    }

    /**
     * Generate an html tag.
     *
     * @param string $tag
     * @param mixed $content
     * @param array $attributes
     * @return HtmlString
     */
    public function tag($tag, $content, array $attributes = [])
    {
        $content = is_array($content) ? implode('', $content) : $content;

        return $this->toHtmlString('<' . $tag . $this->attributes($attributes) . '>' . $this->toHtmlString($content) . '</' . $tag . '>');
    }

    /**
     * Dynamically handle calls to the class.
     *
     * @param string $method
     * @param array $parameters
     * @return View|mixed
     *
     * @throws BadMethodCallException
     */
    public function __call($method, $parameters)
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
