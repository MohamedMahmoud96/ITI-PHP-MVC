<?php

namespace MvcPhp;


class Session
{
	
	/**
	* start session
	*
	* @return void
	*/

	public function start()
	{
		ini_set('session.use_only_cookie', 1);

		// if found session or no
		if(!session_id())
		{
		  session_start();
		}
	}

	/**
	* set new value to session
	*
	* @param staring $key $value
	* @param mixed $value
	* @return void
	*/

	public function set($key , $value)
	{
		$_SESSION[$key] = $value;
	}

	/**
	* get value from session by the given key
	*
	* @param string $key
	* @param mixed $default
	* @return mixed
	*/

	public function get($key, $default = null)
	{
		if($this->has($key)){

			return $_SESSION[$key];
		}else{
			return $default;
		}
	}

	/**
	* Determine if the session has the given key
	*
	* @param $key
	* @return bool
	*/
	public function has($key)
	{
		return isset($_SESSION[$key]);
	}

	/**
	* remove the given key from session
	*
	* @param string $key
	* @return void
	*/

	public function remove($key)
	{
		unset($_SESSION[$key]);
		
	}

	/**
	* Get value from session by the given key then remove it
	*
	* @param string $key
	* @return mixed
	*/

	public function pull($key)
	{
		$value = $this->get($key);
		$this->remove($key);
		return $value;
	}

	/**
	* get all session data
	*
	* @return array
	*/

	public function all()
	{
		print_r($_SESSION);
	}

	/**
	* destroy session
	*
	* @return void
	*/

	public function destroy()
	{
		session_unset();
		session_destroy();
	}

}