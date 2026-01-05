<?php
require_once "../app/Core/Controller.php";
require_once "../app/Core/Auth.php";

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            header("Location: index.php?url=login");
            exit;
        }

        $user = $_SESSION['user'];
        if (!empty($user['isAdmin']) && $user['isAdmin'] == 1) {
            $this->view('admin/dashboard', [
                'title' => 'Admin Dashboard | SEMSYS'
            ]);
            return;
        }

        $this->view('user/dashboard', [
            'title' => 'Dashboard | SEMSYS'
        ]);
    }
}
