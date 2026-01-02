<?php
session_start();

//classes
require_once "../app/Core/View.php"; 
require_once "../app/Core/Auth.php";

//controllers
require_once "../app/Controllers/AuthController.php";
require_once "../app/Controllers/DashboardController.php";

$url = $_GET['url'] ?? 'home';

switch ($url) {

    case 'home':
        View::render("home", ['title' => 'Welcome | SEMSYS']);
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
