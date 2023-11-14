<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // redirection to the home page depending on the user type
    public function index()
    {
        $employeeData = Session::get('employeeData');
        switch ($employeeData['role']) {
            case UserRole::Admin:
                return redirect()->route('employee.index');
            default:
                return redirect()->route('welcome');
        }
    }
}
