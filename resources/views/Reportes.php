<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="/resources/css/invetari.css">


</head>`

<body>
    <div class="wrapper">
        @include('layouts.header')

        <div class="filtrado">
                <form action="">
                    <div class="row">
                            <input type="date" name="fecha_ingreso" class="form-control" placeholder="Fecha de Inicio" required>
                            <input type="date" name="fechaFin" class="form-control" placeholder="Fecha Final" required>
                            <input type="submit" value="Filtrar" class="btn">
                    </div>
                </form>
        </div>
        <div class="tablas">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Monto</th>
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