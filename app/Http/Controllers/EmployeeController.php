<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Session;

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
        $employeeData = $this->getEmployeeData();
        return view('employee.index', $data, compact('employeeData'));
    }

    private function getEmployeeData()
    {
        $employeeData = Session::get('employeeData');
        return $employeeData;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employeeData = $this->getEmployeeData();
        return view ('employee.create', compact('employeeData'));
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
        $employeeData = $this->getEmployeeData();
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee','employeeData'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        $employeeData = request()->except(['_token', '_method']);
        Employee::where('id', $id)->update($employeeData);

        $employee = Employee::findOrFail($id);

        //return view('employee.edit', compact('employee'));
        //return view('employee.index');
        return redirect()->route('employee.index');

        
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
