<?php

//models
require_once "../app/Models/User.php";

//class
require_once "../app/Core/Controller.php";
require_once "../app/Core/Validator.php";
require_once "../app/Core/Helpers.php";
require_once "../app/Core/Mailer.php";
require_once "../app/Core/EmailView.php";


class AuthController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $_SESSION['old'] = $_POST;

            $validator = new Validator();

            $validator->validate($_POST, [
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if ($validator->fails()) {
                $_SESSION['error'] = reset($validator->errors());
                header("Location: index.php?url=login");
                exit;
            }

            $userModel = new User();
            $user = $userModel->login($_POST['email'], $_POST['password']);

            if (!$user) {
                $_SESSION['error'] = "Invalid credentials.";
                header("Location: index.php?url=login");
                exit;
            }

            unset($_SESSION['old']);
            $_SESSION['user'] = $user;
            $_SESSION['success'] = "Login successful!";
            header("Location: index.php?url=dashboard");
            exit;
        }

        $this->view('auth/login', [
            'title' => 'Login | SEMSYS'
        ]);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $_SESSION['old'] = $_POST;

            $validator = new Validator();
            $validator->validate($_POST, [
                'name'  => ['required'],
                'email' => ['required', 'email']
            ]);

            if ($validator->fails()) {
                $_SESSION['error'] = reset($validator->errors());
                header("Location: index.php?url=register");
                exit;
            }

            $plainPassword = Helpers::randomPassword(10);

            $userModel = new User();
            $created = $userModel->register(
                $_POST['name'],
                $_POST['email'],

                $plainPassword
            );

            if (!$created) {
                $_SESSION['error'] = "Email already exists.";
                header("Location: index.php?url=register");
                exit;
            }

            //Build email body from template
            $emailBody = EmailView::render('register-email', [
                'name'     => $_POST['name'],
                'email'    => $_POST['email'],
                'password' => $plainPassword
            ]);

            //Send email
            if (!Mailer::send($_POST['email'], 'Welcome to SEMSYS', $emailBody)) {
                $_SESSION['error'] = "Account created but email failed.";
                header("Location: index.php?url=register");
                exit;
            }

            unset($_SESSION['old']);
            $_SESSION['success'] = "Account created. Password sent via email.";
            header("Location: index.php?url=login");
            exit;
        }

        $this->view('auth/register', [
            'title' => 'Register | SEMSYS'
        ]);
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['success'] = "You have successfully logged out.";
        header("Location: index.php?url=home");
        exit;
    }
}
