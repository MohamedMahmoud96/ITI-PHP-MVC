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
        $filepath = str_replace('\\', '/' , base_path());
        $filepath = explode('/' , rtrim($filepath , '/'));
        $filepath = end($filepath);
        $pattern = "/(.*)($filepath)/";
        $path =  preg_replace($pattern, '', rtrim($path, '/'));
        $path == '' ? $path = '/' : rtrim($path , '/');
        return str_contains($path, '?' ) ? explode('?', $path)[0] : $path;
    }

}   
 