<?php

namespace App\Controllers;

use App\Models\Tour;
use App\Services\Session;

class HomeController
{
    public function index(array $post, array $get)
    {
        $session = Session::getInstance();

        if (empty($session->isLoggedIn)) {
            header('location:/login');
        }

        $tourModel = new Tour();
        $tours = $tourModel->findAll()->getData();
        foreach ($tours as $tour) {
            $tour->destinations = json_decode($tour->destinations);
        }

        require_once APP_ROOT . '/views/home.php';
    }
}
