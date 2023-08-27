<?php

use app\core\Application;
use app\controllers\ContactController;
use app\controllers\AuthController;
use app\models\User;
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config=[
  'userClass' => User::Class,
  'db'=>[
    'dsn' =>$_ENV['DB_DSN'],
    'user'=>$_ENV['DB_USER'],
    'password'=>$_ENV['DB_PASSWORD']
  ]
];
$app = new Application(dirname(__DIR__),$config);
$app->router->get('/', [ContactController::class,'home']);
$app->router->get('/contact',[ContactController::class,'contact']);
$app->router->post('/contact',[ContactController::class,'contact']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);
$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/logout',[AuthController::class,'logout']);
$app->router->get('/profile',[AuthController::class,'profile']);

$app->run();
