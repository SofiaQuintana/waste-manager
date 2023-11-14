<label for="username">Username</label>
    <input type="text" name="username" value="{{ isset($employee->username)? $employee->username: '' }}" id="username">
    <br>
    
    <label for="name">Nombre</label>
    <input type="text" name="name" value="{{ isset($employee->name)? $employee->name: '' }}"  id="name">
    <br>
    
    <label for="last_name">Apellido</label> 
    <input type="text" name="last_name" value="{{ isset($employee->last_name)? $employee->last_name: '' }}"  id="last_name">
    <br>
    

@if(!$editMode)
<label for="password">Contraseña</label>
    <input type="password" name="password" id="password">
    <br>

    <label for="role" >Rol</label>
    <select name="role" class="custom-select">
        <option value="{{ \App\Enums\UserRole::Admin->value }}">Admin</option>
        <option value="{{ \App\Enums\UserRole::Manager->value }}">Manager</option>
        <option value="{{ \App\Enums\UserRole::Operator->value  }}">Operator</option>
        <option value="{{ \App\Enums\UserRole::WasteClassifier->value  }}">WasteClassifier</option>
        <option value="{{ \App\Enums\UserRole::Seller->value  }}">Seller</option>
        <option value="{{ \App\Enums\UserRole::User->value  }}">User</option>
    </select>
    <br>
    @endif

    
    
    {{---<input type="submit" value="{{ $mode }} Empleado">---}}
    <input type="submit" value="Guardar">

    <a href="{{ url('employee/')}}">regresar</a>

