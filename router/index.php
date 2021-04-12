<?php

class Router {


    /**
     * indicated wether the route has been successfully handled.
     */
    private $handled = false;

    function __construct() {}

    /**
    * handle get routes/requests
    * 
    * @var $route string the route to handle.
    * @var $view string the view to render.
    */
    public function get($route, $view)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return false;
        }

        $uri = $_SERVER['REQUEST_URI'];
        if ($uri === $route) {
            $this->handled = true;
            return include_once (views . $view);
        }
    }

    /**
     * handle post routes/requests
     * 
     * @var $route string the route to handle.
     * @var $view string the view to render.
     */
    public function post($route, $view)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        $uri = $_SERVER['REQUEST_URI'];
        if ($uri === $route) {
            $this->handled = true;
            return include_once (views . $view);
        }
    }


    /**
     * handle non-existing routes.
     */
    function __destruct() 
    {
        if (!$this->handled) {
            return include_once(views . '404.html');
        }
    }

}