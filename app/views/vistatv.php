    
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vista Turnos</title>
<?php
require_once("../templates/boostrap.php");
?>
</head>
<?php
  require_once("../templates/header.php");
  require_once("../models/turnos.php");

  $turno=new Turno();
  $atendidos=$turno->obtenerAtendidos();
  //print_r($atendidos);
?>
<body> 
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h2>Lista de Espera de Turnos</h2>
      <div class="row">
        <div class="col-5">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" color="red"S>Módulo</th>
                <th scope="col">Turno</th>
              </tr>
            </thead>
            <tbody>
              <!-- Aquí puedes agregar dinámicamente las filas de la tabla si lo necesitas -->
              <tr>
              <?php      
                    $resultado="";
                
                    foreach ($atendidos as $turno) {
                        if ($turno["tipo_turno"]=="preferencial") {
                            $resultado = "P" . $turno['numero_turno'];
                        }else{
                            $resultado = "G" . $turno['numero_turno'];
                        }
                     
                        ?>
              </tr>
                <td>Modulo 1</td>
                <td><?=$resultado?></td>   
              </tr>
                <?php

                    }
                ?>
            </tbody>
          </table>
        </div>
        <div class="col-7">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
             <!--  <div class="carousel-item active">
                <img src="../../public/img/Cabildo-Mayor-Yanakona.jpg" class="d-block w-50 img-fluid" alt="">
              </div> -->
              <div class="carousel-item active">
                <img style="object-fit: cover;" src="../../public/img/logo2.jpg" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img style="object-fit: cover;" src="../../public/img/carro2.jpeg" class="img-fluid" alt="...">
              </div>
              <div class="carousel-item">
                <img style="object-fit: cover;" src="../../public/img/paramo.jpg" class="d-block w-100" alt="">
              </div>
              <!-- <div class="carousel-item">
                <img src="../../public/img/San_Sebastian.jpg" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img src="../../public/img/Paramo2.jpg" class="d-block w-100" alt="">
              </div> -->
              <!-- Agrega más imágenes si es necesario -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    // Iniciar el carrusel al cargar la página
    $('.carousel').carousel();

    // Configurar el intervalo del carrusel para que se mueva automáticamente
    $('.carousel').carousel({
      interval: 2000 // Cambia 2000 por el intervalo de tiempo deseado en milisegundos
    });
  });
</script>
</body>
   </html> 
 <script src="../turno.js"></script>

<?php 
  require_once("../templates/boostrapjs.php");
?>
