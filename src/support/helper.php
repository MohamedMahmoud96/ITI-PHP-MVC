<?php

use Dotenv\Parser\Value;
use  MvcPhp\view\view;
use MvcPhp\Application;

if(!function_exists('env'))
{
    function env($key , $default = null)
    {
        return $_ENV[$key] ?? Value($default);
    }
}

if (!function_exists('value'))
{
    function value($value)
    {
        return ($value instanceof Closure) ? $value() : $value;
    }
}

if (!function_exists('asset'))
{
    function asset($url)
    {
        return "../../public/$url";
    }
}




if (!function_exists('bash_path'))
{
    function base_path()
    {
        return dirname(dirname(__DIR__)) .'/' ;
    }
}

if (!function_exists('view_path'))
{
    function view_path()
    {
        return base_path() . 'views/'  ;
    }
}

if(!function_exists('view'))
{
    function view($view, $params = [])
    {
        return view::make($view, $params);
    }
}


if(!function_exists('app'))
{
    function app() {

        static $instance = null;
        if(!$instance)
        {
           $instance = new Application; 
    
        }
        return $instance ;
    }
}