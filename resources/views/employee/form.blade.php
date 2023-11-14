<!DOCTYPE html>
<html lang="en">
  @if(count($errors)>0)
    <div class="alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="Empleado">
        <h1>Registro de Empleados</h1>
        <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="{{ isset($employee->username) ? $employee->username : '' }}" id="username">
            </div>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ isset($employee->name) ? $employee->name : '' }}" id="name">
            </div>

            <div class="form-group">
                <label for="last_name">Apellido</label>
                <input type="text" class="form-control" name="last_name" value="{{ isset($employee->last_name) ? $employee->last_name : '' }}" id="last_name">
            </div>

            @if(!$editMode)
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="role">Rol</label>
                <br>
                <select name="role" id="role" class="custom-select">
                    <option value="{{ \App\Enums\UserRole::Admin->value }}">Admin</option>
                    <option value="{{ \App\Enums\UserRole::Manager->value }}">Manager</option>
                    <option value="{{ \App\Enums\UserRole::Operator->value }}">Operator</option>
                    <option value="{{ \App\Enums\UserRole::WasteClassifier->value }}">WasteClassifier</option>
                    <option value="{{ \App\Enums\UserRole::Seller->value }}">Seller</option>
                    <option value="{{ \App\Enums\UserRole::User->value }}">User</option>
                </select>
            </div>
            @endif

            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-dark" value="{{ $mode }} Datos">
            </div>
            <br>
            <div class="form-group">
                <a href="{{ url('employee/') }}" class="btn btn-dark">Regresar</a>
            </div>
        </form>
    </div>
    <div class="imagen">
        <img src="https://www.traperosdeemaus.org/mini-slider/reciclaje/reciclaje-general.png" alt="">
    </div>