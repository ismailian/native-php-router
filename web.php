<?php

/*
 |++++++++++++++++++++++++
 | Composer autoload.php +
 |++++++++++++++++++++++++
 */
require_once 'vendor/autoload.php';

use FlexRouter\FlexRouter;


/** new Router instance */
$router = new FlexRouter();

// simple route
$router->get('/home', function ($route) {
    header('content-type: application/json');
    print_r($route);
});

// a single-param route
$router->get('/users/:username', function ($route) {
    header('content-type: application/json');
    print_r($route);
});

// multi-param route
$router->get('/users/:username/posts/:post_id/comments/:comment_id/info', function ($route) {
    header('content-type: application/json');
    print_r($route);
});
