<?php

	session_start();

	require_once("../models/empleado.php");

	$empleado = new Empleado();
	


	function verificarContrasena(string $clave, string $hash): bool {
	  // Verificar si la contraseña coincide con el hash
	  $verificado = password_verify($clave, $hash);

	  // Devolver el resultado
	  return $verificado;
	}

	// Procesar la petición de registro
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	  // Obtener los datos del formulario
	  $correo = $_POST['correo'];
	  $clave = $_POST['clave'];

	  // buscar usuario
	  $empleado = $empleado->buscarEmpleadoPorCorreo($correo);
	  // print_r($empleado[5]);
	  

	  //Mostrar un mensaje de éxito o error
	  if ($empleado) {

		 	if( verificarContrasena($clave, $empleado[5]) ){

		 		$_SESSION['auth'] = "true";

		 		header('Location: ../views/inicioEmpleado.php');
				exit;
		   	}else{
		   		header('Location: ../views/auth.php');
		  		exit;
		   	}
	  		
		   // }else{
		   //  echo "Error al registrar usuario";
		 // 	header('Location: ../../../../index.php');
		   //  exit;
		// 	}
		}else{
			print("Este usuario no existe.");
		}
	}



?>
