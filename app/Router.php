<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Router
{
    public function __invoke(RouteCollection $routes)
    {
        $context = new RequestContext();
        $context->fromRequest(Request::createFromGlobals());

        // Routing can match routes with incoming requests
        $matcher = new UrlMatcher($routes, $context);
        try {
            $path = $_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI'];
            $matcher = $matcher->match($path);

            // Cast params to int if numeric
            array_walk($matcher, function (&$param) {
                if (is_numeric($param)) {
                    $param = (int) $param;
                }
            });

            // https://github.com/gmaccario/simple-mvc-php-framework/issues/2
            // Issue #2: Fix Non-static method ... should not be called statically
            $className = '\\App\\Controllers\\'.$matcher['controller'];
            $classInstance = new $className();

            $params = ['post' => [], 'get' => []];
            if (!empty($_POST)) {
                $params['post'] = $_POST;
            }

            if (!empty($_GET)) {
                $params['get'] = $_GET;
            }

            call_user_func_array([$classInstance, $matcher['method']], $params);
        } catch (MethodNotAllowedException $e) {
            echo 'Route method is not allowed.';
        } catch (ResourceNotFoundException $e) {
            echo 'Route does not exists.';
        }
    }
}

// Invoke
$router = new Router();
if (!empty($routes)) {
    $router($routes);
}
