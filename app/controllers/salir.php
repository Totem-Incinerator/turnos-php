<?php 
session_start();
// Eliminar sesión
session_unset();
// Destruir sessión.
session_destroy();

echo "Saliendo..";
sleep(2);
header('Location: ../../index.php');
?>