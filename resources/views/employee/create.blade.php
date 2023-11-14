<h1>Formulario para la creacion de empleado</h1>

<form action="{{route('employee.store')}}" method="post" , enctype="multipart/form-data">
    @csrf
    @include('employee/form', ['editMode' => false],['mode' => 'Crear']);
    
    

</form>