<?php  
	require_once("../models/turnos.php");

	$turno=new Turno();
	  $atendidos=$turno->obtenerAtendidos();
	  $ultimo=$turno->obtenerUltimo();
	 
	  $turnosiguiente = $ultimo[0]["nombre_cliente"]." ".$ultimo[0]["apellidos_cliente"]." - Turno ". $ultimo[0]["numero_turno"];
	   //print_r($turnosiguiente);
	   // print_r($atendidos);
	  
	 // array_push($atendidos,["$ultimo"=>$turnosiguiente]);
	   $atendidos += ["ultimo"=>$turnosiguiente];
	  echo json_encode($atendidos);


  ?>
