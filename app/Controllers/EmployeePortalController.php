<?php

require_once "../app/Models/User.php";
require_once "../app/Models/EmployeeProfile.php";

require_once "../app/Core/Controller.php";
require_once "../app/Core/Auth.php";

class EmployeePortalController extends Controller
{
    public function index()
    {
        Auth::requireLogin();

        $userId = (int) $_SESSION['user']['id'];

        $employeeModel = new EmployeeProfile();
        $employee = $employeeModel->findFullProfileByUserId($userId);

        if (!$employee) {
            die('Employee profile not found for this user');
        }

        $this->view('user/employee/index', [
            'title' => 'Employee Portal | SEMSYS',
            'employee' => $employee
        ]);
    }
}
