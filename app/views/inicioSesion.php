<?php
session_start();
$_SESSION['auth'] = "false";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <?php
 require_once("../templates/header.php");
?>
    <link rel="stylesheet" href="../../public/css/iniciosesion.css">
    
</head>

<body>
    <h1>Inicio de sesion</h1>
    <div class="container">
        <div class="logo">
            <img class="logo_img" src="img/logo.svg" alt="">
        </div>
        <form action="../controllers/authController.php" method="POST" class="form">
            <div class="form__usuario">
                <label for="">Usuario</label>
                <input name="correo" type="text" class="usuario">
            </div>
            <div class="form__clave">
                <label for="">Contraseña</label>
                <input name="clave" type="password" class="clave">
                
            </div>
            <div class="form__boton">
                <button class="boton">Ingresar</button>
            </div>
        </form>
    </div>
    <script src="js/main.js"></script>
</body>

</html>
 