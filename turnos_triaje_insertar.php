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

			<style>

				.form1 {
					background-color:  	#FFFFF0;
					border-color: #ccc;
					border-style: solid 2px;		
				}

				h4 {
					text-align: left;;
					color: #ff0000;

				}

			</style>

		</head>

		<body>

			<section id="contenedor">
				<header>
					<a href="/triaje/turnos_triaje.php"> <img src="../triaje/interfaz/images/logo.png"> </a>


				<div align="right">
					<?php
					echo "|<b>Usuario</b> :". $_SESSION["usuario"];
					?>&nbsp;|<a href="usuarios_logout.php"> Cerrar  Sesión |</a>

				</div>		
			</header>

			<section>

				<h2 align="Center">Formulario Triaje de Emergencia</h2>

				<div class="container" >

					<form class="form1" name="tur_triaje" method="post" action="turnos_triaje_insertar_procesar.php"  >
						<table width="40%" border="0" align="center">

						<tr>
								<th>
									<label for="fecha">Fecha</label>
								</th>
								<td>
									<input type="date" name="fecha_ia" required  value="<?php echo date('Y/m/d');?>"  />
								</td>

								<th>
									<label for="hora">Hora </label>
								</th>
								<td>
									<input type="text" name="hora_ia" required  value="<?php echo date("H".":"."i");?>"  />
								</td>	

								
							</tr>
							
							<tr>
								<th>		
									<label for="apellidos">Apellidos</label>
								</th>
								<td>					
									<input name="apellidos" type="text" id="apellidos" size="45" maxlength="45" required autocomplete="off">
								</td>			

								<th>
									<label for="nombres">Nombres</label>
								</th>	
								<td>
									<input name="nombres" type="text" id="nombres" size="45" maxlength="50" required autocomplete="off">
								</td>	
							</tr>

							<tr>			
								<th>
									<label for="edad">Edad</label>
								</th>

								<td>			
									<input name="edad" type="number"  id="edad" size="5" maxlength="3" required autocomplete="off">
									<select  name="edadma" type="text" id="edadma" required >
										<option  value="Años">Año(s)</option>
										<option  value="Meses">Mes(es)</option>
										
									</select>


								</td>

								<th>
									<label for="cc">CC/Código</label>
								</th>

								<td>			
									<input name="cc" type="text"  id="cc" size="20" maxlength="17" placeholder="Registre # cédula o código" required autocomplete="off">
								</td>
							</tr>
							
							<tr>
									<th>
									<label for="f08">Form-08 #</label>
								</th>

								<td>			
									<input name="f08" type="text"  id="f08" size="20" maxlength="10" placeholder="Registre # Form-08" required autocomplete="off">
								</td>
									

									<th>
									<label for="sexo">Sexo </label>
								</th>
								<td>
									<select  name="sexo" type="text" id="sexo" required="required">
										<option  value="">Seleccione</option>
										<option  value="Masculino">Masculino</option>
										<option  value="Femenino">Femenino</option>
										
									</select>

								</td>	
							
							</tr>

							<tr>
									<th>			
										<label for="direccion">Dirección</label>
									</th>					
									<td colspan="1">
										<textarea name="direccion" type="text"  id="direccion" maxlength="200" placeholder=""  required></textarea>

									<th>
										<label for="telefono">Teléfono</label>
									</th>

									<td>			
										<input name="telefono" type="text"  id="telefono" size="20" maxlength="10" placeholder="Teléfono de contacto" autocomplete="off">
									</td>	
							</tr>

							<tr>
									<th>
									<label for="afiliado">Afiliado a ? </label>
									</th>
									<td>
									<select  name="afiliado" type="text" id="afiliado" required="required">
										<option  value="">Seleccione</option>
										<option  value="No Aporta">No Aporta</option>
										<option  value="IESS Seguro General">IESS Seguro General</option>
										<option  value="IESS Seguro Voluntario">IESS Seguro Voluntario</option>
										<option  value="IESS Seguro Campesino">IESS Seguro Campesino</option>
										<option  value="Jubilado IESS/SSC/ISSFA/ISSPOL">Jubilado IESS/SSC/ISSFA/ISSPOL</option>
										<option  value="ISSFA">ISSFA</option>
										<option  value="ISSPOL">ISSPOL</option>
										<option  value="Seguro Privado">Seguro Privado</option>
										<option  value="Seguro Indirecto">Seguro Indirecto</option>
										
									</select>

								</td>		


							</tr>					


							<tr>
								<th colspan="2">
									<h4>Signos Vitales</h4>	
								</th>
							</tr>		

							<tr>		
								<th>
									<label for="sv_pa">Presión Arterial</label>
								</th>		

								<td>
									<input name="sv_pa" type="text" id="sv_pa"  size="10" maxlength="25" value="/mmhg" required >
								</td>	


								<th>
									<label for="sv_fc">Frecuencia Cardiaca</label>
								</th>		

								<td>
									<input name="sv_fc" type="text" id="sv_fc" size="10" maxlength="25" value="/lxm"  required>
								</td>	

							</tr>

							<tr>		
								<th>
									<label for="sv_fr">Frecuencia Respiratoria</label>
								</th>		

								<td>
									<input name="sv_fr" type="text" id="sv_fr" size="10" maxlength="25"  value="/rxm" required>
								</td>	


								<th>
									<label for="sv_te">Temperatura</label>
								</th>		

								<td>
									<input name="sv_te" type="text" id="sv_te" size="10" maxlength="25"  value="°C" required>
								</td>	

							</tr>

						</tr>

						<tr>		
							<th>
								<label for="sv_so">Saturación O2</label>
							</th>		

							<td>
								<input name="sv_so" type="text" id="sv_so" size="10" maxlength="25" value="%" required>
							</td>	
							

							<th>
								<label for="sv_gl">Glasgow</label>
							</th>		

							<td>
								<input name="sv_gl" type="text" id="sv_gl" size="10" maxlength="25" value="/15" required>
							</td>	
							

						</tr>

					</tr>		

					<tr>	
						
                      	<th>
							<label for="peso">Peso</label>	
						</th>	
						<td>
							<input name="peso" type="text" id="peso" size="10" maxlength="5" value="kg" required>
						</td>
					
					                
                      
                      
                      <th>
							<label for="enfer_croni">Enfermedades Crónicas</label>	
						</th>	
						<td>
							<select  name="enfer_croni" type="text" id="enfer_croni" required>
								<option  value="No">No</option>
								<option  value="Si">Si</option>
							</select>
						</td>
						<td></td>	
						<td></td>	
					</tr>	



					<tr>
						<th>			
							<label for="motivo">Motivo Consulta</label>
						</th>					
						<td>
							<textarea name="motivo" type="text"  id="motivo"  maxlength="200" placeholder="" maxlength="200" required></textarea>
						</td>


						<th>			
							<label for="tiempo_evol">Tiempo de Evolución</label>
						</th>					
						<td>
							<input name="tiempo_evol" type="text"  id="tiempo_evol" size="40" maxlength="50" placeholder="" required>
						</td>	
					</tr>		
					<tr>
										
					</tr>

					<tr>
						<th colspan="2">
							<h4>Signos de Emergencia</h4>	
						</th>
					</tr>


					<tr>	
						<th>
							<label for="se_vae">Vía Aérea</label>	
						</th>	
						<td>
							<select  name="se_vae" type="text" id="se_vae" >
								<option  value=""></option>
								<option value= "&check;">&check;</option>
							</select>
						</td>

						<th>
							<label for="se_ven">Ventilación</label>	
						</th>	
						<td>
							<select  name="se_ven" type="text" id="se_ven">
								<option  value=""></option>
								<option value= "&check;">&check;</option>
							</select>
						</td>


					</tr>

					<tr>	
						<th>
							<label for="se_car">Cardiovascular</label>	
						</th>	
						<td>
							<select  name="se_car" type="text" id="se_car" >
								<option  value=""></option>
								<option value= "&check;">&check;</option>
							</select>
						</td>

						<th>
							<label for="se_neu">Neurológico</label>	
						</th>	
						<td>
							<select  name="se_neu" type="text" id="se_neu">
								<option  value=""></option>
								<option value= "&check;">&check;</option>
							</select>
						</td>

					</tr>

					<tr>	
						<th>
						</th>
						<td>
							<label for="prioridad_tm">Triaje de Manchester</label>	
						</td>	
						<td colspan="2">
							<select  name="prioridad_tm" type="text" id="prioridad_tm" required>
								<option value= ""style="color:#fff;background-color:#fff;">Seleccione una opción</option>
								<option value= "1-Resucitación"style="color:#fff;background-color:#ff0000;">Resucitación </option>
								<option value= "2-Emergencia"style="color:#fff;;background-color: 	#FF8C00;">Emergencia</option>
								<option value= "3-Urgencia"style="color:#000000;background-color:#ffff66;">Urgencia</option>
								<option value= "4-Urgencia Menor"style="color:#000000;background-color:#32CD32;">Urgencia Menor</option>
								<option value= "5-Sin Urgencia"style="color:#000000;background-color:#87CEEB;">Sin Urgencia</option>
							</select>											

						</td>

						<td>

						</td>


					</tr>

										
					<tr>
						<th>
						</th>
						<td></td>
						<td>
							<input type="submit" id="enviar" name="submit" id="enviar" class="btn btn-primary" value="Registrar">
						</td>
						<td></td>	
						<td></td>	
					</tr>
					
				</table>		
			</form>
		</div>	

	

		<br>
	</section>

</section>	


<script src="../contrareferencias/lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../contrareferencias/lib/bootstrap/js/bootstrap.min.js"></script>	

</body>

</html>