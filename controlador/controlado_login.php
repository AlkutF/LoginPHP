<?php

session_start();

if (!empty($_POST["btningresar"])) {
  if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $sql = $conexion->query("SELECT * FROM usuario WHERE usuario='$usuario'");

    if ($datos = $sql->fetch_object()) {
      // **Verificación de la contraseña**
      if (password_verify($password, $datos->clave)) {
        $_SESSION["id"] = $datos->id;
        $_SESSION["nombre"] = $datos->usuario;
        $_SESSION["apellido"] = $datos->apellido;

        header("location: registros.php");
      } else {
        echo "Contraseña incorrecta";
      }
    } else {
      echo "El usuario no existe";
    }
  } else {
    echo "Los campos no pueden estar vacíos";
  }
}

?>
