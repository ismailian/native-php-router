<?php

namespace FlexRouter\Helpers;

/**
 * this is the Router generic class.
 */
class Router
{

    use Url;

    /**
     * @var bool $handled a property indicating whether the url requested has been handled or not.
     */
    public $handled = false;

    /**
     * @var array $allowedMethods all the methods allowed by this web app.
     */
    public $allowedMethods = ['HEAD', 'GET', 'POST', 'PUT', 'DELETE'];

    /**
     * handle route
     * @param array $routeInfo the route info [method, route]
     * @param callable $callback the function to call if route is matched.
     */
    public function handle(array $routeInfo, callable $callback)
    {
        $reqUrl = $_SERVER['REDIRECT_URL'];

        /** new route instance */
        $route = new Route($routeInfo, $this->getInfo($reqUrl, $routeInfo['route']));

        if ($route->isMatch) {
            $this->handled = true;
            $callback($route);
        }
    }

    /**
     * default destructor.
     * it takes care of unhandled routes.
     */
    public function __destruct()
    {
        if (!$this->handled) {
            die("Unhandled Route");
        }
    }
}
