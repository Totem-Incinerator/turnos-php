<?php
 require_once("../../conexion/conexion.php");

class Turno extends Conexion{
   function __construct(){
        $this->db= parent::__construct();
   }

   function obtenerTurnos(): array {
            
        
    // Preparación de la consulta SQL
    $consulta= $this->db->prepare("SELECT * FROM turnos WHERE Estado = 0 ORDER BY fecha DESC, tipo_turno ASC;");

    // Ejecución de la consulta
    $consulta->execute();

    // Obtención de los datos en un array
    $turnos = [];
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $turnos[]= $fila;
    }

    // Cierre de la conexión
    $db = null;

    // Retorno del array con los datos
    return $turnos;
}

     function actualizarEstado($id_turno, $Estado){
        try {
            $db = $this->db; // Acceder a la conexión a la base de datos
         
            $sql = "UPDATE turnos SET Estado=:Estado WHERE id_turno=:id_turno";

            $stmt = $db->prepare($sql);

            $stmt->execute([
                ':id_turno' => $id_turno,
                ':Estado' => $Estado
                         
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
     }

     function obtenerAtendidos(): array {
            
        
        // Preparación de la consulta SQL
        $consulta= $this->db->prepare("SELECT * FROM turnos as t WHERE t.estado = 0 ORDER BY id_turno ASC LIMIT 5;");
    
        // Ejecución de la consulta
        $consulta->execute();
    
        // Obtención de los datos en un array
        $turnos = [];
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $turnos[]= $fila;
        }
    
        // Cierre de la conexión
        $db = null;
    
        // Retorno del array con los datos
        return $turnos;
    }

    
   
    function obtenerUltimo(): array {
            
        
        // Preparación de la consulta SQL
        $consulta= $this->db->prepare("SELECT * FROM turnos as t WHERE t.estado = 1 ORDER BY t.hora_inicio DESC;");
    
        // Ejecución de la consulta
        $consulta->execute();
    
        // Obtención de los datos en un array
        $turnos = [];
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $turnos[]= $fila;
        }
    
        // Cierre de la conexión
        $db = null;
    
        // Retorno del array con los datos
        return $turnos;
    }

}

 


?>