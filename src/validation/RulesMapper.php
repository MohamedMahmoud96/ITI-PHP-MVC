<?php 
namespace MvcPhp\validation;

use MvcPhp\validation\Rules\AlphanumericRule;
use MvcPhp\validation\Rules\MinRule;
use MvcPhp\validation\Rules\RequiredRule;

trait RulesMapper{
    protected  static array $map =[
        'required' => RequiredRule::class,
        'alnum' => AlphanumericRule::class,
        'max' => MaxRule::class,
        'min'=>MinRule::class,
        'between' => BetweenRule::class,
        'email' => EmailRule::class,
        'confirmed' => ConfirmedRule::class,
        'unique' => UniqueRule::class,
        
    ] ;
    public static function resolve($rule,$options){
        return new static::$map[$rule](...$options);
    }
}