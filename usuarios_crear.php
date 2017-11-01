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

	   <style>
		
		table{
			width:400px;
			margin:auto;
			background-color:#FFC;
			border:2px solid #F00;
			padding:5px;
			
		}
		
		td{
			text-align:center;
			
		}
		h1{text-align:center}
		
		</style>
</head>
<body>
	
		<header>
				<a href="/triaje/menu.php"> <img src="../triaje/interfaz/images/logo.png"> </a>

				
	
		<div align="right">
				<?php
          echo "| <b>Usuario</b> :". $_SESSION["usuario"];
          ?>&nbsp;|<a href="usuarios_logout.php"> Cerrar  Sesión </a>|

		</div>		
		</header>		
		
	
		<form action="usuarios_crear_procesar.php" method="post">
        <table>
        <tr>
          <td>Identificacion</td>
          <td><input type="text" name="id" id="id" maxlength="10" placeholder="Ingrese el # de cedula" required=""></td>
          </tr>
        <tr>
          <td>Usuario</td>
          <td><input type="text" name="usuario" id="usuario" maxlength="20"></td>
          </tr>
        <tr>
          <td>Nombres</td>
          <td><input type="text" name="nombres" id="nombres" maxlength="100"></td>
          </tr>  

        <tr>
          <td> Contraseña </td>
          <td><input type="password" name="password" id="password"></td>
        </tr>
           
           <tr><td colspan="2"> <input type="submit" name="enviando" value="Crear Usuario">
        </td></tr></table>
        </form>

		

		<?php

include("../triaje/config/datos_conexion.php");

// Array de objetos 
$registros=$base->query("SELECT * FROM usuarios ")->fetchAll(PDO::FETCH_OBJ);

?>	

<div class="container">
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="table-responsive">
	<table class="table table-bordered table-condensed">
    <tr class="danger">
      <th>Id.  de Usuario</th>
      <th>Usuario</th>
      <th>Apeliidos y Nombres </th>
      <th>Acceso</th>
      </tr> 

 
  <?php
		foreach($registros as $fila):
      
 ?> 
     
   	<tr>
          
      <td><?php echo $fila->id?></td>
	  <td><?php echo $fila->usuario?></td>
	  <td><?php echo $fila->nombres?></td>
	  <td><?php echo $fila->acceso?></td>
	  <td><a href="usuarios_modificar.php?id=<?php echo $fila->id?>"><input type='button' name='up' id='up' value='Activar | Desactivar' class="btn btn-default active"></a></td>
           
    </tr> 
	<?php
	 endforeach;
	?>


	</div>
  </table>

  </form>

</div>	
	
</body>
</html>