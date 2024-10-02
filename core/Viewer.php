<?php
class Viewer
{
    /**
     * Generate a complete URL for assets, taking into account the base URL.
     *
     * @param string $path The relative path to the asset (e.g., 'assets/media/images/example.png').
     * @param array $headers Optional headers to send when serving the asset.
     * @return void
     */
    public static function assets($path = '', $headers = [])
    {
        // Retrieve base URL from configuration or default it
        $baseUrl = Config::get('BASE_URL') ?? '/';
        $fullPath = rtrim($baseUrl, '/') . '/' . ltrim($path, '/');

        // Send any custom headers if provided
        foreach ($headers as $key => $value) {
            header("$key: $value");
        }

        // Clean the path and include the file if it's readable
        $cleanPath = self::resolvePath($fullPath);
        if (is_readable($cleanPath)) {
            include_once $cleanPath;
        } else {
            self::error(404); // Call error method if the asset is not readable
        }
    }

    /**
     * Show an error page with the specified HTTP status code.
     *
     * @param int $code HTTP status code (default 404).
     * @return void
     */
    public static function error($code = 404)
    {
        http_response_code($code);
        $errorPath = Path::root("core/error/$code.php");

        if (is_readable($errorPath)) {
            require $errorPath;
        } else {
            // Default error message if custom error file not found
            echo "<h1>Error $code - Something went wrong!</h1>";
        }
    }

    /**
     * Render a view with an optional context.
     *
     * @param string $path Path to the view file.
     * @param array $context Array of variables to extract and use within the view.
     * @return void
     */
    public static function view($path = '', $context = [])
    {
        // If no extension, append '.php' by default
        if (!preg_match('/\.[a-zA-Z0-9]+$/', $path)) {
            $path .= '.php';
        }

        // Get the full path and check if the file exists
        $fullPath = Path::root($path);
        if (is_readable($fullPath)) {
            extract($context); // Extract variables to use in view
            ob_start(); // Start output buffering
            require_once $fullPath; // Include view
            echo ob_get_clean(); // Output buffered content
        } else {
            self::error(404); // Show 404 if view file not found
        }
    }

    /**
     * Send a JSON or text response based on the input.
     *
     * @param mixed $message The message to send (string or array).
     * @return void
     */
    public static function response($message = '')
    {
        if (is_array($message)) {
            // Output JSON response if the message is an array
            header('Content-Type: application/json');
            echo json_encode($message);
        } else {
            // Output plain text response if the message is a string
            echo $message;
        }
    }

    /**
     * Helper function to clean and resolve a path.
     *
     * @param string $path Path to be cleaned and resolved.
     * @return string The resolved and cleaned path.
     */
    private static function resolvePath($path)
    {
        return rtrim(str_replace('//', '/', $path), '/');
    }
}

