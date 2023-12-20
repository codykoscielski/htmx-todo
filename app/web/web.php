<?php

    /** @var Router $router */
    $router->get('/', 'Pages::index');
    $router->get('/auth', 'Auth::index');