<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('login',
    new Route(
        '/login',
        ['controller' => 'LoginController', 'method' => 'showForm'],
        methods: 'GET'
    ));
$routes->add('home',
    new Route(
        '/home',
        ['controller' => 'HomeController', 'method' => 'index'],
        methods: 'GET'
    ));
$routes->add('product',
    new Route(
        '/product/{id}',
        ['controller' => 'ProductController', 'method' => 'showAction'],
        ['id' => '[0-9]+']
    ));
$routes->add('try-login',
    new Route(
        '/try-login',
        ['controller' => 'LoginController', 'method' => 'login'],
        methods: 'POST'
    ));

