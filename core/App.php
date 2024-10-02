<?php

class App
{
    public static function run(){
        // Load routes from the routes.php file

        $routes = require __DIR__ . '/routes.php';


// Parse the URL to get the requested route (URI)
        $requestUri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
        var_dump($requestUri);
        exit();

// Check if the route exists
        if (array_key_exists($requestUri, $routes)) {
            list($controller, $action) = explode('@', $routes[$requestUri]);

            // Instantiate the controller and call the action
            $controllerInstance = new $controller;
            $controllerInstance->$action();
            echo 'working';
        } else {
            // Handle 404 errors
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
        }

    }

}