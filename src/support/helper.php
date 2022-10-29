<?php


use App\Models\Login;
use App\Models\user;
use Dotenv\Parser\Value;
use  MvcPhp\view\view;
use MvcPhp\Application;
use MvcPhp\Cookies;
use MvcPhp\Http\Request;
use MvcPhp\Session;

use  MvcPhp\view\view;
use MvcPhp\Application;
use Dotenv\Parser\Value;
use MvcPhp\validation\Validator;


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


if(!function_exists('asset'))
{
    function assets($path)
    {
        return url('public/' . $path);
    }
}


if(!function_exists('request'))
{
    function request($key = null)
    {
        $inst = new Request; 

        if(!$inst)
        {
           return new request; 
        }

        return $inst;
    }
}

if(!function_exists('back')) 
{
function back()
{
    header('Location:' . $_SERVER['HTTP_REFERER']);
   
}
}

function filepath()
{
    $filepath = str_replace('\\', '/' , base_path());
    $filepath = explode('/' , rtrim($filepath , '/'));
    $filepath = end($filepath);
    return $filepath;
}

if(!function_exists('url'))
{
    function url($path)
    {

       return server('REQUEST_SCHEME') . "://" . server('HTTP_HOST') .'/'. filepath() .'/' . $path;
    }
}

if(!function_exists('route'))
{
    function route($path)
    {

       echo url($path);
    }
}
if(!function_exists('server')){
 function server($key)
{
    return $_SERVER[$key];
}
}

if(!function_exists('redirectTo')){
    function redirectTo($path)
   {
         header('Location:' . url($path));
      
   }
}

if(!function_exists('cookie'))
{
    function cookie() {

        static $instance = null;
        if(!$instance)
        {
           $instance = new Cookies; 
    
        }
        return $instance ;
    }
}

if(!function_exists('session'))
{
    function session() {
        static $instance = null;
        if(!$instance)
        {
           $instance = new Session;
        }
        return $instance ;
    }
}



if(!function_exists('auth'))
{
       function auth()
       {
            if(cookie()->has('login'))
            {
                $token = cookie()->get('login');
            }else if(session()->has('login'))
            {
                $token = session()->get('login');
    
            }else{
                $token = '';
            }
            $user =  user::findone('remember_token' , $token);
           
            return $user;
        
       } 
}




   
=======
if (!function_exists('validator')) {
    function validator()
    {
        return (new Validator());
    }
}

