<?php

if (isset($_POST["btnregistrar"])) {
  $nombre = trim($_POST["nombre"]);
  $apellido = trim($_POST["apellido"]);
  $usuario = trim($_POST["usuario"]);
  $clave = trim($_POST["clave"]);

  if (empty($nombre) || empty($apellido) || empty($usuario) || empty($clave)) {
    echo "<div class='alert alert-danger' role='alert'>
      Todos los campos son obligatorios
    </div>";
  } else {
    // Encriptación con Bcrypt
    $options = [
      'cost' => 12,
    ];
    $hashedPassword = password_hash($clave, PASSWORD_BCRYPT, $options);

    $sql = "INSERT INTO usuario (nombre, apellido, usuario, clave) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
      $stmt->bind_param("ssss", $nombre, $apellido, $usuario, $hashedPassword);
      $resultado = $stmt->execute();

      if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>
          Usuario registrado con éxito
          
        </div>";
      } else {
        echo "<div class='alert alert-danger' role='alert'>
          Error al registrar el usuario
        </div>";
      }
    } else {
      echo "<div class='alert alert-danger' role='alert'>
        Error al preparar la consulta
      </div>";
    }
  }
}

?>
