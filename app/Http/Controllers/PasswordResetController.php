<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('password-reset.index');
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:5',
            'confirmation' => 'required|min:5',
        ]);
        $employee = Employee::where('username', $data['username'])->first();
        if ($employee) {
            if($data['password'] != $data['confirmation']){
                return redirect()->route('password-reset')->with('error', 'Passwords do not match');
            }
            $employee->password = bcrypt($data['password']);
            $employee->save();
            return redirect()->route('root')->with('message', 'Password reset successfully');
        } else {
            return redirect()->route('password-reset')->with('error', 'Username not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
