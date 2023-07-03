<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\HomeController;
use app\core\Application;


$app = new Application(dirname(__DIR__));

$app->router->get('/', function () {
  return 'Hello Wolrd';
});

$app->router->get('/hai', [HomeController::class, 'index']);
$app->router->get('/hai2', "hello");
$app->router->get('/test', function(){
  return "Test bro";
});
$app->router->post('/test', [HomeController::class, 'get']);
$app->router->get('/hai/2', [app\controllers\HomeController::class, 'index']);

$app->run();