

<?php
//PDO + mySQL
try{	$pdo=new PDO('mysql:host=localhost;dbname=TO_DO_PHP','root','internet80');
			if(!$pdo){
			die('could not connect' . PDO_error());
	}
//var_dump($_POST);
extract($_POST);
//$value = mysql_real_escape_string($_POST['login']);
$statement=$pdo->query("SELECT * FROM `usuarios` WHERE login='$login'");
//var_dump($_POST);
//$newlogin=$_POST['login'];
//echo $login;echo "<br>";
//echo $login;
	//$statement->bindParam(':login',$login);
	$statement->execute();
	$result=$statement->fetchAll(PDO::FETCH_ASSOC);
	if($statement){
			
			//	header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_crearusuario.php');
	
	//print_r($result);//$fila=mysql_fetch_array($result);echo $fila['login'];
	echo "<br>";
	//echo $name;
	echo "<br>";
		//echo $login;echo $password;
	//echo json_encode($result);
	//echo json_encode($result[0][login]);
	if(empty($login)||empty($nombre)||empty($password))
			{
		//echo "name: ".$nombre;echo "<br>";
		//echo "login : ".$login;echo "<br>";
		//echo "password : ".$password;echo "<br>";
		echo "<script language='javascript'>";
		echo "alert('falta datos!!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_crearusuario.php');
			}
	elseif($result[0][login]===$login){
		echo "true";
		  echo "<script language='javascript'>";
		echo "alert('usuario ya existe!!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_crearusuario.php');
		
	} else{
				//$insert_usuario=$pdo->query("INSERT INTO `TO_DO_PHP`.`usuarios` (`id`, `login`, `password`, `nombre`) VALUES (NULL, '$login', '$password','$nombre')");
				$insert_usuario=$pdo->query("INSERT INTO `TO_DO_PHP`.`usuarios` (`id_usuario`, `login`, `password`, `nombre`) VALUES ('NULL', '$login', '$password','$nombre')");
				$insert_usuario->execute();
					if($insert_usuario){
		echo "<script language='javascript'>";
		echo "alert('el usuario creado corectamente!!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_login.html');
		}else{
		echo "<script language='javascript'>";
		echo "alert('fallo creando el usuario!!!!')";
		echo "</script>";
			}
				

			}
}else{
	throw new Exception('unable to connect');
	}
}catch(Exception $e){
	echo $e->getMessage();
}
		

?>

