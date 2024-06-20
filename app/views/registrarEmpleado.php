<?php
session_start();

if($_SESSION['auth'] != "true"){
    require_once("./info.php");
    exit;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/registrarEmpleado.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
    <title>Registrar Empleado</title>
</head>
<?php
 require_once("../templates/header.php");
?>
<body>
<div class="d-flex flex-row justify-content-center py-5 shadow-lg">
    <div class="container-form">
        <div class="information">
            <div class="info-childs">
                <h2>Bienvendidos</h2>
                <p> Droguera Cabildo Mayor
                     siempre  disponible a nuestra comunidad</p>
                <input type="button" value="Iniciar Sesión" >
            </div>
 
        </div>    
 
        <div class="form-infomation">
            <div class="form-information-childs">
                <h2>Registro de Empleado</h2>
                <p> Informacion basica</p>
                <form class="form" method="POST" action="../controllers/crearEmpleado.php">
                    <label>
                        <input name="cedula" type="text" placeholder="Cedula">
                    </label>
                    <label>
                        <input name="nombre" type="text" placeholder="Nombre">
                    </label>
                    <label>
                        <input name="apellido" type="text" placeholder="Apellido">
                    </label>
                    <label>
                        <input name="correo" type="email" placeholder="Correo">
                    </label>
                    <label>
                        <input name="clave" type="password" placeholder="Contraseña">
                    </label>
                    <input type="submit" value="Registrar">
                </form>
            </div>
        </div>
    </div>
 
</div>
 
</body>
    <?php 
        require_once("../templates/footer.php");
    ?>
</html>