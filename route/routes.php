<?php

use App\Home;
use App\Auth;

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


// *************************************************
// method get
if ($method === 'GET') {
    switch ($uri) {
        case '/':
            $home = new Home();
            $home->index();
            break;

        case '/login':
            require 'resources/auth/login.php';
            break;

        case '/logout':
            $home = new Auth();
            $home->logout();
            break;

        case '/dashboard':
            require 'resources/dashboard.php';
            break;

        case '/user/create':
            require 'resources/form.php';
            break;

        case strpos($uri, '/user/edit/') !== false:
            $userId = substr($uri, strlen('/user/edit/'));
            if (isset($userId)) {
                $user = new Home();
                $user->edit($userId);
            }
            break;

        case strpos($uri, '/user/remove/') !== false:
            $userId = substr($uri, strlen('/user/remove/'));
            if (isset($userId)) {
                $user = new Home();
                $user->remove($userId);
            }
            break;

        default:
            # code...
            break;
    }
}


// *************************************************
// method post
if ($method === 'POST') {
    switch ($uri) {
        case '/search':
            $home = new Home();

            $home->search();
            break;

        case '/authenticate':
            $home = new Auth();
            $home->login();
            break;

        case '/user/store':
            $home = new Home();

            $home->store();
            break;

        case strpos($uri, '/user/update/') !== false:
            $userId = substr($uri, strlen('/user/update/'));
            $home = new Home();

            $home->update($userId);
            break;

        default:
            # code...
            break;
    }
}
