<?php


use Slim\Http\Request;
use Slim\Http\Response;

// Index
$app->get('/', function (Request $request, Response $response) {
    return $this->renderer->render($response, 'home.phtml');
});

// Register
$app->get('/register',  UserController::class.':index');
$app->post('/register', UserController::class.':create');
