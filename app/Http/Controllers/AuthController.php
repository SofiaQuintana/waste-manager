<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Enums\UserRole;

class AuthController extends Controller
{

    protected $redirectTo = 'home';
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Login');
    }

    // authentication function for employees 
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $employeeData = [
                'id' => Auth::user()->id,
                'username' => Auth::user()->username,
                'name' => Auth::user()->name,
                'last_name' => Auth::user()->last_name,
                'role' => Auth::user()->role,
                'roleDescription' => Auth::user()->role->name,
            ];
            Session::put('employeeData', $employeeData);
            return redirect()->route($this->redirectTo);
        }
        return redirect()->back()->withErrors("Sorry, the passed username or password is incorrect, try again!");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('root');
    }

}

