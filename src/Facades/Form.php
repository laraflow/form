<?php

namespace Hafijul233\Form\Facades;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class Form
 *
 * @method static \Illuminate\Support\HtmlString model(mixed $model, array  $options = [])
 * @method static \Illuminate\Support\HtmlString open(array $options = [])
 * @method static \Illuminate\Support\HtmlString hidden(string $name, mixed $value = null, array $options = [])
 * @method static \Illuminate\Support\HtmlString input(string $type, string $name, mixed $value = null, array $options = [])
 * @method static \Illuminate\Support\HtmlString getIdAttribute(string $name, array $attributes)
 * @method static \Illuminate\Support\HtmlString getValueAttribute(string $name, string $value = null)
 * @method static \Illuminate\Support\HtmlString token()
 * @method static \Illuminate\Support\HtmlString close()
 * @method static \Illuminate\Support\HtmlString label(string $name, string $value = null, array $options = [], bool $escape_html = true)
 * @method static \Illuminate\Support\HtmlString text(string $name, string $value = null, array $options = [])
 * @method static \Illuminate\Support\HtmlString password(string $name, string $value = null, array $options = [])
 *
 * @method static \Illuminate\Support\HtmlString void assertSentOnDemandTimes(string $notification, int $times = 1)
 * @method static \Illuminate\Support\HtmlString void assertSentToTimes(mixed $notifiable, string $notification, int $times = 1)
 * @method static \Illuminate\Support\HtmlString void assertTimesSent(int $expectedCount, string $notification)
 * @method static \Illuminate\Support\HtmlString void send(Collection|array|mixed $notifiables, $notification)
 * @method static \Illuminate\Support\HtmlString void sendNow(Collection|array|mixed $notifiables, $notification)
 *
 * @see \Hafijul233\Form\Builders\FormBuilder
 * @package Hafijul233\Form\Facades
 *
 */
class Form extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'form';
    }
}
