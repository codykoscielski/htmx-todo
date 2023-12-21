<?php
    //load config
    require_once 'config/config.php';
    // Load helper functions
    require_once 'helpers/functions.php';

    // Automatically include all files from the libraries directory
    $libraries = glob('../app/libraries/*.php');
        foreach ($libraries as $file) {
        require_once $file;
    }

    // Autoload for controllers
    spl_autoload_register(function($className) {
        $controllerFile = '../app/controllers/' . $className . '.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
        }
    });