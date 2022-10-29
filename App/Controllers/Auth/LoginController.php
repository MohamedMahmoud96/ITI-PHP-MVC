<?php
namespace App\Controllers\Auth;
session_start();

use App\Models\user;
use MvcPhp\validation\Validator;

class LoginController{
    public function index()
    {
        return view('Auth.login');
    }
    public function login()
    {   
        dump($_REQUEST);
        
        //get data from request
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        //validation
        $validator = new Validator();
        $validator->setRules([ 
            'email' => 'required|email',
            'password' => 'required|alnum|between:8,32'
        ]);
        $validator->make(['email'=>$email,'password'=>$password]);
        //error
        // if error existes redirect with error
        if (!$validator->passses()){
            $_SESSION['errors']=$validator->errors();
            header('Location:'.$_SERVER['HTTP_REFERER']); 
        }
       
        // check [email in user table , password correct]
        $user=User::query("select * from users where email={$email}");
        if ($user){
           if(password_verify($password,$user['password'])){
             echo "success";
           }
         
        }
    
        // if no errors => redirect to home with user 
        
    }
}