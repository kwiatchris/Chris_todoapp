<?php
//PDO + mySQL
try{	$pdo=new PDO('mysql:host=localhost;dbname=apptarea','apptarea','apptarea');
			if(!$pdo){
			die('could not connect' . PDO_error());
	}
//var_dump($_POST);
extract($_POST);
//$value = mysql_real_escape_string($_POST['login']);
$statement=$pdo->query("SELECT * FROM `usuarios` WHERE id_usuario='$id_usuario'");
echo $id_usuario;
echo $nombre;
echo $pass;
	$statement->execute();
	$result=$statement->fetchAll(PDO::FETCH_ASSOC);
	if($result){
			
			//	header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_crearusuario.php');
	
	print_r($result);//$fila=mysql_fetch_array($result);echo $fila['login'];
	echo "<br>";
	//echo $name;
	echo "<br>";
		//echo $login;echo $password;
	//echo json_encode($result);
	//echo json_encode($result[0][login]);
	/*if(empty($id_usuario)||empty($pass)||!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // invalid emailaddres
			
		echo "name: ".$nombre;echo "<br>";
		//echo "login : ".$login;echo "<br>";
		//echo "password : ".$password;echo "<br>";
		echo "<script language='javascript'>";
		echo "alert('falta datos o datos incorectos !!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_crearusuario.php');
			}
	elseif($result[0][id_usuario]===$id_usuario){
		echo "true";
		  echo "<script language='javascript'>";
		echo "alert('usuario ya existe!!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_crearusuario.php');
		
	} else{	
				//$insert_usuario=$pdo->query("INSERT INTO `TO_DO_PHP`.`usuarios` (`id`, `login`, `password`, `nombre`) VALUES (NULL, '$login', '$password','$nombre')");
				//$insert_usuario=$pdo->query("INSERT INTO `usuarios`(`id_usuario`, `pass`, `nombre`, `apellido1`, `apellido2`, `email`) VALUES ('$id_usuario','$pass','$nombre','$apellido1','$apellido2','$email')");
				///$insert_usuario->execute();
					if($insert_usuario){
						echo "<script language='javascript'>";
						echo "alert('el usuario creado corectamente!!!!')";
						echo "</script>";
						header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_login.html');
						}else{
						echo "<script language='javascript'>";
						echo "alert('fallo creando el usuario!!!!')";
						echo "</script>";
								}
			}	

			//}
		
else{
	throw new Exception('unable to connect');
	}*/
}catch(Exception $e){
	echo $e->getMessage();
					}
?>
