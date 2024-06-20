<?php
require_once("../models/asignarTurno.php");

  $turno = new asignarTurno ();  

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre_cliente = $_POST['nombre_cliente'];
        $apellidos_cliente = $_POST['apellidos_cliente'];
        $tipo_cc = $_POST['tipo_cedula'];
        $cedula = $_POST['cedula'];
        $fecha_hora = $_POST['fecha_hora'];
        $tipo_turno = $_POST['tipo_turno'];


       $guardar_turno = $turno->guardar($nombre_cliente, $apellidos_cliente, $tipo_cc, $cedula, $fecha_hora, $tipo_turno);

	  // Mostrar un mensaje de éxito o error
	  if ($guardar_turno) {
	    print_r('listoo');
      
      header('Location: ../views/crearTurno.php');
      

  		exit;
	  } else {
	    echo "Error al registrar turno";
	  }
    

    }
    
?>
