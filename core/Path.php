<?php

class Path
{
    /**
     * Get the absolute path to the root directory of the project.
     * This helps locate files relative to the root.
     *
     * @param string $path Optional path to append to the root.
     * @return string Absolute path to the requested file/directory.
     */
    public static function root($path = "")
    {
        // Use realpath() to resolve the absolute path to the root directory.
        return realpath(__DIR__ . '/../' . $path);
    }

    /**
     * Get the URL path relative to the project's document root.
     * Useful for assets (CSS, JS, images) and other resources.
     *
     * @param string $path Optional path to append to the base URL.
     * @return string URL path relative to the document root.
     */
    public static function rebase($path = "")
    {
        // Base URL for the project
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $root = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

        // Return full URL path to the asset or resource
        return $protocol . $host . $root . '/' . ltrim($path, '/');
    }

    /**
     * Get the full path for assets (like CSS, JS, images) or other resources.
     *
     * @param string $path Path to the asset.
     * @return string The full public URL to the asset.
     */
    public static function assets($path = "")
    {
        return self::rebase('assets/' . ltrim($path, '/'));
    }
}
