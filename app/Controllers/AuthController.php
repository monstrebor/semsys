<?php
require_once "../app/Models/User.php";
require_once "../app/Core/Controller.php";

class AuthController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $userModel = new User();
            $user = $userModel->login($_POST['email'], $_POST['password']);

            if ($user) {
                $_SESSION['user'] = $user;
                $_SESSION['success'] = "Login successful!";
                header("Location: dashboard");
                exit;
            }

            $_SESSION['error'] = "Invalid credentials";
        }

        $this->view("auth/login");
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $userModel = new User();
            $userModel->register(
                $_POST['name'],
                $_POST['email'],
                $_POST['password']
            );

            $_SESSION['success'] = "Registered successfully!";
            header("Location: login");
            exit;
        }

        $this->view("auth/register");
    }
}
