<?php

namespace MvcPhp\validation\Rules;

class MinRule
{
    protected $min;
    public function __construct($min)
    {
        $this->min = $min;
    }

    public function apply($field, $value, $data = [])
    {
        if (strlen($value) < $this->min) {
            return false;
        }

        return true;
    }

    public function __toString()
    {
        return "%s must be greater than {$this->min} ";
    }
}
