<?php

namespace MvcPhp\validation;

use MvcPhp\validation\Rules\contract\Rule;



class Validator
{
    protected $data = [];
    protected $rules = [];
    protected ErrorBag $errorBag;
    protected $aliases = [];

    function make($data)
    {
        $this->data = $data;
        $this->errorBag = new ErrorBag;
        $this->validate();
    }

    function validate()
    {
        foreach ($this->rules as $filed => $rules) {
            foreach( RulesResolver::make($rules) as $rule){
                return $this->applyRule($filed,$rule);
            }
        }
    }
    function applyRule($filed, Rule $rule){
        if (!$rule->apply($filed,$this->getFieldValue($filed),$this->data)){
            $this->errorBag->add($filed,Message::generate($rule,$this->aliases($filed)));
        }

    }
    function setRules($rules)
    {
        $this->rules = $rules;
    }
    function getFieldValue($filed){
        return $data[$filed]?? null;
    }
    function passses()
    {
        return empty($this->errors());
    }
    function errors($key = null)
    {
        return $key ? $this->errorBag->errors[$key] : $this->errorBag->errors;
    }
    public function aliases($filed)
    {
        return $this->aliaes[$filed] ?? false;
    }
    public function setAliases($aliases)
    {
        $this->aliases = $aliases;
    }
}
