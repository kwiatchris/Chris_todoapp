<html>
<head>
<title>forms</title>
</head>
<body>
	<h1>Chris y Ierai to_do tarea</h1>
<form action="to_do_create.php" method="post">
id_usuario: <input type="text" name="id_usuario"><br>
nombre: <input type="text" name="nombre"><br>
password: <input type="text" name="pass"><br>

apellido: <input type="text" name="apellido1"><br>
apellido2: <input type="text" name="apellido2"><br>
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