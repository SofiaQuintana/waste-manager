<!-- En tu archivo Blade o en tu plantilla principal -->
<!DOCTYPE html>
<html lang="es">
    <div class="sidebar">
        <div class="profile">
            <img src="https://c0.klipartz.com/pngpicture/286/70/gratis-png-rick-sanchez-morty-smith-graficos-de-red-portatiles-bolsillo-mortys-rick-amp-morty.png"
                alt="">
            <h3> {{ $employeeData['name'] }} {{ $employeeData['last_name'] }} </h3>
            <p> {{ $employeeData['roleDescription'] }} </p>
        </div>
        @include('layouts.options')
    </div>
    <div class="section">
        <div class="top_navbar">
            <div class="hamburger">
                <a href="{{ url('logout') }}" id="logout"><i class="fa fa-power-off"></i> Log-out</a>
            </div>
        </div>
    </div>

</html>
