<?php

class Router
{
    /**
     * Holds the registered routes.
     *
     * @var Route[]
     */
    private $routes = [];

    /**
     * Requested route (URL).
     *
     * @var string
     */
    private $action;

    /**
     * Register a new route.
     *
     * @param array $routes List of Routes
     */
    public function __construct($routes = [])
    {
        $this->routes = $routes;
        $this->action = $_SERVER['REQUEST_URI'];
    }

    /**
     * Launch the router and match the current request to a route.
     */
    public function launch()
    {
        try {
            $requestUri = $_SERVER['REQUEST_URI'];
            $scriptName = $_SERVER['SCRIPT_NAME'];

            // Determine the base path of the application (e.g., /task1)
            $basePath = dirname($scriptName);

            // Remove the base path from the request URI
            if (strpos($requestUri, $basePath) === 0) {
                $requestUri = substr($requestUri, strlen($basePath));
            }

            $requestUri = trim($requestUri, '/');
            $action = trim(explode('?', $requestUri)[0], '/');

            $selectedRoute = null;
            $params = [];

            foreach ($this->routes as $route) {
                if (preg_match("%^{$route->endpoint}$%", $action, $matches) === 1) {
                    $selectedRoute = $route;
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                    break;
                }
            }

            // Handle route not found
            if (is_null($selectedRoute)) {
                $this->handleNotFound();
            }

            // Handle method not callable or undefined method
            if (!is_callable($selectedRoute->view)) {
                throw new Error("The method for this route is not callable or not defined.");
            }

            // If everything is fine, call the matched route's view
            call_user_func($selectedRoute->view, array_merge($params, $_GET));
        } catch (Exception $e) {
            $this->handleError($e);
        } catch (Error $e) {
            $this->handleError($e);
        }
    }

    /**
     * Handle 404 errors when no route is found.
     */
    private function handleNotFound()
    {
        http_response_code(404);
//
        Viewer::view('core/errors/404');
        exit;
    }

    /**
     * Handle generic errors or exceptions and display a custom error message.
     *
     * @param \Throwable $e
     */
    private function handleError($e)
    {
        http_response_code(500);
        Viewer::view('core/errors/500');
        exit;
    }
}
