<?php

	// Inicio de sesion despues del Login 
	session_start();
	if(!isset($_SESSION["usuario"])) {
		header("Location:index.php");
	}
?>	

<DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>HBC - Servicio de Emergencia</title>
<link href="../triaje/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../triaje/interfaz/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>

	<section id="contenedor">
		<header>
				<a href="menu.php"> <img src="../triaje/interfaz/images/logo.png"> </a>
				<div align="right">
				<?php
          echo "| <b>Usuario</b> :". $_SESSION["usuario"];
          ?>&nbsp;|<a href="usuarios_logout.php"> Cerrar  Sesión </a>|

			</div>		
			

		</header>
		
		<div class="espacio" ></div>
		<section>

				<div class="container">
		<form class="form-horizontal" action="turnos_triaje_consulta_cc_mostrar.php" method="get">
				<fieldset>

					<!-- Form Name -->
					<legend>Atenciones Servicio de Emergencia</legend>

					<!-- Text input-->
					
					<div align="center">
				<form action="turnos_triaje_consulta_cc.php" method="get">
					<input type="text"  maxlength="17"  name="buscar" required>
					<input type="submit" name="enviando" class="btn btn-success"  value="Buscar por No.CC/Código"/>
				</form>

			</div>

					</div>

				</fieldset>
			</form>

		</div>
		

	
	</section>	

<script src="../triaje/lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../triaje/lib/bootstrap/js/bootstrap.min.js"></script>	
	
</body>

	
		
</html>