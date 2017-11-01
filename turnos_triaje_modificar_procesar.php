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
		
		$f08 = $_POST["f08"];
		$idtr = $_POST["idtr"];
		$apellidos = $_POST["apellidos"];
		$nombres = $_POST["nombres"];
		$cc= $_POST["cc"];
		$usuario_registro= $_SESSION["usuario"];


  $sql= "UPDATE turnostriaje SET f08=:MARC_f08,apellidos=:MARC_apellidos, nombres=:MARC_nombres, cc=:MARC_cc, usuario_registro=:MARC_usuario_registro  WHERE idtr=:MARC_idtr";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":MARC_idtr"=>$idtr,":MARC_f08"=>$f08,":MARC_apellidos"=>$apellidos, ":MARC_nombres"=>$nombres, ":MARC_cc"=>$cc, ":MARC_usuario_registro"=>$usuario_registro ));

  header("location:turnos_triaje.php");



?>
</body>
</html>