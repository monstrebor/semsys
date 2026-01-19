<?php

require_once "../app/Models/User.php";
require_once "../app/Models/EmployeeProfile.php";

require_once "../app/Core/Controller.php";
require_once "../app/Core/Auth.php";

class EmployeePortalController extends Controller
{
    public function index()
    {
        $this->view('user/employee/index', [
            'title' => 'Employee Portal | SEMSYS'
        ]);
    }
}