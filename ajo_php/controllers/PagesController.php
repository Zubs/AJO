<?php

namespace App\Controllers;

use App\App\Application;

/**
 * Class PagesController
 * 
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\Controllers
 */
class PagesController
{
    public function index()
    {
        return Application::$App->router->render('index');
    }

    public function about()
    {
        return Application::$App->router->render('about');
    }
}
