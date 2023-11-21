<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <title>Recuperacion de Contraseña</title>
</head>
<body>
 <img class="wave" src="https://www.actaverytelehealth.com/static/media/wave.66362fb1.png" >
 <div class="container">
    <div class="img">
        <img src="https://www.simlevante.com/wp-content/uploads/2022/10/waste-management-edited.png" >
    </div>
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif
    <div class="login-content">
        <form method="post" action="{{ route('reset') }}">
            @csrf
            <img src="https://www.pngall.com/wp-content/uploads/5/Profile-Avatar-PNG-Picture.png" alt="">
            <h4 class="title">Recuperacion de Contraseña</h4>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Usuario</h5>
                    <input type="text" id="username" class="input" name="username">
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Nueva Contraseña</h5>
                    <input type="password" id="input" class="input" name="password">
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Confirmacion de Contraseña</h5>
                    <input type="password" id="input" class="input" name="confirmation">
                </div>
            </div>
           
            @if($errors->any())
                <span class="help-block"> {{ $errors->first() }} </span>
            @endif
            <button type="submit" class="btn">submit</button>
        </form>
    </div>
 </div>    
 @include('layouts.scripts')
</body>
</html>