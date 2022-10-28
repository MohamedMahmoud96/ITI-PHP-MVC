<?php
namespace MvcPhp\validation;

class ErrorBag{
    protected $errors=[];
    function add($field,$message){
        $this->errors[$field][]=$message;
    }
    function __get($name){
        if (property_exists($this,$name)){
              return $this->name;
        }
        
    }

}
