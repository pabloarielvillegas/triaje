<?php
	
	session_start();
	if(!isset($_SESSION["usuario"])) {
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php
		
		// Conexion a la bd
  		include("../triaje/config/datos_conexion.php");
		
		$id = $_POST["id"];
		$acceso= $_POST["acceso"];
		


  $sql= "UPDATE usuarios SET acceso=:MARC_acceso WHERE id=:MARC_id";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":MARC_id"=>$id, ":MARC_acceso"=>$acceso));

  header("location:usuarios_crear.php");



?>
</body>
</html>