<?php

namespace MvcPhp\validation\Rules;

use MvcPhp\Database\Model;

class UniqueRule
{
    protected $table;

    protected $column;

    public function __construct($table, $column)
    {
        $this->table = $table;
        $this->column = $column;
    }
 
    public function apply($field, $value, $data = [])
    {   
        return !(Model::query('select * from products where id=2;'));
     
    }

    public function __toString()
    {
        return 'This %s is already taken';
    }
}
