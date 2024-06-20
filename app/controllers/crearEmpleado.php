<?php

	require_once("../models/empleado.php");

	function encriptarContrasena(string $contrasena): string {
	  // Opciones para el algoritmo bcrypt
	  $opciones = [
	    'cost' => 12,
	  ];

	  // Generar hash de la contraseña
	  $hash = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);

	  // Devolver el hash
	  return $hash;
	}


	$empleado = new Empleado();

	// Procesar la petición de registro
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	  // Obtener los datos del formulario
	  $cedula = $_POST['cedula'];
	  $nombres = $_POST['nombre'];
	  $apellidos = $_POST['apellido'];
	  $correo = $_POST['correo'];
	  $clave = encriptarContrasena($_POST['clave']);

	  // Registrar el usuario
	  $usuarioRegistrado = $empleado->agregarEmpleado($cedula, $nombres, $apellidos, $correo, $clave);

	  // Mostrar un mensaje de éxito o error
	  if ($usuarioRegistrado) {
	    echo "Usuario registrado correctamente";
	    header('Location: ../views/inicioSesion.php');
  		exit;
	  } else {
	    echo "Error al registrar usuario";
	  }
	}

?>