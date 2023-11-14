<h1>Formulario para ingreso de basura</h1>

<form action="{{ route('waste-inventory.store')  }}" method="post">
    @csrf
    @include('waste-inventory/form', ['mode' => 'Guardar'])

</form>