<?php
	require_once("../models/asignarTurno.php");
	require_once("../models/turnos.php");

	$asignar =new AsignarTurno();
	$turno = new Turno();

	// Procesar la petición de registro
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	  // Obtener los datos del formulario
	  $id_empleado = $_POST['id_empleado'];
	
	  $id_turno = $_POST['id_turno'];
	 
	  $comentario =$_POST['comentario'];

	  $asignado = $asignar->asignarTurno($id_turno, $id_empleado, $comentario);

	  try {

	  	if( $asignado ){
	  		
	  		$turno->actualizarEstado($id_turno,1);
	  		
	  		header('Location: ../views/inicioEmpleado.php');
	  	}else{

	 		header('Location: ../views/inicioEmpleado.php');

	  	}
	  
	  } catch (Exception $e) {
	  	echo $e->message();
	  }
	  // buscar usuario
	 //  $empleado = $empleado->buscarEmpleadoPorCorreo($correo);
	 //  print_r($empleado[5]);
	  

	 //  //Mostrar un mensaje de éxito o error
	 //  if ($empleado) {

	 // 	if( verificarContrasena($clave, $empleado[5]) ){
			
		//  header('Location: ../views/inicioEmpleado.php');
			
		// 	exit;
	 //   	}else{
	 //   		header('Location: ../views/auth.php');
			  
	 //  		exit;
	 //   	}
  		
	 //   } else {
	 //     echo "Error al registrar usuario";
	 // header('Location: ../../../../index.php');
	 //    exit;
	 //  }
	}


?>