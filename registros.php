<?php
session_start();
if(!isset($_SESSION["id"])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class="bg-dark">
	<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		</div>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<div class="navbar-nav mr-auto">    
				<div class="offset-md-1 mr-auto text-center"></div>
				<a class="nav-item nav-link text-justify active ml-3 hover-primary" href="#"></a>
			</div>
			<div class="text-center justify-content-center">
				<a class="btn text-white" target="_blank" href="CRUD.php">Mostrar usuarios</a>
                <a class="btn text-white" target="_blank" href="controlador/controlador_cerrar_session.php">Cerrar session</a>
			</div>
		</div>
	</nav>
<div class="container d-flex justify-content-center align-items-center">     
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10">
            <div class="login_content">
            <!--<img src="img/avatar.svg">-->
            <?php
                include("controlador/controlador_registros.php");
                ?>
            <h2 class="text-dark text-center">Registrar Usuarios</h2><br>
                <form action="" method="POST"** class="formulario">
                    <div class="input-div one">
                        <div class="div">
                            <h5 class="text-dark text-center">Nombre del usuario</h5>
                            <input id="nombre" type="text" class="input w-100" name="nombre">
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="div">
                            <h5 class="text-dark text-center">Apellido del usuario</h5>
                            <input id="apellido" type="decimal" class="input w-100" name="apellido">
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="div">
                            <h5 class="text-dark text-center">Rol del usuario</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="role1" value="maestro">
                                <label class="form-check-label" for="role1">
                                    Maestro
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="role2" value="estudiante">
                                <label class="form-check-label" for="role2">
                                    Estudiante
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="role3" value="representante">
                                <label class="form-check-label" for="role3">
                                    Representante
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                         <input name="btnregistrarcliente" class="btn-center" type="submit" value="REGISTRAR">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>