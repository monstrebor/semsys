<?php
session_start();

require_once "../app/Core/Auth.php";
require_once "../app/Controllers/AuthController.php";
require_once "../app/Controllers/DashboardController.php";

$url = $_GET['url'] ?? 'home';

switch ($url) {

    case 'home':
        require_once "../views/home.php";
        break;

    case 'login':
        (new AuthController)->login();
        break;

    case 'register':
        (new AuthController)->register();
        break;

    case 'dashboard':
        (new DashboardController)->index();
        break;

    case 'logout':
        Auth::logout();
        break;

    default:
        echo "404 Page Not Found";
}
