<?php

namespace FlexRouter\Helpers;

/**
 * the Url trait
 */
trait Url
{

    /**
     * Extract dynamic parameter names from route if it is dynamic.
     * 
     * @param string $route the route to check for parameters.
     * @return array returns an array containing all parameter names and their value pattern.
     */
    public function getParams(string $route): array
    {
        @preg_match_all('/\/(?<name>\:[^\s\/\-]+)\/?/', $route, $result);

        $params = [];
        foreach ($result['name'] as $param) {
            $params['/\\' . $param . '/'] = '(?<' . substr($param, 1) . '>[^\s/]+)';
        }

        return $params;
    }

    /**
     * get info about the url,
     * parameters and their corresponding values from the url if it is a dynamic route.
     * @param string $url the request url.
     * @param string $route the route.
     */
    public function getInfo(string $url, string $route): array
    {
        /** get params */
        $params = $this->getParams($route);

        list($newRoute, $routeLength, $lastSlashPos) = [$route, strlen($route), strrpos($route, '/')];
        $newRoute .= ($routeLength - 1 === $lastSlashPos) ? '?' : '/?';

        $regex = @preg_replace(array_keys($params), array_values($params), $newRoute);
        $regex = @str_replace('/', '\/', $regex);

        @preg_match("/^(?<valid>$regex)$/", $url, $data);

        $params = array_filter($data ?? [], function ($group_name) {
            return (!is_numeric($group_name) && $group_name !== 'valid');
        }, ARRAY_FILTER_USE_KEY);

        return [
            'url'     => $url,
            'route'   => $route,
            'isMatch' => isset($data['valid']),
            'params'  => $params
        ];
    }
}
