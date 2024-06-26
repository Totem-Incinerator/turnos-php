<?php
session_start();

if($_SESSION['auth'] != "true"){
    require_once("./info.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
    
    <link rel="stylesheet" type="text/css" href="../../public/css/inicioEmpleado.css">
    <title>Inicio</title>
</head>
<body>   
<?php
    require_once ("../models/empleado.php");
    require_once("../models/turnos.php");
    require_once("../models/asignarTurno.php");
    $empleado= new Empleado();
    $turno= new Turno();
    $empleados=$empleado->obtenerEmpleados();
    $turnos=$turno->obtenerTurnos();
    require_once("../../app/templates/headeradmin.php");
?>
<div class="container-fluid">   
    <div class="row flex-nowrap">
        <!-- INICIO SIDEBAR -->
        <?php require_once("../templates/sidebar.php") ?>
        <!-- FIN SIDEBAR -->
        <!-- INICIO MAIN -->
        <main class="col px-0 container px-3">
            <h1 class="titulo">Asignación de turnos.</h1>
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Turno</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Tipo Turno</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php                                          
                    $resultado="";
                    foreach ($turnos as $turno) {
                        if ($turno["tipo_turno"]=="preferencial") {
                            $resultado = "P" . $turno['numero_turno'];
                        }else{
                            $resultado = "G" . $turno['numero_turno'];


                        }
                        ?>
                        <tr> 
                            <td><?=$resultado?></td>             
                            <td><?= $turno['nombre_cliente'] ?></td>
                            <td><?= $turno['apellidos_cliente'] ?></td>
                            <td><?= $turno["cedula"] ?></td>
                            <td><?= $turno["tipo_turno"] ?></td>
                            <td><button type="button" class="btn btn-secondary" id="info-turno" data-bs-toggle="modal" data-bs-target="#modalForm" data-id="<?= $turno['id_turno'] ?>">Atender</button></td>

                 

                        </tr>
                        <?php
                        
                    }
                    ?>

                    </tbody>
                </table>

            </div>
            <!-- MODAL INICIO -->
            <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFormLabel">Asignar Turno</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-modal" method="POST" action="../controllers/asignarTurno.php">
                                <div class="mb-3 empleado-container">
                                    <label for="tipoTurno" class="form-label">Dispensador</label>
                                    <select name="id_empleado" class="form-select" id="tipoTurno">
                                        <?php
                                        foreach($empleados as $empleado){
                                            ?>
                                            <option  value="<?= $empleado['id_empleado'] ?>"><?= $empleado['nombres'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="comentario" class="form-label">Comentario</label>
                                    <input name="comentario" type="text" class="form-control" id="comentario">
                                </div>
                                <button type="submit" class="btn btn-primary">Asignar</button>
                               
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL FIN -->
            

              

              <!-- MODAL FIN -->
          
        </main>
        <!-- FIN MAIN -->
    </div>
</div>

<script src="../turno.js"></script>

</body>
</html>
