<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		include("../triaje/config/datos_conexion.php");


		$idtr=$_GET["idtr"];
		$base->query("DELETE FROM turnostriaje WHERE idtr='$idtr' ");
		header("location:turnos_triaje.php");

	?>

</body>
</html>