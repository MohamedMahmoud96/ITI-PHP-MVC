<?php

    namespace MvcPhp\Http;

use MvcPhp\view\view;

    class Route 
    {
<<<<<<< HEAD

=======
>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
        public static array $routes = [];
        public Request $request;
        public Response $response;

        public function __construct(Request $request, Response $response)
        {
            $this->request = $request;
            $this->response = $response;
<<<<<<< HEAD

        }
      
  
        public static function get($route , $action)
        {
            self::$routes['get'][$route] = $action ;
       
=======
        }
    
        public static function get($route , $action)
        {
            self::$routes['get'][$route] = $action ;
>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
        }

        public static function post($route , $action)
        {
            self::$routes['post'][$route]  = $action;
        }

        public function requestHandell()
        {
            $path = $this->request->path();
            $method = $this->request->method();
            $action = self::$routes[$method][$path] ?? false;
          
            if(!array_key_exists($path, self::$routes[$method])){
                  
                view::makeError('404');
            }
            
<<<<<<< HEAD

=======
>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
            if(is_callable($action))
            {
               // call_user_func_array($action, []);
                return $action();
            }
            
            if(is_array($action))
            {
<<<<<<< HEAD
               
                call_user_func_array([new $action[0], $action[1]], []);
             //  $controller = new $action[0];
              
               
=======
                call_user_func_array([new $action[0], $action[1]], []);
             //  $controller = new $action[0];
              
>>>>>>> af5c7fe21541bfe995231b3b6bed0f06bfaf1dcc
            }

        }
    }
   
    

    /// get('home', 'homecontroller@index')