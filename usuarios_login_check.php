<?php

try{
	
	$usuario=htmlentities(addslashes($_POST["usuario"]));
	
	$password=htmlentities(addslashes($_POST["password"]));
	$contador=0;

	
	
	$base=new PDO("mysql:host=localhost; dbname=triaje" , "root", "");
	
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$sql="SELECT * FROM usuarios WHERE usuario= :usuario AND acceso=1 ";
	
	$resultado=$base->prepare($sql);	
		
	$resultado->execute(array(":usuario"=>$usuario));
		
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){			
			
			if(password_verify($password,$registro['password'])){
			$contador++;				

			}
		}

		if  ($contador>0) {
			
			session_start();
				$_SESSION ["usuario"]=$_POST["usuario"];

			header("Location:menu.php");

		}else{
			
			header("Location:index.php");		
		}
								
				
		$resultado->closeCursor();

		
}catch(Exception $e){
	
	die("Error: " . $e->getMessage());
	
	
	
}



?>
