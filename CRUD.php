<?php
session_start();
if(!isset($_SESSION["id"])){
    header("location: login.php");
  }
?>

<?php
include("modelo/conexion.php");
include("controlador/crud.php");

require_once('modelo/conexion.php');

$sql = "SELECT * FROM empleados";
$execute = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col s8 offset-s2">
            <form method="POST" action=""> <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Rol</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($fila = mysqli_fetch_array($execute)) { ?>
                            <tr>
                                <td><input type="hidden" name="id[]" value="<?php echo $fila['id']; ?>"><?php echo $fila['id']; ?></td>
                                <td><input type="text" name="nombre[]" value="<?php echo $fila['nombre']; ?>"></td>
                                <td><input type="text" name="apellido[]" value="<?php echo $fila['apellido']; ?>"></td>
                                <td><input type="text" name="rol[]" value="<?php echo $fila['rol']; ?>"></td> 
                                <td><input type="radio" name="action" value="editar_<?php echo $fila['id']; ?>"></td> 
                                <td><input type="radio" name="action" value="eliminar_<?php echo $fila['id']; ?>"></td>
                                <td><button name= "btnCRUD" type="submit">Realizar acción</button></td>
                            </tr>
                               
                        <?php } ?>
                    </tbody>
                </table>
               
            </form>
        </div>
    </div>
</body>

</html>
