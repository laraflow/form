<?php


namespace Laraflow\Form\Traits;


use Laraflow\Form\Field;

trait CommonAttributeTrait
{
    /**
     * Set this field should be required or not
     *
     * @param bool $required
     * @return self
     */
    public function required(bool $required = false)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Set this field should be required or not
     *
     * @param mixed $value
     * @return self
     */
    public function default($value = null)
    {
        $this->default = $value;

        return $this;
    }

    /**
     * Set icon for field
     *
     * @param string $icon
     * @param string $position
     * @return self
     */
    public function icon(string $icon, string $position = Field::ICON_PREPEND)
    {
        $this->icon['class'] = $icon;

        $this->icon['position'] = $position;

        return $this;

    }
}
