<<<<<<< HEAD
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
        // dump($path);
        $filepath = explode('/' , rtrim(base_path(), '/'));

        // dump($filepath);

        // dump($path);
        $y =  str_contains(end($filepath),"C:\\xampp\htdocs") ;
            if($y)
            {
                // echo 'yes';

               $filepath= str_replace("C:\\xampp\htdocs", "", end($filepath));
               $filepath= str_replace("\\", "/",$filepath);
               
            }
//  dump($filepath);
        // $x=explode($path , end($filepath));
        // dump($x);

    //    $u= str_contains(end($filepath),"C:\\xampp\htdocs")?str_replace("C:\\xampp\htdocs","",end($filepath)):"";
    //   dump($u);
        // preg_replace($pattern, "W3Schools", $str);
        
        $path = rtrim(str_replace($filepath.'/', '', $path), '/');
        $path == '' ? $path = '/' : $path;

        // dump($path);
        return str_contains($path, '?' ) ? explode('?', $path)[0] : $path;


    }

}   
=======
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
        // dump($path);
        $filepath = explode('/' , rtrim(base_path(), '/'));

        // dump($filepath);

        // dump($path);
        $y =  str_contains(end($filepath),"C:\\xampp\htdocs") ;
            if($y)
            {
                // echo 'yes';

               $filepath= str_replace("C:\\xampp\htdocs", "", end($filepath));
               $filepath= str_replace("\\", "/",$filepath);
               
            }
//  dump($filepath);
        // $x=explode($path , end($filepath));
        // dump($x);

    //    $u= str_contains(end($filepath),"C:\\xampp\htdocs")?str_replace("C:\\xampp\htdocs","",end($filepath)):"";
    //   dump($u);
        // preg_replace($pattern, "W3Schools", $str);
        
        $path = rtrim(str_replace($filepath.'/', '', $path), '/');
        $path == '' ? $path = '/' : $path;

        // dump($path);
        return str_contains($path, '?' ) ? explode('?', $path)[0] : $path;


    }

}   
>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
 