<?php
    //DB Info
    define('DB_HOST', 'db');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_NAME', 'htmx');
    //App root
    define('APPROOT', dirname(__FILE__, 2));
    // URL Root - Check if running from a web server
    if (isset($_SERVER['HTTP_HOST'])) {
        $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
        define('URLROOT', $scheme . "://" . $_SERVER['HTTP_HOST']);
    } else {
        // Default value for CLI or set as per your requirement
        define('URLROOT', 'http://localhost');
    }
    const SITENAME = 'TODO';