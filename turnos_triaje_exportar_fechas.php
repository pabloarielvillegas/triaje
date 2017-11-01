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
		<form class="form-horizontal" action="turnos_triaje_exportar_fechas_mostrar.php" method="get">
				<fieldset>

					<!-- Form Name -->
					<legend>Atenciones Servicio de Emergencia</legend>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="fecha_ini">Fecha de Inicio</label>  
						<div class="col-md-2">
							<input id="fecha_ini" name="fecha_ini" class="form-control input-md" required="" type="text" value="<?php echo date('Y/m/d');?>">

						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="fecha_fin">Fecha final</label>  
						<div class="col-md-2">
							<input id="fecha_fin" name="fecha_fin" class="form-control input-md" required="" type="text" value="<?php echo date('Y/m/d');?>">

						</div>
					</div>

					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="singlebutton"></label>
						<div class="col-md-4">
							<button id="singlebutton" name="singlebutton" class="btn btn-success">Exportar</button>
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