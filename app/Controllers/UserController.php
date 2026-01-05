<?php

//models
require_once "../app/Models/User.php";

//classes
require_once "../app/Core/Controller.php";
require_once "../app/Core/Auth.php";
require_once "../app/Core/Validator.php";
require_once "../app/Core/Helpers.php";
require_once "../app/Core/Mailer.php";
require_once "../app/Core/EmailView.php";

class UserController extends Controller
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->all();

        $this->view('admin/users/index', [
            'title' => 'Users Management | SEMSYS',
            'users' => $users
        ]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?url=user-index");
            exit;
        }

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $isAdmin = $_POST['isAdmin'] ?? '0';

        $plainPassword = Helpers::randomPassword(10);

        $userModel = new User();
        $created = $userModel->create([
            'name'     => $name,
            'email'    => $email,
            'isAdmin'  => $isAdmin,
            'password' => password_hash($plainPassword, PASSWORD_DEFAULT)
        ]);

        if (!$created) {
            $_SESSION['error'] = "Email already exists.";
        } else {
            // Build email body
            $emailBody = EmailView::render('user-created-email', [
                'name'     => $name,
                'email'    => $email,
                'password' => $plainPassword,
                'role'     => $isAdmin == '1' ? 'Admin' : 'User'
            ]);

            // Send email
            Mailer::send($email, 'Your SEMSYS Account', $emailBody);

            $_SESSION['success'] = "User created successfully. Password sent via email.";
        }

        header("Location: index.php?url=user-index");
        exit;
    }
}
