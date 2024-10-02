<?php

spl_autoload_register(function ($class) {
    // List of directories to search for class files
    $directories = [
        __DIR__ . '/../core/',
        __DIR__ . '/../views/',
        __DIR__ . '/../controllers/',
        __DIR__ . '/../models/',

    ];

    // Iterate through directories and require the class file if found
    foreach ($directories as $directory) {
        $path = $directory . $class . '.php';
        if (file_exists($path)) {
            require_once $path;
            return;  // Exit the loop once the file is found
        }
    }

    // If the class file isn't found, you can optionally throw an error
    throw new Exception("Class $class not found in any of the specified directories.");
});

// Initialize configuration
Config::init();
if (defined('BASE_URL')) {
//    echo "BASE_URL already defined at line " . __LINE__ . " in file " . __FILE__;
} else {
    define('BASE_URL', Config::get('BASE_URL'));
}
// Development environment


