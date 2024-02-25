<?php
include ("modelo/conexion.php");

if(isset($_POST['btnregistrarcliente'])){
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $rol=$_POST["role"];
    switch($rol) {
        case 'maestro':
            $rol = 'Maestro';
            break;
        case 'estudiante':
            $rol = 'Estudiante';
            break;
        case 'representante':
            $rol = 'Representante';
            break;
        default:
            $rol = 'Desconocido';
    }
    
    if(!empty($nombre) && !empty($apellido) && !empty($rol)) {
        $sql = "INSERT INTO empleados (nombre, apellido, rol) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        if ($stmt) {
          $stmt->bind_param("sss", $nombre, $apellido, $rol);
          $resultado = $stmt->execute();
          if ($resultado) {
            echo "Registro exitoso";
          } else {
            echo "Error al registrar: " . $stmt->error;
          }
        }
    }
}
?>