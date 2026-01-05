<?php
session_start();

//classes
require_once "../app/Core/View.php";
require_once "../app/Core/Auth.php";

//controllers
require_once "../app/Controllers/AuthController.php";
require_once "../app/Controllers/DashboardController.php";
require_once "../app/Controllers/UserController.php";

$url = $_GET['url'] ?? 'home';
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 1800) {
    header("Location: index.php?url=session-expired");
    exit;
}
$_SESSION['last_activity'] = time();

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
        (new AuthController)->logout();
        break;

    case 'session-expired':
        (new AuthController)->sessionExpired();
        break;

    case 'user-index':
        (new UserController)->index();
        break;

    case 'admin-users-create':
        (new UserController)->create();
        break;

    default:
        View::render("error", ['title' => '404 Not Found | SEMSYS']);
        break;
}
