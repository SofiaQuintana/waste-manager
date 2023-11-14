<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Empleados</title>
    <link rel="stylesheet" href="/resources/css/invetari.css">
    <link rel="stylesheet" href="/resources/css/registro.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">


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
        <div class="Empleado">
            <form action="">
                <div class="input-field">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Nombre" name="nombre" required>
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Apellido" name="apellido" required>
                </div>
                <div class="input-field">

                    <i class="fa-solid fa-user-secret"></i>
                    <input type="text" placeholder="Username" name="username" required>
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="text" placeholder="Password" name="password" required>
                </div>
                <div class="Roles">
                    <h2>Role: </h2>
                    <select name="role" id="role" class="custom-select">
                        <option value="manager">Manager</option>
                        <option value="operador">Operador</option>
                        <option value="vendedor">Vendedor</option>
                    </select>
                </div>

                <div class="btn-field">
                    <button id="Cancel" type="button">Cancelar</button>
                    <button id="signUp" type="button"> Registrar</button>
                </div>
            </form>
        </div>
        <div class="imagen">
            <img src="https://www.traperosdeemaus.org/mini-slider/reciclaje/reciclaje-general.png" alt="">
        </div>
    </div>
</body>

</html>