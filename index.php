<?php
session_start();
$_SESSION['auth'] = "false";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./public/css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    
    <title>TurnosDcmy</title>
</head>
<?php
 //require_once("app/templates/header.php");
?>
<body>
<body>
     
     <h1>Hola mundoaaa</h1>
     
       <a href="app/views/inicioSesion.php">Inicio sesión.</a>
       <br>
       <a href="app/views/crearTurno.php">Crear turno.</a>
       <br>
       <a href="app/views/inicioEmpleado.php">Inicio empleado.</a>
       <br>
       <a href="app/views/registrarEmpleado.php">Registrar empleado.</a>
       <br>
       <a href="app/views/vistatv.php">Vista T.V.</a>
     
     

  <!-- <section class="vh-100" style="background-color: #343a40;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="./public/img/Cabildo-Mayor-Yanakona.jpg"
                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">

                    <form>

                     

                      <h5 class="fw-normal mb-3 pb-3 fw-bold" style="letter-spacing: 1px;">Inicia Sesión</h5>

                      <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17"></label>
                      <input type="email" id="form2Example17" placeholder="Ingresa tu correo" class="form-control form-control-lg border-start-0 border-top-0 border-end-0"  />
                        
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="form2Example27"placeholder="Ingresa tu contraseña" class="form-control form-control-lg border-start-0 border-top-0 border-end-0" />
                      <label class="form-label" for="form2Example27"></label>
                      </div>

                      <div class="pt-1 mb-4">
                        <button class="btn btn-success btn-lg btn-block" type="button">Ingresar</button>
                      </div>

                      
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section> -->

    

    <?php /*require_once("./app/templates/footer.php")*/ ?>
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>