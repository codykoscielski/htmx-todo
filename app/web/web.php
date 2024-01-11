<?php

    /** @var Router $router */
    $router->get('/', 'Pages::index');
    $router->get('/auth', 'Auth::index');
    $router->get('/auth/login', 'Auth::login');
    $router->get('/auth/signup', 'Auth::signup');
    $router->post('/auth/signup', 'Auth::signup');

    // Dashboard Routes
    $router->get('/dashboard', 'Dashboard::index');
    $router->post('/dashboard/addtodo', 'Dashboard::addtodo');
    $router->delete('/dashboard/deleteTodo/{id}', 'Dashboard::deletetodo');