<?php

    /** @var Routerold $router */
    $router->get('/', 'Pages::index');
    $router->get('/auth', 'Auth::index');
    $router->get('/auth/login', 'Auth::login');
    $router->get('/auth/signup', 'Auth::signup');
    $router->post('/auth/signup', 'Auth::signup');
    $router->post('/auth/login', 'Auth::login');

    // Dashboard Routes
    $router->get('/dashboard', 'Dashboard::index');
    $router->post('/dashboard/addtodo', 'Dashboard::addtodo');
    $router->delete('/dashboard/deleteTodo/{id}', 'Dashboard::deletetodo');
    $router->get('/dashboard/get/{id}', 'Dashboard::gettodo');
    $router->get('/dashboard/edittodo/{id}', 'Dashboard::edittodo');
    $router->post('/dashboard/edittodo/{id}', 'Dashboard::edittodo');
    $router->post('/dashboard/completetodo/{id}', 'Dashboard::completetodo');