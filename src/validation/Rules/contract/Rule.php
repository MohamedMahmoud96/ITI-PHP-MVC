<?php
namespace MvcPhp\validation\Rules\contract;
 interface Rule{
    function apply($field,$value,$data=[]); 
}