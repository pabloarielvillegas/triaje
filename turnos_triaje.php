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
	<title>HBC - Servicio de Emergencia</title>
  <link href="../triaje/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../triaje/interfaz/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
<a href="menu.php"><img src="/triaje/interfaz/images/logo.png"></a>
<div align="right">
          <?php
          echo "| <b>Usuario</b> :". $_SESSION["usuario"];
          ?>&nbsp;|<a href="usuarios_logout.php"> Cerrar  Sesión </a>|
</div>    
 
</header>




<?php

include("../triaje/config/datos_conexion.php");

/// ---------------------Inicio paginación ....................................
    $tamano_paginas=7; /// Muestra el número de registros por página

    if(isset($_GET["pagina"])){ 
    
      if ($_GET["pagina"]==1) {
        header("Location:turnos_triaje.php");
      }else {
        $pagina=$_GET["pagina"] ;

      }
    }else{  
    $pagina=1; // Al cargar iniciar en la pagian 1
    }
    
    $empezar_desde=($pagina-1)*$tamano_paginas;
    $sql_total = "SELECT * FROM turnostriaje WHERE e_turno='Registrado'";
    $resultado=$base->prepare($sql_total);
    $resultado->execute(array());
    $num_filas=$resultado->rowCount(); // Contar el numero de registros
    $total_paginas = ceil($num_filas/$tamano_paginas);
    
//---------------------------------------------------------------------------

  

// Array de objetos 
$registros=$base->query("SELECT * FROM turnostriaje WHERE e_turno='Registrado' ORDER BY idtr DESC LIMIT $empezar_desde, $tamano_paginas")->fetchAll(PDO::FETCH_OBJ);

?>	
  
   



<h2 align="Center">Registros Triaje de Emergencia</h2> 


<div align="center">
    <?php

    //  ------------------------------------Paginación ---------------------------------------
    
    for ($i=1; $i<=$total_paginas ; $i++) { 
    
      echo "<a href='?pagina=".$i."'>" . $i. "</a>  ";
    }

    echo "<br><mark>Total pacientes por atender :".$num_filas."</mark><br>";
    // echo "Se muestran " . $tamano_paginas . " registros por página <br>";
    // echo  "Página " . $pagina . " de " . $total_paginas . "<br>";   

    //  ------------------------------------ Fin Paginación ------------------------------------
  ?>  
  </div>


<div class="container">
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="table-responsive">
  
  	<table class="table table-bordered table-condensed">
    <tr class="danger">
      <th colspan="2">
        <a href="turnos_triaje_insertar.php"><input type='button' name='del' id='del' value='Insertar Nuevo' class="btn btn-primary"></a></td>
      </th>
      <th>Triaje Manchester</th>
      <th></th>
      <th>Turno</th>
      <th>Form-08</th>
      <th>Fecha - Hora</th>
      <th>Sexo</th>
      <th>Apellidos</th>
      <th>Nombres</th>
      <th></th>
      <th>Edad</th>
      <th></th>
      <th>CC/Código</th>
      <th></th>
      <th>P. Arterial</th>
      <th></th>
      <th>F. Cardiaca</th>
      <th></th>
      <th>F. Respiratoria</th>
      <th></th>
      <th>Temperatura</th>
      <th></th>
      <th>Saturación O2</th>
      <th></th>
      <th>Glasgow</th>
  		<th></th>
      <th>Peso</th>
      <th></th>
      <th>E. Crónicas</th>
      <th></th>
      <th>T Evolución</th>
      <th></th>
      <th>Vía Aerea</th>
      <th></th>
      <th>Ventilación</th>
      <th></th>
      <th>Cardiovascular</th>
      <th></th>
      <th>Neurológico</th>
      <th></th>
      <th>U. Registro</th>
      <th></th>
      <th>Estado Turno</th>
      </tr> 

 
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
       <td><a href="turnos_triaje_delete.php?idtr=<?php echo $fila->idtr?>"><input type='button' name='del' id='del' value='Borrar' class="btn btn-default active"></a></td>

      <td><a href="turnos_triaje_modificar.php?idtr=<?php echo $fila->idtr?>"><input type='button' name='up' id='up' value='Editar' class="btn btn-default active"></a></td>

      <td bgcolor="<?php echo $color;//establece el color en la celda?>"><b><?php echo $fila->prioridad_tm;?></b><td>
      <td><?php echo $fila->idtr?></td>
      <td><?php echo $fila->f08?></td>
	   	<td><?php echo $fila->fecha_ia." ".$fila->hora_ia?></td>
      <td><?php echo $fila->sexo?></td>
      <td><?php echo $fila->apellidos?></td>
      <td><?php echo $fila->nombres?><td>
      <td><?php echo $fila->edad." ".$fila->edadma?><td>
      <td><?php echo $fila->cc?><td>
      <td><?php echo $fila->sv_pa?><td>
      <td><?php echo $fila->sv_fc?><td>
      <td><?php echo $fila->sv_fr?><td>
      <td><?php echo $fila->sv_te?><td>
      <td><?php echo $fila->sv_so?><td>
      <td><?php echo $fila->sv_gl?><td>
      <td><?php echo $fila->peso?><td>
      <td><?php echo $fila->enfer_croni?><td>
      <td><?php echo $fila->tiempo_evol?><td>
      <td><?php echo $fila->se_vae?><td>
      <td><?php echo $fila->se_ven?><td>
      <td><?php echo $fila->se_car?><td>
      <td><?php echo $fila->se_neu?><td>
      <td><?php echo $fila->usuario_registro?><td>
      <td><?php echo $fila->e_turno?><td>
     
    </tr> 
	<?php
	 endforeach;
	?>


	</div>
  </table>

  </form>

</div>
  <div align="center">
   
  </div>

<script src="../triaje/lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../triaje/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>