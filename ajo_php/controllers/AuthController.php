<?php

namespace App\Controllers;

use App\App\Application;

/**
 * Class AuthController
 * 
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\Controllers
 */
class AuthController
{
    public function login()
    {
        return Application::$App->router->render('auth/login');
    }

    public function postLogin()
    {
        // Code goes here
    }

    public function register()
    {
        return Application::$App->router->render('auth/register');
    }

    public function postRegister()
    {
        // Code goes here
    }

    public function logout()
    {
        // Code goes here
    }

    public function forgotPassword()
    {
        return Application::$App->router->render('auth/forgot-password');
    }

    public function postForgotPassword()
    {
        // Code goes here
    }

    public function resetPassword()
    {
        // Code goes here
    }

    public function postResetPassword()
    {
        // Code goes here
    }
}
