<?php

    /** @var Router $router */
    $router->get('/', 'Pages::index');
    $router->get('/auth', 'Auth::index');
    $router->get('/auth/login', 'Auth::login');
    $router->get('/auth/signup', 'Auth::signup');
    $router->post('/auth/signup', 'Auth::signup');