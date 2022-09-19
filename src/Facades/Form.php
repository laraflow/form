<?php

namespace Laraflow\Form\Facades;

use Closure;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\HtmlString;

/**
 * Class Form
 *
 * @see \Laraflow\Form\Builders\FormBuilder
 *
 * @method static HtmlString model(mixed $model, array $options = [])
 * @method static HtmlString open(array $options = [])
 * @method static HtmlString hidden(string $name, mixed $value = null, bool $required = false, array $options = [])
 * @method static HtmlString input(string $type, string $name, mixed $value = null, bool $required = false, array $options = [])
 * @method static HtmlString getIdAttribute(string $name, array $attributes)
 * @method static HtmlString getValueAttribute(string $name, string $value = null)
 * @method static HtmlString token()
 * @method static HtmlString close()
 * @method static HtmlString label(string $name, string $title = null, bool $required = false, array $options = [], bool $escape_html = true)
 * @method static HtmlString text(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString password(string $name, bool $required = false, array $options = [])
 * @method static HtmlString range(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString search(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString email(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString tel(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString url(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString number(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString textarea(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString file(string $name, bool $required = false, array $options = [])
 * @method static HtmlString date(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString error(string $name, bool $all = false, bool $required = false, array $options = [])
 * @method static HtmlString datetime(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString datetimeLocal(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString time(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString week(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString selectRange(string $name, string $begin, string $end, string $selected = null, bool $required = false, array $options = [])
 * @method static HtmlString select(string $name, array $list = [], string $selected = null, bool $required = false, array $selectAttributes = [], array $optionsAttributes = [], array $optgroupsAttributes = [])
 * @method static HtmlString selectYear(string $name, string $begin, string $end, string $selected = null, bool $required = false, array $options = [])
 * @method static HtmlString selectMonth(string $name, string $selected = null, bool $required = false, array $options = [])
 * @method static HtmlString checkbox(string $name, mixed $value = 1, bool $checked = null, bool $required = false, array $options = [])
 * @method static HtmlString radio(string $name, mixed $value = 1, bool $checked = null, bool $required = false, array $options = [])
 * @method static HtmlString reset(string $value, array $attributes = [])
 * @method static HtmlString image(string $url, string $name = null, array $attributes = [])
 * @method static HtmlString month(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString color(string $name, string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString submit(string $name = 'submit', string $value = null, bool $button = false, bool $required = false, array $options = [])
 * @method static HtmlString button(string $value = null, bool $required = false, array $options = [])
 * @method static HtmlString datalist(string $id, array $list = [])
 * @method static HtmlString component(string $name, string $view, array $attributes = [])
 * @method static HtmlString macro(string $name, Closure $function)
 *
 * @see \Laraflow\Form\Providers\LabelServiceProvider
 *
 * @method static HtmlString  hLabel(string $name, string $title, bool $required = false, array $options = ['col_size' => 2])
 * @method static HtmlString  fLabel(string $name, string $title, bool $required = false, array $options = ['col_size' => 2])
 *
 *
 * @see \Laraflow\Form\Providers\HorizontalFieldServiceProvider
 *
 * @method static HtmlString hText(string $name, string $label, mixed $default = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hEmail(string $name, string $label, mixed $default = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hPassword(string $name, string $label, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hRange(string $name, string $label, mixed $default = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hSearch(string $name, string $label, mixed $default = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hTel(string $name, string $label, mixed $default = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hNumber(string $name, string $label, mixed $default = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hDate(string $name, string $label, mixed $default = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hUrl(string $name, string $label, mixed $default = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hFile(string $name, string $label, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hTextarea(string $name, string $label, mixed $default = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hSelect(string $name, string $label, mixed $data = [], mixed $selected = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hSelectMulti(string $name, string $label, mixed $data = [], mixed $selected = [], bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hSelectRange(string $name, string $label, mixed $begin = 0, mixed $end = 100, $selected = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hSelectDay(string $name, string $label, mixed $selected = null, $selected = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hSelectMonth(string $name, string $label, mixed $selected = null, bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hCheckbox(string $name, string $label, mixed $values = [], mixed $checked = [], bool $required = false, int $col_size = 2, array $attributes = [])
 * @method static HtmlString hRadio(string $name, string $label, mixed $values = [], mixed $checked = null, bool $required = false, int $col_size = 2, array $attributes = [])
 *
 *
 * @see \Laraflow\Form\Providers\RegularFieldServiceProvider
 *
 * @method static HtmlString nText(string $name, string $label, mixed $default = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nEmail(string $name, string $label, mixed $default = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nPassword(string $name, string $label, bool $required = false, array $attributes = [])
 * @method static HtmlString nRange(string $name, string $label, mixed $default = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nSearch(string $name, string $label, mixed $default = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nTel(string $name, string $label, mixed $default = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nNumber(string $name, string $label, mixed $default = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nDate(string $name, string $label, mixed $default = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nUrl(string $name, string $label, mixed $default = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nFile(string $name, string $label, bool $required = false, array $attributes = [])
 * @method static HtmlString nTextarea(string $name, string $label, mixed $default = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nSelect(string $name, string $label, mixed $data = [], mixed $selected = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nSelectMulti(string $name, string $label, mixed $data = [], mixed $selected = [], bool $required = false, array $attributes = [])
 * @method static HtmlString nSelectRange(string $name, string $label, mixed $begin = 0, mixed $end = 100, $selected = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nSelectDay(string $name, string $label, mixed $selected = null, $selected = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nSelectMonth(string $name, string $label, mixed $selected = null, bool $required = false, array $attributes = [])
 * @method static HtmlString nCheckbox(string $name, string $label, mixed $values = [], mixed $checked = [], bool $required = false, array $attributes = [])
 * @method static HtmlString nRadio(string $name, string $label, mixed $values = [], mixed $checked = null, bool $required = false, array $attributes = [])
 **/
class Form extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'form';
    }
}
