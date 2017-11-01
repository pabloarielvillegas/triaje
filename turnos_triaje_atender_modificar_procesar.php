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
		$fecha_ic = $_POST["fecha_ic"];
		$hora_ic = $_POST["hora_ic"];
		$e_turno= $_POST["e_turno"];
		$observacion = $_POST["observacion"];
		$diagnostico = $_POST["diagnostico"];
		$medicacion = $_POST["medicacion"];
		$ccie10 = $_POST["ccie10"];
		$transferido = $_POST["transferido"];
		$usuario_atencion= $_SESSION["usuario"];


  $sql= "UPDATE turnostriaje SET hora_llamada=:MARC_hora_llamada, hora_llamada2=:MARC_hora_llamada2, hora_llamada3=:MARC_hora_llamada3, fecha_ic=:MARC_fecha_ic, hora_ic=:MARC_hora_ic, e_turno=:MARC_e_turno, observacion=:MARC_observacion, diagnostico=:MARC_diagnostico, medicacion=:MARC_medicacion, ccie10=:MARC_ccie10, transferido=:MARC_transferido, usuario_atencion=:MARC_usuario_atencion  WHERE idtr=:MARC_idtr";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":MARC_idtr"=>$idtr, ":MARC_hora_llamada"=>$hora_llamada, ":MARC_hora_llamada2"=>$hora_llamada2, ":MARC_hora_llamada3"=>$hora_llamada3,":MARC_fecha_ic"=>$fecha_ic, ":MARC_hora_ic"=>$hora_ic, ":MARC_e_turno"=>$e_turno, ":MARC_observacion"=>$observacion, ":MARC_diagnostico"=>$diagnostico, ":MARC_medicacion"=>$medicacion, ":MARC_ccie10"=>$ccie10, ":MARC_transferido"=>$transferido, ":MARC_usuario_atencion"=>$usuario_atencion ));

  header("location:turnos_triaje_atender.php");



?>
</body>
</html>