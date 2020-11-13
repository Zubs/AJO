<?php

// Require autoload
require_once __DIR__.'/../vendor/autoload.php';

// Import classes
use App\App\Application;

// Start app
$app = new Application(dirname(__DIR__));

// Set routes
$app->router->get('/', 'index');

$app->router->get('/about', 'about');

$app->router->get('/contact', 'contact');

// Run app
$app->run();
