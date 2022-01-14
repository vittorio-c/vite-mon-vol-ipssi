<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Session;
use Symfony\Component\Routing\RouteCollection;
use Throwable;

class LoginController
{
    public function showForm($get, $post)
    {
        require_once APP_ROOT . '/views/login.php';
    }

    public function login($get, $post)
    {
        $session = Session::getInstance();
        $session->loginError = '';

        try {
            $userModel = new User();
            $user = $userModel->login($post['email'], $post['password']);
            $session->isLoggedIn = true;

            header('location:/home');
        } catch (Throwable) {
            $session->loginError = 'Mauvais email ou password !';
            header('location:/login');
        }
    }

    public function subscribe()
    {

    }
}
