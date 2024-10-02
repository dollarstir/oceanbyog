<?php

class Route
{
    /**
     * The URL pattern to match.
     *
     * @var String
     */
    public $endpoint = null;

    /**
     * List of all URL variable names (route parameters).
     *
     * @var array
     */
    public $params = [];

    /**
     * The callback function (or closure) to call when the route matches.
     *
     * @var Closure
     */
    public $view = null;

    /**
     * Register a new route.
     *
     * @param String $endpoint The URL pattern for the route.
     * @param Closure $view The callback to be executed when the URL matches.
     */
    public function __construct($endpoint, $view)
    {
        // Clean up the endpoint by trimming slashes.
        $endpoint = trim($endpoint, '/');

        // Convert parameters in the route (e.g., /user/{id}) into regex.
        $endpoint = preg_replace_callback('/{[^}]+}/', function ($value) {
            // Extract parameter name from curly braces and store it.
            $value = preg_replace("/[\{\}]/", "", $value[0]);
            $this->params[] = $value;

            // Create a regex group for this parameter.
            return "(?<$value>[a-zA-Z0-9_]+)";
        }, $endpoint);

        $this->endpoint = $endpoint;
        $this->view = $view;
    }

    /**
     * Check if the current request matches the route.
     *
     * @param String $uri The current request URI.
     * @return bool True if the request matches, false otherwise.
     */
    public function match($uri)
    {
        $uri = trim($uri, '/');

        // Build a regex pattern for the route
        $pattern = "#^" . $this->endpoint . "$#";

        // Check if the URI matches the pattern and store any matches.
        return preg_match($pattern, $uri, $matches) ? $matches : false;
    }

    /**
     * Execute the callback associated with the route.
     *
     * @param array $params URL parameters passed to the route.
     */
    public function execute($params = [])
    {
        // Call the route's closure with the extracted parameters.
        call_user_func($this->view, $params);
    }
}
