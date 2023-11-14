<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserRole;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data ['employees'] = Employee::paginate(100);
        foreach($data['employees'] as $employee){
            $employee->roleDescription = UserRole::getDescription($employee->role);
        }
        return view('employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('employee.create');

        return view ('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $campos= [
            'username' => 'required|string|max:15',
            'name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];

        $message=[
            //'require'=> 'El :atribute es requerido',
            'username.required'=>'El username es requerido',
            'name.required'=>'El nombre es requerido',
            'last_name.required'=>'El apellido es requerido',
            'password.required'=>'La contraseña es requerida'
        ];

        $this->validate($request, $campos, $message);

        
        //$role = \App\Enums\UserRole::from($request->input('role'));
        //dd($role);
        //Creo un nuveo empleado con los datos del formulario
        $employee = new Employee();
        $employee->username = $request->input('username');
        $employee->name = $request->input('name');
        $employee->last_name = $request->input('last_name');
        $employee->password = bcrypt($request->input('password')); // Encriptar la contraseña
        $employee->role = $request->input('role');
        $employee->save();

        return redirect()->route('employee.index')->with('message', 'Empleado creado exitosamente');

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
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        //aqui toca ahora
        $employeeData = request()->except(['_token', '_method']);
        Employee::where('id', '=', $id)->update($employeeData);

        



        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Employee::destroy($id);
        return redirect('employee')->with('message', 'empleado borrado con exito');

    }
}
