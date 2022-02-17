<?php

namespace FlexRouter\Helpers;

/**
 * this is the Route class.
 * it represents and contains all the route info, url, method, parameters.
 */
class Route
{

    /**
     * @var string $method a property holding request method.
     */
    public $method;

    /**
     * @var string $route a property holding route.
     */
    public $route;

    /**
     * @var string $url a property holding request url.
     */
    public $url;

    /**
     * @var bool $isMatch a property indicating whether url matches route.
     */
    public $isMatch;

    /**
     * @var string $params a property holding url parameters. 
     */
    public $params;

    /**
     * default constructor
     * @param array $routeInfo information about route. 
     * @param array $urlInfo information about url. 
     */
    public function __construct(array $routeInfo, array $urlInfo)
    {
        $this->method  = $routeInfo['method'];
        $this->route   = $routeInfo['route'];
        $this->url     = $urlInfo['url'];
        $this->params  = (object)$urlInfo['params'];
        $this->isMatch = $urlInfo['isMatch'] && ($_SERVER['REQUEST_METHOD'] === $this->method);
    }
}
