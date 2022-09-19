<?php


namespace Laraflow\Form\Traits;


use Illuminate\Support\Str;

trait CommonAttributeTrait
{
    /**
     * Set the Label and name attribute value
     *
     * @param string $label
     * @param string|null $attribute
     * @return self
     */
    public function make(string $label, string $attribute = null)
    {
        $this->label = $label;

        $this->name = (is_null($attribute))
            ? Str::snake($attribute, '_')
            : $attribute;

        return $this;
    }

    /**
     * Set this field should be required or not
     *
     * @param bool $required
     */
    public function required(bool $required = false)
    {
        $this->required = $required;
    }

    /**
     * Set this field should be required or not
     *
     * @param mixed $value
     */
    public function default($value = null)
    {
        $this->default = $value;
    }
}
