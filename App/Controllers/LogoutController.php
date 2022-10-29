<?php 

namespace App\Controllers;
use MvcPhp\Controller;

class LogoutController 
{
	/**
	* log the user out 
	*
	* @return mixed
	*/
	public function index()
	{
		session()->destroy();
		cookie()->destroy();
		return redirectTo('login');
	}
}