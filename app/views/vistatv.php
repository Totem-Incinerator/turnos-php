    
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
  $ultimo=$turno->obtenerUltimo();
 
  $turnosiguiente = $ultimo[0]["nombre_cliente"]." ".$ultimo[0]["apellidos_cliente"]." - Turno ". $ultimo[0]["numero_turno"];
  // print_r($turnosiguiente);
?>
<body> 
<div class="container-fluid">
  <div class="row justify-content-between">
    <div class="col-md-5 ">
      <!-- <h3>Turno:</h3> -->
      <div class="row">
        <div class="col-10">
          <div class="alert alert-success fw-bolder"  role="alert" >
            <p id="ultimo"></p>
       <!--      <?=$turnosiguiente?> -->
            
          </div>
          <p>Proximos Turnos en ser atendidos</p>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col" color="red"S>Nombre</th>
                <th scope="col">Turno</th>
              </tr>
            </thead>
            <tbody id="tablaturno">
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
              <td><?=$turno["nombre_cliente"]?></td>   

                <td><?=$resultado?></td>   
              </tr>
                <?php

                    }
                ?>
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
    <!-- TEST -->
    <div class="col-6">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
             <!--  <div class="carousel-item active">
                <img src="../../public/img/Cabildo-Mayor-Yanakona.jpg" class="d-block w-50 img-fluid" alt="">
              </div> -->
              <div class="carousel-item active">
                <img style="object-fit: cover;" src="../../public/img/paramo.jpg" class="d-block w-100" alt="">
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
            <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a> -->
          </div>
        </div>
  </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    // Iniciar el carrusel al cargar la página
    $('.carousel').carousel();

    // Configurar el intervalo del carrusel para que se mueva automáticamente
    $('.carousel').carousel({
      interval: 1000 // Cambia 2000 por el intervalo de tiempo deseado en milisegundos
    });
  });
  
  function generateTableRows(data) {
    var tableBody = $("#tablaturno"); // Replace with your table body ID
    tableBody.html(""); // Clear existing rows
 
    $.each(data, function(index, turno) {
        var row = $("<tr></tr>");
        var resultado = turno["tipo_turno"] === "preferencial" ? "P" : "G";
        resultado += turno["numero_turno"];
 
        row.append("<td>" + turno["nombre_cliente"] + "</td>");
        row.append("<td>" + resultado + "</td>");
        tableBody.append(row);
    });
}

  function hacerpeticion(){
    $.ajax({
    type: "GET",
    url: "http://localhost/turnos-php/app/controllers/actualizarturnos.php",
    dataType:"json",
    success: function (data) {
      $("#ultimo").text(data["ultimo"]);
     // data=data.pop();
      generateTableRows(data);
       console.log(data);

    },
    error: function(xhr,status,error){
      console.log(error);
    }
   });
  }

  setInterval(hacerpeticion,2000);

  // setTimeout(() => {
  //   //location.reload()
  //   $(document).ready(function(){

  //         $.ajax({
  //       type: "GET",
  //       url: "http://localhost/turnos-php/app/controllers/actualizarturnos.php",
  //       dataType:"json",
  //       success: function (data) {
  //           console.log(data);

  //       },
  //       error: function(xhr,status,error){
  //         console.log(xhr.statusText);
  //       }
  //      });

  //   })

  // }, 5000)


</script>
</body>
   </html> 
 <script src="../turno.js"></script>
 
<?php 
  require_once("../templates/boostrapjs.php");
?>
