<?php
 require_once("../../conexion/conexion.php");

 class AsignarTurno extends Conexion{
     private $contador;
    function __construct(){
        $this->db = parent::__construct();
        $this->contador = $this->obtenerContador();
    }

    private function obtenerContador() {
        try {
            $db = $this->db;
            $sql = "SELECT MAX(numero_turno) AS max_numero FROM turnos";
            $stmt = $db->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['max_numero'] ? intval($row['max_numero']) + 1 : 1;
        } catch (PDOException $e) {
            return 1; // Si hay algún error, inicializa el contador en 1
        }
    }
 
   


    function resetearContador() {
        try {
            $db = $this->db;
            $sql = "UPDATE turnos SET numero_turno = 0";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $this->contador = 0;
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    function obtenerHora() {
        date_default_timezone_set('America/Bogota');
        $dateTime = new DateTime();
        $horaActual = $dateTime->format('H:i:s');
        return $horaActual;
    }



    function guardar($nombre_cliente, $apellidos_cliente, $tipo_cc, $cedula, $fecha_hora, $tipo_turno) {

             
        try {
            $db = $this->db; // Acceder a la conexión a la base de datos

            date_default_timezone_set('America/Bogota');
            $fecha_hora = date('Y-m-d H:i:s');
            $horaActual = date('H:i:s');
            
            $sql = "INSERT INTO turnos (nombre_cliente, apellidos_cliente, tipo_cc, cedula, fecha, hora_inicio, tipo_turno, numero_turno) 
                    VALUES (:nombre_cliente, :apellidos_cliente,:tipo_cc, :cedula, :fecha_hora, :hora_inicio, :tipo_turno,:numero_turno)";

            $stmt = $db->prepare($sql);


            $stmt->execute([
                ':nombre_cliente' => $nombre_cliente,
                ':apellidos_cliente' => $apellidos_cliente,
                ':tipo_cc' => $tipo_cc,
                ':cedula' => $cedula,
                ':fecha_hora' => $fecha_hora,
                ':hora_inicio'=> $horaActual,
                ':tipo_turno' => $tipo_turno,  
                ':numero_turno'=> $this->contador       
            ]);
            $this->contador+=1;
            return true;
        } catch (PDOException $e) {
            return false;
        }






        
    }
    
    function asignarTurno ($id_turno, $id_empleado,$comentario){
         try {
            $db = $this->db; // Acceder a la conexión a la base de datos

         
            $sql = "INSERT INTO  turno_empleados(id_turno, id_empleado, comentario)  VALUES (:id_turno,:id_empleado,:comentario)";

            $stmt = $db->prepare($sql);

            $stmt->execute([
                ':id_turno' => $id_turno,
                ':id_empleado' => $id_empleado,
                ':comentario' => $comentario,          
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }


    

 
}   

$asignar=new AsignarTurno();
$asignar->asignarTurno(4,12,"hola");


?>