<?php

  // Inicio de sesion despues del Login 
  session_start();
  if(!isset($_SESSION["usuario"])) {
    header("Location:index.php");
  }

  
?> 

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


	<title>Menu</title>
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/develop/build/css/metro-icons.min.css">
	
	<link href="../triaje/interfaz/css/main.css" rel="stylesheet" type="text/css">

</head>
<body>

	<div class="container">
		<span class="mif-chevron-left mif-3x boton"></span>
		<nav>
			<ul id="menu_principal">

					
				<li><a href="turnos_triaje.php"><span class="mif-thermometer2 mif-3x principales" style="color: red;" >
					
				</span>Triaje</a></li>

				<li><a href="turnos_triaje_atender.php"><span class="mif-medkit mif-3x principales"
				style="color: green;"></span>Atención</a></li>
				
				
				<li>
					<label for="drop-2">
						<span class="mif-search mif-3x principales" style="color: coral;"></span>
						Buscar
						<span class="mif-chevron-right mif-2x derecha"></span>
						<span class="mif-expand-more mif-2x derecha"></span>
					</label>

					<input type="checkbox" id="drop-2">
					<ul>
						
						<li>
							<label for="drop-3">
								Consultas Atención

							</label>
							<input type="checkbox" id="drop-3">
							<ul>
								<li><a href="turnos_triaje_consulta_fechas.php">Por fecha</a></li>
								<li><a href="turnos_triaje_consulta_cc.php">Por CC/Código </a></li>
					
							</ul>
		
							</ul>

				</li>
			

				<li><a href="turnos_triaje_exportar_fechas.php"><span class="mif-file-excel mif-3x principales" style="color: navy;"></span>Reportes</a>
						
				</li>

				<li><a href="usuarios_logout.php"><span class="mif-exit mif-3x principales" style="color: olive;"></span>Salir</a></li>


			</ul>
		</nav>
	</div>

	<div align="center">
		
		 <img width="100%" src="/triaje/interfaz/images/amalavida.jpg"> 

	</div>

	
	<script src="../triaje/interfaz/js/main.js"></script>

</body>
</html>