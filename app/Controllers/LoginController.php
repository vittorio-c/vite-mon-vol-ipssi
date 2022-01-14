<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\DB;
use App\Services\Session;
use Throwable;

class LoginController
{
    public function showLoginForm($get, $post)
    {
        require_once APP_ROOT . '/views/login.php';
    }

    public function login($get, $post)
    {
        $session = Session::getInstance();
        $session->loginError = '';

        try {
            $userModel = new User();
            $user = $userModel->login($post['email'], $post['password'])->getData();
            $session->isLoggedIn = true;
            $session->loggedInUser = $user;

            header('location:/home');
        } catch (Throwable) {
            $session->loginError = 'Mauvais email ou password !';
            header('location:/login');
        }
    }

    public function showSubscribeForm($get, $post)
    {
        require_once APP_ROOT . '/views/subscribe.php';
    }

    public function subscribe($get, $post)
    {
        $session = Session::getInstance();
        $session->subscribeError = '';

        try {
            $userModel = new User();
            // TODO Sanitize data
            $insertId = $userModel->create($post);
            $user = $userModel->find(DB::instance()->lastInsertId())->getData();
            $session->isLoggedIn = true;
            $session->loggedInUser = $user;

            header('location:/home');
        } catch (Throwable $exception) {
            $session->subscribeError = 'Erreur dans le formulaire (ou bien interne et là c\'est pas de votre faute, mais que voulez-vous on a mal codé l\'application, donc on vous montre l\'une et l\'autre au même endroit, OSEF!';
            header('location:/subscribe');
        }
    }

    public function logout($get, $post)
    {
        $session = Session::getInstance();
        $session->destroy();

        require_once APP_ROOT . '/views/login.php';
    }
}
