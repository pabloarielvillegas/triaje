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
		$fecha_ia = $_POST["fecha_ia"];
		$hora_ia = $_POST["hora_ia"];
		$sexo= $_POST["sexo"];
		$apellidos = $_POST["apellidos"];
		$nombres = $_POST["nombres"];
		$edad = $_POST["edad"];
		$edadma = $_POST["edadma"];
		$cc= $_POST["cc"];
		$f08= $_POST["f08"];
		$direccion= $_POST["direccion"];
		$telefono= $_POST["telefono"];
		$afiliado= $_POST["afiliado"];
		$sv_pa= $_POST["sv_pa"];
		$sv_fc= $_POST["sv_fc"];
		$sv_fr= $_POST["sv_fr"];
		$sv_te= $_POST["sv_te"];
		$sv_so= $_POST["sv_so"];
		$sv_gl= $_POST["sv_gl"];
			$peso= $_POST["peso"];
		$enfer_croni= $_POST["enfer_croni"];
		$motivo= $_POST["motivo"];
		$tiempo_evol= $_POST["tiempo_evol"];
		$se_vae= $_POST["se_vae"];
		$se_ven= $_POST["se_ven"];
		$se_car= $_POST["se_car"];
		$se_neu= $_POST["se_neu"];
		$prioridad_tm= $_POST["prioridad_tm"];
		$usuario_registro= $_SESSION["usuario"];

		
					require("../triaje/config/datos_conexion.php");
					
						$sql="INSERT INTO turnostriaje (fecha_ia,hora_ia,sexo,apellidos,nombres,edad,edadma,cc,f08,direccion,telefono,afiliado,sv_pa,sv_fc,sv_fr,sv_te,sv_so,sv_gl,peso,enfer_croni,motivo,tiempo_evol,se_vae,se_ven,se_car,se_neu,prioridad_tm, usuario_registro) VALUES
								(:fecha_ia,:hora_ia,:sexo,:apellidos,:nombres, :edad, :edadma, :cc,:f08,:direccion,:telefono,:afiliado,:sv_pa, :sv_fc, :sv_fr, :sv_te, :sv_so, :sv_gl, :peso, :enfer_croni, :motivo, :tiempo_evol, :se_vae, :se_ven, :se_car, :se_neu, :prioridad_tm, :usuario_registro)";

						$resultado=$base->prepare($sql);
						$resultado->execute(array(":fecha_ia"=>$fecha_ia,":hora_ia"=>$hora_ia, ":sexo"=>$sexo, ":apellidos"=>$apellidos,":nombres"=>$nombres, ":edad"=>$edad, ":edadma"=>$edadma,":cc"=>$cc,":f08"=>$f08,":direccion"=>$direccion,":telefono"=>$telefono,":afiliado"=>$afiliado, ":sv_pa"=>$sv_pa, ":sv_fc"=>$sv_fc, ":sv_fr"=>$sv_fr, ":sv_te"=>$sv_te, ":sv_so"=>$sv_so, ":sv_gl"=>$sv_gl, ":peso"=>$peso, ":enfer_croni"=>$enfer_croni, ":motivo"=>$motivo, ":tiempo_evol"=>$tiempo_evol, ":se_vae"=>$se_vae, ":se_ven"=>$se_ven, ":se_car"=>$se_car, ":se_neu"=>$se_neu, ":prioridad_tm"=>$prioridad_tm, ":usuario_registro"=>$usuario_registro));
			
							header("location:turnos_triaje.php");			
			

?>	
</body>
</html>