# native-php-router
This is a simple router written in php for php web apps.

You can fork, edit and add a pull request if you want.

## Instantiation
```php
$router = new FlexRouter();
```

## Usage
```php

/** simple route */
$router->get('/home', function($routeInfo) {
    // respond here.
});

/** route with dynamic parameters */
$router->get('/:username/profile', function($routeInfo) {
    // respond here.
});

```