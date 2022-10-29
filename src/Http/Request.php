<?php

namespace MvcPhp\Http;

class Request
{

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path()
    {
        $path = $_SERVER['REQUEST_URI']  ?? '/';
        $filepath = filepath();
        $pattern = "/(.*)($filepath)/";
        $path =  preg_replace($pattern, '', rtrim($path, '/'));
        $path == '' ? $path = '/' : rtrim($path , '/');
        return str_contains($path, '?' ) ? explode('?', $path)[0] : $path;
    }


    public function all()
    {
        return $_REQUEST;
    }

    public function has($key)
    {   
        if(isset($_REQUEST[$key]))
        {   
            return true;
        }

        return false;
     
    }

    public function get($key)
    {   
       if($this->has($key))
        {
            return $_REQUEST[$key];
        }
       
    }

  

}   
 