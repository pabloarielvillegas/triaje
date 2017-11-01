

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php

	$id= $_POST["id"];
	$usuario= $_POST["usuario"];
	$password= $_POST["password"];
	$nombres= $_POST["nombres"];
	$password_cifrado =  password_hash($password, PASSWORD_DEFAULT);
	
				
	try{

		$base=new PDO('mysql:host=localhost; dbname=triaje', 'root', '3201442');
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$base->exec("SET CHARACTER SET utf8");		
		
		
		$sql="INSERT INTO usuarios (id,usuario,nombres,password) VALUES (:id, :usu, :nombres, :pass)";
		
		
		$resultado=$base->prepare($sql);		
		
		
		$resultado->execute(array(":id"=>$id,":usu"=>$usuario,":nombres"=>$nombres, ":pass"=>$password_cifrado));		
		
		
		/*echo "Usuario Creado <br>";
		echo "Número de Identificación: ". $id ."<br>";
		echo "Usuario: ".$usuario ."<br>";
		echo "Nombre: ".$usuario ."<br>";
		echo "<a href='/triaje/usuarios_crear.php'>Volver </a>";*/

		$resultado->closeCursor();

		 header("location:usuarios_crear.php");

	}catch(Exception $e){			
		
		
		echo "El usuario no fue registrado, línea del error: " . $e->getLine();
		
	}finally{
		
		$base=null;
		
		
	}

?>

	
</body>
</html>