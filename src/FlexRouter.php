<?php

namespace FlexRouter;

use Exception;
use FlexRouter\Helpers\Router;

/**
 * This is the FlexRouter main class.
 * it handle all routings with all method.
 */
class FlexRouter extends Router
{

    /**
     * default constructor
     */
    public function __construct()
    {
    }

    /**
     * the magic __call method.
     * it helps call http request methods as router class methods dynamically.
     * 
     * @param string $name the method name.
     * @param mixed $arguments the args passed to the method
     */
    public function __call($name, $arguments): void
    {
        if (!in_array(strtoupper($name), $this->allowedMethods)) {
            throw new Exception('Method Not Allowed');
        }

        /** get arguments */
        list($route, $callback) = [$arguments[0], $arguments[1]];

        /** forward to handler */
        $this->handle([
            'method' => strtoupper($name),
            'route'  => $route,
        ], $callback);
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
