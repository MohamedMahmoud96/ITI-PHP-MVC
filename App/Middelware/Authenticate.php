<?php 

namespace App\Middelware;


class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param   $request
     * @return string|null
     */
    public static function redirectTo($request)
    {
        if (!$request->login()) {
            if(!auth())
            {
                return redirectTo('login');
            }
        }
    }

     /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param   $request
     * @return string|null
     */
    public static function checkAdmin($request)
    {
        if (!$request->Adminlogin()) {
            if(!auth()->role = '1')
            {
                return redirectTo('home');
            }
        }
    }
}
