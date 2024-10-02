<?php
class Router
{
private $routes = [];
private $action;

public function __construct($routes = [])
{
$this->routes = $routes;
$this->action = $_SERVER['REQUEST_URI'];
}

public function launch()
{
try {
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];
$basePath = dirname($scriptName);

if (strpos($requestUri, $basePath) === 0) {
$requestUri = substr($requestUri, strlen($basePath));
}

$requestUri = trim($requestUri, '/');
$action = trim(explode('?', $requestUri)[0], '/');

$selectedRoute = null;
$params = [];

foreach ($this->routes as $route) {
// Convert {id} or {parameter} into a named regex group (?P<id>[\w-]+)
    $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[\w-]+)', $route->endpoint);

    if (preg_match("%^{$pattern}$%", $action, $matches) === 1) {
    $selectedRoute = $route;
    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
    break;
    }
    }

    if (is_null($selectedRoute)) {
    $this->handleNotFound();
    }

    if (!is_callable($selectedRoute->view)) {
    throw new Error("The method for this route is not callable or not defined.");
    }

    call_user_func($selectedRoute->view, array_merge($params, $_GET));
    } catch (Exception $e) {
    $this->handleError($e);
    } catch (Error $e) {
    $this->handleError($e);
    }
    }

    private function handleNotFound()
    {
    http_response_code(404);
    Viewer::view('core/errors/404');
    exit;
    }

    private function handleError($e)
    {
    http_response_code(500);
    Viewer::view('core/errors/500');
    exit;
    }
    }
