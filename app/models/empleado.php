
<?php
    require_once("../../conexion/conexion.php");

    class Empleado extends Conexion{
     
        function __construct(){
            $this->db = parent::__construct();
        }

        function obtenerEmpleados(): array {
            
        
            // Preparación de la consulta SQL
            $consulta= $this->db->prepare("SELECT id_empleado, nombres, apellidos FROM empleado");
        
            // Ejecución de la consulta
            $consulta->execute();
        
            // Obtención de los datos en un array
            $empleados = [];
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $empleados[]= $fila;
            }
        
            // Cierre de la conexión
            $db = null;
        
            // Retorno del array con los datos
            return $empleados;
        }

        // Buscar usuario por cedula
        function buscarUsuarioPorCedula(int $cedula):bool {

          // Preparar la consulta
          $stmt = $this->db->prepare('SELECT * FROM empleado WHERE cedula = :cedula');

          // Enlazar el parámetro
          $stmt->bindParam(':cedula', $cedula, PDO::PARAM_INT);

          // Ejecutar la consulta
          $stmt->execute();

          // Obtener el resultado
          $usuario = $stmt->fetch();

          // Cerrar la conexión
          $pdo = null;

          // Devolver el resultado
          return $usuario !== false;
        }

        function buscarEmpleadoPorCorreo(string $correo) {

          // Preparar la consulta
          $stmt = $this->db->prepare('SELECT * FROM empleado WHERE correo = :correo');

          // Enlazar el parámetro
          $stmt->bindParam(':correo', $correo);

          // Ejecutar la consulta
          $stmt->execute();

          // Obtener el resultado
          $usuario = $stmt->fetch();

          // Cerrar la conexión
          $pdo = null;

          // Devolver el resultado
          return $usuario;
        }

        
        // Función para agregar un usuario
        function agregarEmpleado(int $cedula, string $nombres, string $apellidos, string $correo, string $clave): bool {

          // Preparar la consulta
          $consulta = $this->db->prepare('INSERT INTO empleado (cedula, nombres, apellidos, correo, clave) VALUES (:cedula, :nombres, :apellidos, :correo, :clave)');

          // Enlazar los parámetros
          $consulta->bindParam(':cedula', $cedula, PDO::PARAM_INT);
          $consulta->bindParam(':nombres', $nombres, PDO::PARAM_STR);
          $consulta->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
          $consulta->bindParam(':correo', $correo, PDO::PARAM_STR);
          $consulta->bindParam(':clave', $clave, PDO::PARAM_STR);

          // Ejecutar la consulta
          $exito = $consulta->execute();

          // Cerrar la conexión
          $pdo = null;

          // Devolver el resultado
          return $exito;
        }
        
        public function salir(){
          unset($_SESSION['email']);
          session_destroy();
          header("refresh:3 url=../../index.php");
          echo "Cerrando sesión...";
        }

        function actualizarEstado($id_empleado){
          try {
              $db = $this->db; // Acceder a la conexión a la base de datos
           
              $sql = "UPDATE empleado";
  
              $stmt = $db->prepare($sql);
  
              $stmt->execute([
                  ':id_empleado' => $id_empleado,
                 
              ]);
  
              return true;
          } catch (PDOException $e) {
              return false;
          }
       }

    }



    $test = new Empleado();

    // Ejemplo de uso
    // $cedula = "123456789";
    // $nombres = "Juan Pérez";
    // $apellidos = "Gómez Martínez";
    // $sede = "Bogotá";
    // $correo = "juan.perez@correo.com";
    // $clave = "clave123";

    // $usuarioAgregado = $test->buscarEmpleadoPorCorreo("jose@gmail.com");

    //  print_r($usuarioAgregado);
    // echo $usuarioAgregado[5];
    //  $usuarioEncontrado = $test->buscarUsuarioPorCedula("123456789");

    //  if ($usuarioAgregado) {
    //    echo "Econtrado";
    //  } else {
    //    echo "Usuario no encontrado";
    //  }

?>
