<?php
include("modelo/conexion.php");
if (isset($_POST['btnCRUD'])) {
    $action = $_POST['action'];
    $selectedId = null; 
    preg_match('/^(editar|eliminar)_(\d+)$/', $action, $matches);
    if ($matches) {
      $action = $matches[1];
      $selectedId = $matches[2];
    }
  
    if ($action === 'editar') {
        echo "La acción es: " . $action . " y el ID seleccionado es: " . $selectedId;
        $sql = "UPDATE empleados SET nombre = ?, apellido = ?, rol = ? WHERE id = ?";
          $stmt = $conexion->prepare($sql);
          if ($stmt) {
            $nombre = (isset($_POST['nombre'][0])) ? $_POST['nombre'][0] : ''; 
            $apellido = (isset($_POST['apellido'][0])) ? $_POST['apellido'][0] : '';
            $rol = (isset($_POST['rol'][0])) ? $_POST['rol'][0] : '';
            $stmt->bind_param("ssss", $nombre, $apellido, $rol, $selectedId);
            $resultado = $stmt->execute();

            if ($resultado) {
              echo "<div class='alert alert-success' role='alert'>
                Usuario modificado con éxito
              </div>";
            } else {
              echo "<div class='alert alert-danger' role='alert'>
                Error al modificar el usuario
              </div>";
            }
          } else {
            echo "<div class='alert alert-danger' role='alert'>
              Error en la consulta
            </div>";
          }
    
    } else if ($action === 'eliminar') {
           echo "La acción es: " . $action . " y el ID seleccionado es: " . $selectedId;
  $sql = "DELETE FROM empleados WHERE id =?";
  $stmt = $conexion->prepare($sql);
  if ($stmt) {
    $stmt->bind_param("i", $selectedId); // "i" for integer type, assuming id is an integer
    $resultado = $stmt->execute();
    if ($resultado) {
      echo "<div class='alert alert-success' role='alert'>
        Usuario eliminado con éxito
      </div>";
    } else {
      echo "<div class='alert alert-danger' role='alert'>
        Error al eliminar el usuario
      </div>";
    }
  } else {
    echo "<div class='alert alert-danger' role='alert'>
      Error en la consulta
    </div>";
  }
    } else {
        echo "La acción es: " . $action . " y el ID seleccionado es: " . $selectedId;
    }
  }
  
?>

