

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>HBC - Turnos Emergencia</title>
 <style type="text/css">
     

  .tabla1{
      width:100%;
      margin:auto;
      background-color:#ffff99;
      border:1px solid  #000080;
      padding:0px;
      font-size: 26px;

      
    }

    .tabla2{
      width:100%;
      margin:auto;
      background-color: #D3D3D3;
      border:1px solid    #000080;
      padding:0px;
      font-size: 16px bold;
      
    }
    
    td{
      text-align:left;

      
    }
    h2{
      text-align:center;
     
     

 
    }
    h3{
      text-align:center;
      font:   #191970;
 
    }

     th{
      background-color:     #00008B;
      text-align:center;
      color: #FFF;
    }
  </style>

  <script type="text/javascript">
    setTimeout("document.location=document.location",30000);
  </script>


</head>
<body bgcolor="#fff">

<?php
include("config/datos_conexion.php");
/// ---------------------Inicio paginación ....................................
    $tamano_paginas=10; /// Muestra el número de registros por página

    if(isset($_GET["pagina"])){ 
    
      if ($_GET["pagina"]==1) {
        header("Location:turnos_triaje_tv.php");
      }else {
        $pagina=$_GET["pagina"] ;

      }
    }else{  
    $pagina=1;
    }
    
    $empezar_desde=($pagina-1)*$tamano_paginas;
    $sql_total = "SELECT idtr,apellidos,nombres FROM turnostriaje WHERE e_turno='Registrado' ";
    $resultado=$base->prepare($sql_total);
    $resultado->execute(array());
    $num_filas=$resultado->rowCount(); // Contar el numero de registros
    $total_paginas = ceil($num_filas/$tamano_paginas);
    
//---------------------------------------------------------------------------


    


//---------------------------------------------------------------------

// Recuperando registros de la bd


$registros=$base->query("SELECT * FROM turnostriaje WHERE e_turno='Llamando' ORDER BY idtr ASC LIMIT $empezar_desde, $tamano_paginas")->fetchAll(PDO::FETCH_OBJ);


?>	
<header>
 
</header>

<h3> Turnos en Emergencia</h3>

<div align="center">
 <h3> <?php echo "Fecha : ". date("d"."/"."m"."/"."Y")." Hora: ". date("H".":"."i"); ?> </h3>
</div>

	<table class="tabla1" width="95%" border="1" align="center">
    <tr>
      <th>Paciente</th>
      <th>Consultorio Asignado</th>
      </tr> 
  

	<?php
		foreach($registros as $fila):?> 
	
   	<tr>
      <td><?php echo $fila->apellidos . " ". $fila->nombres?></td>
     <td><?php echo $fila->consultorio?></td>
    </tr> 
	<?php
	endforeach;
	?>

  </table>


<!-- ----------------------------------- Pacientes en espera ----------------------------------------------- -->


<?php 
$registrosp=$base->query("SELECT * FROM turnostriaje WHERE e_turno='Registrado' ORDER BY idtr ASC LIMIT $empezar_desde, $tamano_paginas")->fetchAll(PDO::FETCH_OBJ);


?>  

 <div align="center">
    <?php

    //  ------------------------------------Paginación ---------------------------------------
    
    for ($i=1; $i<=$total_paginas ; $i++) { 
    
     // echo "<a href='?pagina=".$i."'>" . $i. "</a>  ";
    }

    echo "<b>Pacientes en espera : ".$num_filas."</b>";
    // echo "Se muestran " . $tamano_paginas . " registros por página <br>";
   
  ?>  
  </div>

<!-- Si se descomenta muestra una tabla con pacientes en espera

  <table class="tabla2"  width="100%" border="1" align="center">
   

  <?php
    foreach($registrosp as $fila):?> 
  
    <tr>
      <td><?php echo $fila->apellidos . " ". $fila->nombres?></td>
     <td>Espere por favor</td>
    
    </tr> 
  <?php
  endforeach;
  ?>

  </table>
-->

 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer>
<div align="left">
<audio  controls="controls" autoplay >
<source src="./interfaz/alerta2.mp3" type="audio/mp3"/> 
</audio>
</footer> 
</div> 

</body>
</html>