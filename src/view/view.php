<?php

namespace MvcPhp\view;

class view
{
    public static function make($view, $params = [])
    {
        $content = self::getContent();

        $viewContent = self::getViewContent($view, params: $params);
    
     echo str_replace('{{content}}', $viewContent, $content);
    }


    public static function makeError($error){

        self::getViewContent($error, true);
    }


    protected static function getContent()
    {
        ob_start();

       include base_path() . '/views/layouts/main.php';

       return ob_get_clean();
    }

    protected static function getViewContent($view, $isError = false,$params = [])
    {
        $path = $isError ? view_path().'404.php' : view_path();
     
        if(str_contains($view, '.')) {
            $views = explode('.', $view);
            foreach ($views as $view)
            {
               if(is_dir($path . $view)) {
                    $path = $path .$view . '/';
                }

            }
           
           $view = $path . $view . '.php';
   
        } else{
            $view = $path . $view . '.php';
        }

        foreach($params as $param => $value)
        {
            $$param = $value;
        }

        if($isError)
        {
            include $path ;
        }else {
            ob_start();
            include $view;
            return ob_get_clean();
        }
    }


             
   
}
