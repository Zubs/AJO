<?php

// Require autoload
require_once __DIR__.'/../vendor/autoload.php';

// Import classes
use App\App\Application;
use App\Controllers\ContactController;
use App\Controllers\PagesController;
use App\Controllers\GroupController;
use App\Controllers\AuthController;
use App\Controllers\CustomerController;

// Start app
$app = new Application(dirname(__DIR__));

// Set routes
$app->router->get('/', [PagesController::class, 'index']);
$app->router->get('/about', [PagesController::class, 'about']);

$app->router->get('/contact', [ContactController::class, 'create']);
$app->router->post('/contact', [ContactController::class, 'store']);

$app->router->get('/groups', [GroupController::class, 'index']);
$app->router->get('/groups/new', [GroupController::class, 'create']);
$app->router->post('/groups/new', [GroupController::class, 'store']);
$app->router->get('/groups/5', [GroupController::class, 'show']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'postLogin']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'postRegister']);
$app->router->get('/forgot-password', [AuthController::class, 'forgotPassword']);
$app->router->post('/forgot-password', [AuthController::class, 'postForgotPassword']);
$app->router->get('/logout', [AuthController::class, 'logout']); // This could well be a post request too, I'd decide later
$app->router->get('/reset-password', [AuthController::class, 'resetPassword']);
$app->router->post('/reset-password', [AuthController::class, 'postResetPassword']);

$app->router->get('/customers', [CustomerController::class, 'index']);
$app->router->get('/customers/new', [CustomerController::class, 'create']);
$app->router->get('/customers/5', [CustomerController::class, 'show']);

// Run app
$app->run();
