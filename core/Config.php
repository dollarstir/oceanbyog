<?php

class Config
{
    /**
     * Initialize the configuration by loading environment variables from the .env file.
     */
    public static function init()
    {
        $path = __DIR__ . '/../.env';

        if (file_exists($path)) {
            $env = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($env as $line) {
                $line = trim($line);

                // Ignore comments or invalid lines
                if (strpos($line, '#') === 0 || !strpos($line, '=')) {
                    continue;
                }

                list($key, $value) = array_map('trim', explode('=', $line, 2));

                // Sanitize and define environment variables
                if (!empty($key) && !defined($key)) {
                    define(strtoupper($key), trim($value, "'\""));
                }
            }
        } else {
            echo "Error: .env file not found.";
        }
    }

    /**
     * Get the value of a defined environment variable.
     *
     * @param string $key The name of the environment variable.
     * @return mixed The value of the environment variable, or null if not defined.
     */
    public static function get($key)
    {
        return defined($key) ? constant($key) : null;
    }
}
