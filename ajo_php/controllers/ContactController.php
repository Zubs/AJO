<?php

namespace App\Controllers;

use App\App\Application;

/**
 * Class ContactController
 * 
 * @author Zubs <zubairidrisaweda@gmail.com>
 * @package App\Controllers
 */
class ContactController
{
    public function create()
    {
        return Application::$App->router->render('contact');
    }

    public function store()
    {
        return "You entered " . $_POST['text'] . " into the form";
    }
}
