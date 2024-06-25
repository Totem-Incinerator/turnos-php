<?php
// session_start();

// if($_SESSION['auth'] != "true"){
//     require_once("./info.php");
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/registrarEmpleado.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css">

    <title>Crear Turno</title>
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

                 <form action="../controllers/reiniciar_dia.php">
                     
                        <button id="btnReiniciar" type="btnSubmit">Reiniciar día</button>

                 </form>

            </div>
        </div>    
        <div class="form-infomation">
            <div class="form-information-childs">
                <h2>Asignacion de Turnos</h2>
                <p> Informacion basica</p>
                <form class="form" method="POST" action="../controllers/crearTurno.php">     
                    <label>
                        <select name="tipo_cedula">
                            <option value="CC">Cedula ciudadania</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="PT">Cedula Extranjeria</option>
                        </select>
                    </label>
                    <label>
                        <input name="cedula" type="text" placeholder="Numero CC:">
                    </label>
                    <label>
                        <input name="nombre_cliente" type="text" placeholder="Nombres:">
                    </label>
                    <label>
                        <input name="apellidos_cliente" type="text" placeholder="Apellidos">
                    </label>
                    <label for="">
                        <input type="radio" id="preferencial" name="tipo_turno" value="preferencial" required>
                        <label for="preferencial">Preferencial</label><br>
                        <input type="radio" id="general" name="tipo_turno" value="general" required>
                        <label for="general">General   </label> <br>
                    </label>
                    <input type="hidden" name="fecha_hora" value="<?php echo date('Y-m-d H:i:s'); ?>">   
                    
                    <input id="btnSubmit" type="submit" value="Crear Turno" onclick="mostrarAlerta()">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function mostrarAlerta(turno) {
        alert(`Turno creado con éxito: ${turno}`);
    }
</script>

</body>

</html>         