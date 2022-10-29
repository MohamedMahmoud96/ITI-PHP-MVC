<?php


namespace MvcPhp;

class Cookies
{
	

	/**
	* Set new value to cookie
	* 
	* @param string $key
	* @param string $value
	* @param int $expire
	* @return void
	*/
	public function set($key, $value, $day = 86400)
	{
		 setcookie($key, $value, time() + $day * 7, '','', FALSE, TRUE);
	}

	/**
	* Determine if the given key exists in cookie
	* 
	* @param string $key
	* @return bool
	*/
	public function has($key)
	{
		return isset($_COOKIE[$key]);
	}

	/**
	* get the cookie value with the given name
	* 
	* @param string $key
	* @return mixed
	*/
	public function get($key, $default = null)
	{
		if($this->has($key)){

			return $_COOKIE[$key];
		}else{
			return $default;
		}
      
		
	}

	/**
	* get all cookie
	* 
	* @return array
	*/
	public function all()
	{
		return isset($_COOKIE) ? $_COOKIE : null ;
	}

	/**
	* remove the given key from cookies
	* 
	* @param $key
	* @return void
	*/
	public function remove($key)
	{
		 setcookie($key , '', -1);
		 unset($_COOKIE[$key]);
	}

	/**
	* Destroy cookie
	*
	* @return void
	*/
	public function destroy()
	{
		foreach (array_keys($this->all()) as $key) {
			$this->remove($key);
		}
	}



}
