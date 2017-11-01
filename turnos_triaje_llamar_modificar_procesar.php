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
	
	
		$idtr = $_POST["idtr"];
		$hora_llamada = $_POST["hora_llamada"].":00";
		$hora_llamada2 = $_POST["hora_llamada2"];
		$hora_llamada3 = $_POST["hora_llamada3"];
		$e_turno = $_POST["e_turno"];
		$consultorio = $_POST["consultorio"];
		$usuario_atencion= $_SESSION["usuario"];


 $sql= "UPDATE turnostriaje SET hora_llamada=:MARC_hora_llamada, hora_llamada2=:MARC_hora_llamada2, hora_llamada3=:MARC_hora_llamada3,e_turno=:MARC_e_turno,consultorio=:MARC_consultorio,usuario_atencion=:MARC_usuario_atencion  WHERE idtr=:MARC_idtr";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":MARC_idtr"=>$idtr, ":MARC_hora_llamada"=>$hora_llamada, ":MARC_hora_llamada2"=>$hora_llamada2, ":MARC_hora_llamada3"=>$hora_llamada3,":MARC_e_turno"=>$e_turno,":MARC_consultorio"=>$consultorio, ":MARC_usuario_atencion"=>$usuario_atencion ));

  header("location:turnos_triaje.php");



?>
</body>
</html>