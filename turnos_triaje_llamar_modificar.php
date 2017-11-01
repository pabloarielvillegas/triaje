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
  <title>HBC - Servicio de Emergencia</title>
  <link href="../triaje/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../triaje/interfaz/css/style.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    body {

background-color:#fff; 
 
}
  </style>
</head>
<body>
<header>
         <div align="right">
          <?php
          echo "|<b>Usuario</b>:". $_SESSION["usuario"];
          ?>&nbsp;|<a href="usuarios_logout.php"> Cerrar  Sesión |</a>

        </div>    

  </header>

<?php

include("../triaje/config/datos_conexion.php");
  // Creamos variable para recibir el numero de Idtr para consulta
  $idtr = $_REQUEST['idtr'];



// Array de objetos donde la Idtr sea igual a la recibida por url
$registros=$base->query("SELECT * FROM turnostriaje WHERE idtr='$idtr' ")->fetchAll(PDO::FETCH_OBJ);

?>  

<div align="center">
  <img src="interfaz/images/llamar.jpeg" alt="llamar" width="200" >

</div>


<div class="container">
  


<form class="form-horizontal" action="turnos_triaje_llamar_modificar_procesar.php?idtr=<?php echo $fila->idtr; ?>" method="POST">
<div class="table-responsive">
  <table border="0">
    <tr class="danger">
    
  <?php
    foreach($registros as $fila):
      $fprioridad=$fila->prioridad_tm;//toma el valor de la tabla
              //da el color dependiendo del valor
    
          if($fprioridad=="1-Resucitación")
          {
            $color='#ff0000';

          }

          if($fprioridad=="2-Emergencia")
          {
            $color='#FF8C00';
            }

            if($fprioridad=="3-Urgencia")
          {
            $color='#ffff33';
            } 
              
          if($fprioridad=="4-Urgencia Menor")
          {
            $color='#32CD32';            
          }
          
          if($fprioridad=="5-Sin Urgencia")
          {
            $color='#87CEEB';
      
          }
          //fin da el color

     ?> 
             
      <tr>
      <th>Form-08</th>
      <td><label for="f08"></label>
      <input type="text" name="f08" id="f08"  value="<?php echo $fila->f08?>" disabled></td>

      <th>Prioridad Triaje Manchester--> </th>
      <td bgcolor="<?php echo $color;//establece el color en la celda?>"><?php echo $fila->prioridad_tm;?><td>
      <td><input type="text" name="idtr" id="idtr"  value="<?php echo $fila->idtr?>" hidden></td>
      <!--
      <th>Fecha-Hora</th>
      <td><label for="fecha_ia"></label>
      <input type="text" name="fecha_ia" id="fecha_ia"  value="<?php echo $fila->fecha_ia?>"></td>
      -->
      <td></td>
      <td></td>
      </tr>

      
      
      <tr>
      <th>Apellidos</th>
      <td><label for="apellidos"></label>
      <input type="text" name="apellidos" id="apellidos"  value="<?php echo $fila->apellidos?>" disabled>
      </td>
      <th>Nombres</th>
      <td><label for="nombres"></label>
      <input type="text" name="nombres" id="nombres"  value="<?php echo $fila->nombres?>" disabled></td>
       <th>CC</th>
      <td><label for="cc"></label>
      <input type="text" name="cc" id="cc"  value="<?php echo $fila->cc?>" disabled></td>

      </tr>
        
      <tr>
      
      <th>Sexo</th>
      <td><label for="sexo"></label>
      <input type="text" name="sexo" id="sexo" value="<?php echo $fila->sexo?>" disabled></td>
      <th>Edad</th>
      <td><label for="edad"></label>
      <input type="text" name="edad" id="edad" value="<?php echo $fila->edad." ".$fila->edadma?>" disabled></td>
      <th>Afiliado</th>
      <td><label for="afiliado"></label>
      <input type="text" name="afiliado" id="afiliado"  value="<?php echo $fila->afiliado?>" disabled></td>
      
      </tr>
      <tr><td colspan="6"><h3>Signos Vitales</h3></td></tr>

      <tr>
      <th>P. Arterial</th>
      <td><label for="sv_pa"></label>
      <input type="text" name="sv_pa" id="sv_pa"  value="<?php echo $fila->sv_pa?>" disabled></td>

       <th>F. Cardiaca</th>
      <td><label for="sv_pa"></label>
      <input type="text" name="sv_fc" id="sv_fc"  value="<?php echo $fila->sv_fc?>" disabled></td>
       
       <th>F Respiratoria</th>
      <td><label for="sv_pa"></label>
      <input type="text" name="sv_fr" id="sv_fr"  value="<?php echo $fila->sv_fr?>" disabled></td>  
      </tr>
      
      <tr>
      <th>Temperatura</th>
      <td><label for="sv_te"></label>
      <input type="text" name="sv_te" id="sv_te"  value="<?php echo $fila->sv_te?>" disabled></td>
      
      <th>Saturación O2</th>
      <td><label for="sv_so"></label>
      <input type="text" name="sv_so" id="sv_so"  value="<?php echo $fila->sv_so?>" disabled></td>
      
      <th>Glasgow</th>
      <td><label for="sv_gl"></label>
      <input type="text" name="sv_gl" id="sv_gl"  value="<?php echo $fila->sv_gl?>" disabled></td>
      </tr> 

             
      <tr>
      
      <th>Peso</th>
      <td><label for="peso"></label>
      <input type="text" name="peso" id="peso"  value="<?php echo $fila->peso?>" disabled></td>
      
      <th>Motivo de Consulta</th>
      <td><label for="motivo"></label>
      <textarea type="text" name="motivo" id="motivo"  maxlength="200" disabled ><?php echo $fila->motivo?></textarea>

      </td>
      </tr>
      
      <tr>
      <th>E. Crónicas</th>
      <td><label for="enfer_croni"></label>
      <input type="text" name="enfer_croni" id="enfer_croni"  value="<?php echo $fila->enfer_croni?>" disabled></td>
      <th>T Evolución</th>
      <td><label for="tiempo_evol"></label>
      <input type="text" name="tiempo_evol" id="tiempo_evol"  value="<?php echo $fila->tiempo_evol?>" disabled></td>
      <td></td>
      <td></td>
      </tr> 


      <!-- Comenta signos de emergencia

      <tr><td><h3>Signos de Emergencia</h3></td></tr>
            <tr>
      <td></td>
      <th>Vía Aérea</th>
      <td><label for="se_vae"></label>
        <input type="text"  name="se_vae" id="se_vae" value="<?php echo $fila->se_vae?>" disabled></td>
       <td></td>
      <td></td>
      <td></td> 
      </tr>

      <tr>
      <td></td>
      <th>Ventilación</th>
      <td ><label for="se_ven"></label>
        <input type="text"  name="se_ven" id="se_ven" value="<?php echo $fila->se_ven?>" disabled></td>
        <td></td>
      <td></td>
      <td></td>
      </tr>
      
      <tr>
      <td></td>
      <th>Cardiovascular</th>
      <td><label for="se_car"></label>
      <input type="text"  name="se_car" id="se_car" value="<?php echo $fila->se_car?>" disabled></td>
      <td></td>
      <td></td>
      <td></td>
      </tr> 
                  
      <tr>
      <td></td>
      <th>Neurológico</th>
      <td><label for="se_neu"></label>
      <input type="text"  name="se_neu" id="se_neu" value="<?php echo $fila->se_neu?>" disabled></td>
      <td></td>
      <td></td>
      <td></td>
      </tr>
      -->

      <tr><td colspan="6"><h3>Hora de Llamadas</h3></td></tr>

      <tr>
        
         <th>
           <label for="hora_llamada">1ra. Llamada</label>
                </th>
        <td>
        <input type="time" name="hora_llamada" value="<?php echo $fila->hora_llamada;?>" hidden />
      
        <input type="time" name="hora_llamada_bloqueda" value="<?php echo $fila->hora_llamada;?>" disabled />
        </td>


        <th>
           <label for="hora_llamada2">2da. Llamada</label>
                </th>
        <td>
        <input type="time" name="hora_llamada2" placeholder="00:00" maxlength="5"/>
        </td>  

        <th>
           <label for="hora_llamada3">3ra. Llamada</label>
                </th>
        <td>
        <input type="time" name="hora_llamada3"  placeholder="00:00" maxlength="5"/>
        </td>                       

        </tr>

        <tr>

        <th> </th>
        <td></td>

        <th>
            <label for="e_turno">Estado</label>
         </th>
                <td>
                  <select  name="e_turno" type="text" id="e_turno" required="required">
                    <option  value="Llamando">Llamando</option>
                  </select>
                </td>

         <th>
            <label for="consultorio">Acudir a Consultorio</label>
         </th>
                <td>
                  <select  name="consultorio" type="text" id="consultorio" required="required">
                    <option  value="Adultos">Adultos</option>
                    <option  value="Pedriatria">Pedriatria</option>
                    <option  value="Obstetricia">Obstetricia</option>
                  </select>
                </td>        
             
      </tr>     
      
    <tr>
    <th></th>
    <td></td>

      <th></th>
     <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Enviar aviso a Sala de Espera" class="btn btn-primary btn-lg btn-succes"></td>
      <td></td>
      <td></td>
      <td></td>
    </tr> 
  <?php
   endforeach;
  ?>


  </div>
  </table>

  </form>


</div>
  
  <script src="../consultaexterna/lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../consultaexterna/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


