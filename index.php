<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login de Usuarios</title>
	<link href="../triaje/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../triaje/interfaz/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<header>
				 <img src="/triaje/interfaz/images/logo.png">
				
		</div>		
	</header>

	<div align="center">
				<h1>HBC - Triaje Servicio de Emergencia</h1>

				<img src="../triaje/interfaz/images/index.jpeg">
	</div>

	
	<div align="center">
		<form class="form-horizontal"  action="usuarios_login_check.php" method="post">

				<div class="container">
				<!-- Form Name -->
					<legend>Ingreso de  Usuarios</legend>
				
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="usuario">Usuario</label>  
				  <div class="col-md-4">
				  <input id="usuario" name="usuario" placeholder="Ingrese el nombre de usuario" class="form-control input-md" required="" type="text">
				    
				  </div>
				</div>

				<!-- Password input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="password">Password</label>
				  <div class="col-md-4">
				    <input id="password" name="password" placeholder="Ingrese el password" class="form-control input-md" required="" type="password">
				    
				  </div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="enciar"></label>
				  <div class="col-md-4">
				    <input type="submit" id="enviar" name="enviar" class="btn btn-primary" value="Ingresar">
				  </div>
				</div>


				</form>
				</div>
	</div>
<script src="../triaje/lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../triaje/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>