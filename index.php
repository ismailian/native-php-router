<?php


/**
 * 
 * Require files
 * 
 */
require_once __DIR__ . '/config/__init.php';
require_once __DIR__ . '/router/index.php';


/**
 * new Instance of router
 */
$router = new Router();


/**
 * handle / route
 */
$router->get('/', 'index.html');


/**
 * handle /home route
 */
$router->get('/home', 'index.html');


/**
 * handle /about route
 */
$router->get('/about', 'about.html');


/**
 * handle /contact route
 */
$router->get('/contact', 'contact.html');