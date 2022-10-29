<?php

namespace App\Controllers;

use App\Models\Login;
use App\Models\user;
use MvcPhp\Cookie;

class LoginController 
{
    protected $errors = [];
    public  $user;
    public function index()
    {
        if($this->isLogged())
        {
            return redirectTo('');
        }
        return view('login', ['errors' => $this->errors]);
    }

    public function login()
    {
       if($this->isVaild())
       {
        if(request()->get('remember'))
        {
            cookie()->set('login', $this->user['remember_token']);
        }else{
          
            session()->set('login', $this->user['remember_token'] );
            
        }

            return redirectTo(' ');
       }else {
           return $this->index();
       }
    }
    public function isVaild()
    {
        $email = request()->get('email');
        $password = request()->get('password');

        if(!$email)
        {
            $this->errors[] = 'Please Insert your Email'; 
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->errors[] = 'Please Enter  Vaild Email '; 
        }

        if(!$password)
        {
            $this->errors[] = 'Please Insert your password'; 
        }

        if(! $this->errors)
        {
            if(!$this->isVaildLogin($email , $password))
            {
                $this->errors[] = 'Please Insert Valid Data'; 
            }
        }
        return empty($this->errors);
    }


    public function isVaildLogin($email , $password)
    {
        $user = user::findone('email' , $email);
        if(!$user)
        {
            return false;
        }

         $this->user = $user;
        return password_verify($password, $user['password']);
    }

    public function isLogged()
    {
        if(cookie()->has('login'))
        {
            $token = cookie()->get('login');
        }else if(session()->has('login'))
        {
            $token = session()->get('login');

        }else{
            $token = '';
        }
        $user =  user::findone('remember_token' , $token);
       
        $this->user = $user;
        if(!$user) return false;
        return true;
    }

    public function auth()
    {
        return $this->user;
    }

}