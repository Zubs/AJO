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

$app->router->get('/groups', 'groups');

$app->router->get('/groups/new', 'new-group');

$app->router->get('/groups/5', 'single-group');

$app->router->get('/login', 'auth/login');

$app->router->get('/register', 'auth/register');

$app->router->get('/customers', 'customers');

$app->router->get('/customers/new', 'new-customer');

$app->router->get('/customers/5', 'single-customer');

// Run app
$app->run();
