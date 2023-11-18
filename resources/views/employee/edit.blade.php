<!DOCTYPE html>
<html lang="en">

<head>
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>`

<body>
    <div class="wrapper">
        @include('layouts.header')
        <form action="{{ url('/employee/'.$employee->id)}}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            @include('employee.form', ['editMode' => true, 'mode' => 'Editar', 'employee' => $employee])
        </form>
    </div>

</body>