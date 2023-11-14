<form action= "{{ url('/waste-inventory/'.$waste_inventory->id)}}" method="post">
    @csrf
    {{ method_field('PATCH' )}}
    @include('waste-inventory/form', ['edit_mode' => true], ['mode' => 'Modificar'])
</form>