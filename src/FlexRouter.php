<?php

namespace FlexRouter;

use Exception;
use FlexRouter\Helpers\Router;

/**
 * This is the FlexRouter main class.
 * it handles all routing with all method.
 */
class FlexRouter extends Router
{

    /**
     * the magic __call method.
     * it helps call http request methods as router class methods dynamically.
     *
     * @param string $name the method name.
     * @param mixed $arguments the args passed to the method
     * @throws Exception
     */
    public function __call(string $name, $arguments): void
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
}
