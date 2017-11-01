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
  $id = $_REQUEST['id'];



// Array de objetos donde la Idtr sea igual a la recibida por url
$registros=$base->query("SELECT * FROM usuarios WHERE id='$id' ")->fetchAll(PDO::FETCH_OBJ);

?>  


<div class="container">
  
  <h2 align="Center">Activar o Desactivar Usuarios</h2>


<form class="form-horizontal" action="usuarios_modificar_procesar.php?id=<?php echo $fila->id; ?>" method="POST">
<div class="table-responsive">
  <table border="0">
    <tr class="danger">
    
  <?php
    foreach($registros as $fila):
      
     ?> 
             
      <tr>
      
       <td><input type="text" name="id" id="id"  value="<?php echo $fila->id?>" hidden></td>
       </tr>

      
      <tr>
      <th>Usuario</th>
      <td></td>
      <td><label for="usuario"></label>
      <input type="text" name="usuario" id="usuario"  value="<?php echo $fila->usuario?>" disabled>
      </td>
     
      </tr>
     
      <th>Apellidos y Nombres</th>
      <td></td>
      <td "><label for="nombres"></label>
      <input type="text" name="nombres" id="nombres" size="50px" value="<?php echo $fila->nombres?>" disabled  ></td>  
       <tr>
         
       </tr> 
     
     <tr>
        <th>
                  <label for="acceso">Permitir Acceso</label>
                </th>
                <td></td>

                <td>
                  <select  name="acceso" type="text" id="acceso" required="required">
                    <option  value="">Seleccione</option>
                    <option  value="1">Si</option>
                    <option  value="0">No</option>
                                        
                  </select>

                </td>
    
              
    </tr>

 
     <tr>
      <th></th>
   
     <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Registrar" class="btn btn-primary btn-lg btn-succes"></td>
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
  
  <script src="../triaje/lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../triaje/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


