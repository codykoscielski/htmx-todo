<?php
    //Error checking
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

require_once '../app/bootstrap.php';

    $router = new Router();

    require_once '../app/web/web.php';

    $router->dispatch();
