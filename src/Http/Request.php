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
        $filepath = explode('/' , rtrim(base_path(), '/'));
        
        $path = rtrim(str_replace(end($filepath).'/', '', $path), '/');

        $path == '' ? $path = '/' : $path;
        return str_contains($path, '?' ) ? explode('?', $path)[0] : $path;
    }

}   
 