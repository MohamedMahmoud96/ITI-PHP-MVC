<?php
namespace MvcPhp\validation\Rules;


use MvcPhp\validation\Rules\contract\Rule;
class RequiredRule implements Rule {
   function apply($field,$value,$data=[])
   {
     return !empty($value);
   }
   function __toString()
   {
    return "%s is Required and cannot be empty";
   }
}