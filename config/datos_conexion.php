
<?php
try{
		
	$base=new PDO("mysql:host=localhost; dbname=triaje" , "root", "3201442");
	
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$base->exec("SET CHARACTER SET UTF8");
	//echo "Conexion ok";
	
	
}catch(Exception $e){
	
	die("Error: " . $e->getMessage());
	
	
}



?>