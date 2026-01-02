<?php
require_once "../app/Core/Controller.php";
require_once "../app/Core/Auth.php";

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            header("Location: login");
            exit;
        }

        $this->view("dashboard");
    }
}
