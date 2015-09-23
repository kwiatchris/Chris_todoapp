<html>
<head>
<title>forms</title>
</head>
<body>
	<h1>Chris y Ierai to_do tarea</h1>
<form action="to_do.php" method="post">
login: <input type="text" name="login"><br>
nombre: <input type="text" name="nombre"><br>
password: <input type="text" name="password"><br>

apellido: <input type="text" name="apellido"><br>
email: <input type="text" name="email"><br>

<form action="to_do_create.php">
	<input type="submit" value="crear usuario">
	<?php
	$pdo=new PDO('mysql:host=localhost;dbname=TO_DO_PHP','root','internet80');
if(!$pdo){
	die('could not connect' . PDO_error());
}
//$statement=$pdo->query('INSERT INTO `TO_DO_PHP`.`usuarios` (`id_usuario`, `login`) VALUES ('3', 'jorge');'); 
	?>
</form>
</body>
</html>