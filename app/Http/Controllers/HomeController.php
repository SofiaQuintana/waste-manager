<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Foundation\Auth\User;
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
            case UserRole::WasteClassifier:
                return redirect()->route('waste-inventory.index');
            case UserRole::Operator:
                return redirect()->route('recycled-waste-inventory.index');
            case UserRole::Seller:
                return redirect()->route('sell.index');
            default:
                return redirect()->route('welcome');
        }
    }
}
