<?php

namespace App\Controllers;

use App\Services\Session;
use Symfony\Component\Routing\RouteCollection;

class HomeController
{
    public function index(array $post, array $get)
    {
        $session = Session::getInstance();

        if (empty($session->isLoggedIn)) {
            header('location:/login');
        }

        require_once APP_ROOT . '/views/home.php';
    }
}
