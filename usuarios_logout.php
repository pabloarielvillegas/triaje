<!DOCTYPE html>
<html lang="s">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
		<?php 
		session_start();
		session_destroy();
		header("Location:index.php");

		?>
</body>
</html>