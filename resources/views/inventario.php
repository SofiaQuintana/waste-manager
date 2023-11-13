<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="/resources/css/invetari.css">


</head>`

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img src="https://c0.klipartz.com/pngpicture/286/70/gratis-png-rick-sanchez-morty-smith-graficos-de-red-portatiles-bolsillo-mortys-rick-amp-morty.png" alt="">
                <h3> Rick Sanchez </h3>
                <p>Empleado</p>
            </div>
            <ul>
                <li><a href="#">
                        <span class="item">Principal</span>
                    </a></li>
                    <li><a href="/resources//views/inventario.php">
                        <span class="item">Ver inventario</span>
                    </a></li>
                <li><a href="/resources//views/Reportes.php">
                        <span class="item">Reportes</span>
                    </a></li>
                    <li><a href="/resources//views//RegistroEmpleado.php">
                        <span class="item">Registras empleado</span>
                    </a></li>
                <li><a href="#">
                        <span class="item">3</span>
                    </a></li>
            </ul>
        </div>
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#" id="barra"><i class="fas fa-bars"></i></a>
                    <a href="#" id="logout"><i class="fa fa-power-off"></i> Log-out</a>
                </div>
            </div>
        </div>
        <div class="tablas">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>fecha</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Chatarra</td>
                            <td>5kg</td>
                            <td>2023-05-02</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Bolsas</td>
                            <td>1kg</td>
                            <td>2023-01-03</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>botellas</td>
                            <td>2kg</td>
                            <td>2023-02-02</td>
                        </tr>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</body>

</html>