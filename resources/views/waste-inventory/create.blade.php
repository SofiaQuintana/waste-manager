<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro Residuos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>`

<body>
    <div class="wrapper">
        @include('layouts.header')
        <form action="{{ route('waste-inventory.store')  }}" method="post">
            @csrf
            @include('waste-inventory/form', ['mode' => 'Guardar'])
        </form>            
        
    </div>
@include('layouts.scripts')
</body>

 
