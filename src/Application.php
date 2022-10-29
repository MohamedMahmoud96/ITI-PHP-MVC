<?php

namespace MvcPhp;

use MvcPhp\Http\Request;
use MvcPhp\Http\Response;
use MvcPhp\Http\Route;

class Application 
{
  public $request;
  public $response;
  public $route;

  public function __construct()
  {
 
      $this->request = new Request;
      $this->response = new Response;
      $this->route = new Route($this->request, $this->response);
     
  }

  public function run()
  {
    session()->start();
    return $this->route->requestHandell();
  }


  public function __get($name)
  {
    if(property_exists($this, $name )) {

        return $this->name;
    }
  }
}