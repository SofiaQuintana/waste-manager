<!DOCTYPE html>
<html lang="en">

<head>
    <title>Editar Residuo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>`

<body>
    <div class="wrapper">
        @include('layouts.header')
        <form action= "{{ url('/waste-inventory/'.$waste_inventory->id)}}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            @include('waste-inventory.form', ['edit_mode' => true, 'mode' => 'Editar', 'waste_inventory' => $waste_inventory])
        </form>
    </div>

</body>
