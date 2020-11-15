<?php

namespace App\Controllers;

use App\App\Application;

/**
 * Class CustomerController
 * 
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\Controllers
 */
class CustomerController
{
    public function index()
    {
        // Code goes here
    }

    public function show()
    {
        return Application::$App->router->render('user/single-customer');
    }

    public function create()
    {
        return Application::$App->router->render('user/new-customer');
    }

    public function store()
    {
        // Code goes here
    }

    public function makePayment()
    {
        // Code goes here
    }

    public function delete()
    {
        // Code goes here
    }
}
