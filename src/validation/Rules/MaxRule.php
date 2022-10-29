<?php
namespace MvcPhp\validation\Rules;
class MaxRule{
    protected $max;
    public function __construct($max)
    {
        $this->max = $max;
    }

    public function apply($field, $value, $data = [])
    {
        if (strlen($value) > $this->max) {
            return false;
        }

        return true;
    }

    public function __toString()
    {
        return "%s must be less than {$this->max}";
    }
}