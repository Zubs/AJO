<?php

namespace App\Controllers;

use App\App\Application;

/**
 * Class GroupController
 * 
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\Controllers
 */
class GroupController
{
    public function index()
    {
        return Application::$App->router->render('groups');
    }

    public function show()
    {
        return Application::$App->router->render('single-group');
    }

    public function create()
    {
        return Application::$App->router->render('new-group');
    }

    public function store()
    {
        return "Yo dawg";
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
