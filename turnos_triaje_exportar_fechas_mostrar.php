<?php 

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=triaje_emergencia.xls");

// Conexion a la base de datos para realizar consultas
			require("config/exportar_conexion.php");
			$conexion = mysqli_connect($db_host,$db_usuario,$db_contra);
			$fecha_inicial= mysqli_real_escape_string($conexion,$_GET ["fecha_ini"]);
			$fecha_final= mysqli_real_escape_string($conexion,$_GET ["fecha_fin"]);
			if(mysqli_connect_errno()){
				echo "No se puede conectar con la DB";
				exit();
			}

			mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
			mysqli_set_charset($conexion,"utf8");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Triaje Servicio de Emergencia</title>
</head>
<body>

			<table  border="1" >
				<tr>
	 <th>Prioridad TM</th>
      <th>Turno</th>
      <th>Form-08</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Hora 1 LLamada</th>
      <th>Hora 2 LLamada</th>
      <th>Hora 3 LLamada</th>
      <th>Sexo</th>
      <th>Apellidos</th>
      <th>Nombres</th>
      <th>Edad</th>
      <th>A/M</th>
      <th>CC/Código</th>
      <th>Dirección</th>
      <th>Teléfono</th>
      <th>Afiliado</th>
      <th>Estado Turno</th>
      <th>P. Arterial</th>
      <th>F. Cardiaca</th>
      <th>F. Respiratoria</th>
      <th>Temperatura</th>
      <th>Saturación O2</th>
      <th>Glasgow</th>
      <th>Peso</th>
     <th>E. Crónicas</th>
	  <th>Motivo</th>
     <th>T Evolución</th>
     <th>Vía Aerea</th>
     <th>Ventilación</th>
      <th>Cardiovascular</th>
      <th>Neurológico</th>
      <th>Observación</th>
      <th>CIE10</th>
      <th>Diagnóstico</th>
      <th>Medicación</th>
      <th>Transferio</th>
      <th>U. Registro</th>
      <th>U. Atención</th>
      <th>C</th>
				</tr>

				<?php 

					$consulta="SELECT * FROM turnostriaje  WHERE  fecha_ia BETWEEN  '$fecha_inicial' AND '$fecha_final'" ;
					

					$resultados= mysqli_query($conexion,$consulta);
					$row_cnt = mysqli_num_rows($resultados); 

					while($fila=mysqli_fetch_array($resultados, MYSQL_ASSOC)){

						echo '<tr>';
						echo '<td>'.$fila["prioridad_tm"].'</td>';
						echo '<td>'.$fila["idtr"].'</td>';
						echo '<td>'.$fila["f08"].'</td>';
						echo '<td>'.$fila["fecha_ia"].'</td>';
						echo '<td>'.$fila["hora_ia"].'</td>';
						echo '<td>'.$fila["hora_llamada"].'</td>';
						echo '<td>'.$fila["hora_llamada2"].'</td>';
						echo '<td>'.$fila["hora_llamada3"].'</td>';
						//echo '<td>'.$fila["hora_llamada3"].':00</td>';
						echo '<td>'.$fila["sexo"].'</td>';
						echo '<td>'.$fila["apellidos"].'</td>';
						echo '<td>'.$fila["nombres"].'</td>';
						echo '<td>'.$fila["edad"].'</td>';
						echo '<td>'.$fila["edadma"].'</td>';  
						echo '<td>'.$fila["cc"].'</td>';
						echo '<td>'.$fila["direccion"].'</td>';
						echo '<td>'.$fila["telefono"].'</td>';
						echo '<td>'.$fila["afiliado"].'</td>';	
						echo '<td>'.$fila["e_turno"].'</td>';
						echo '<td>'.$fila["sv_pa"].'</td>';
						echo '<td>'.$fila["sv_fc"].'</td>';
						echo '<td>'.$fila["sv_fr"].'</td>';
						echo '<td>'.$fila["sv_te"].'</td>';
						echo '<td>'.$fila["sv_so"].'</td>';
						echo '<td>'.$fila["sv_gl"].'</td>';
                      	echo '<td>'.$fila["peso"].'</td>';
                      	echo '<td>'.$fila["enfer_croni"].'</td>';
						echo '<td>'.$fila["motivo"].'</td>';
						echo '<td>'.$fila["tiempo_evol"].'</td>';
						echo '<td>'.$fila["se_vae"].'</td>';
						echo '<td>'.$fila["se_ven"].'</td>';
						echo '<td>'.$fila["se_car"].'</td>';
						echo '<td>'.$fila["se_neu"].'</td>';
						echo '<td>'.$fila["observacion"].'</td>';
						echo '<td>'.$fila["ccie10"].'</td>';
						echo '<td>'.$fila["diagnostico"].'</td>';
						echo '<td>'.$fila["medicacion"].'</td>';
						echo '<td>'.$fila["transferido"].'</td>';
						echo '<td>'.$fila["usuario_registro"].'</td>';
						echo '<td>'.$fila["usuario_atencion"].'</td>';
						echo '<td>'.$fila["conteo"].'</td>';
							
						echo '</tr>';

					}

						mysqli_close($conexion); 
					?>	
				</table>

</body>
</html>

