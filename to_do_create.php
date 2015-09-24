

<?php
//PDO + mySQL

$pdo=new PDO('mysql:host=localhost;dbname=TO_DO_PHP','root','internet80');
if(!$pdo){
	die('could not connect' . PDO_error());
}
//var_dump($_POST);
extract($_POST);
//$value = mysql_real_escape_string($_POST['login']);
$statement=$pdo->query("SELECT * FROM `usuarios` WHERE login='$login'");
//var_dump($_POST);
//$newlogin=$_POST['login'];
echo $login;echo "<br>";
//echo $login;


	//$statement->bindParam(':login',$login);
	$statement->execute();
	$result=$statement->fetchAll(PDO::FETCH_ASSOC);
	print_r($result);
	//$fila=mysql_fetch_array($result);
	echo $fila['login'];
	echo "<br>";
	//echo $name;
	echo "<br>";
		//echo $login;
		//echo $password;
	//echo json_encode($result);
	//echo json_encode($result[0][login]);
	if(empty($login)||empty($nombre)||empty($password))
			{echo "false";
		echo "name: ".$nombre;echo "<br>";
		echo "login : ".$login;echo "<br>";
		echo "password : ".$password;echo "<br>";
				echo "falta datos";
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
		
	} else
			{
				//$insert_usuario=$pdo->query("INSERT INTO `TO_DO_PHP`.`usuarios` (`id`, `login`, `password`, `nombre`) VALUES (NULL, '$login', '$password','$nombre')");
				$insert_usuario=$pdo->query("INSERT INTO `TO_DO_PHP`.`usuarios` (`id_usuario`, `login`, `password`, `nombre`) VALUES ('NULL', '$login', '$password','$nombre')");
				$insert_usuario->execute();
				echo "<script language='javascript'>";
		echo "alert('usuario creado !!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_login.html');
			}
			
		//$fila=mysqli_fetch_array($result);
		//echo $fila['login'];
	
	//header("Location:to_do_create.html");
	
	/*for(i=0;i<100;i++){
		if(($result[i][login])==$login){
			echo ("existe");
		}else echo ("no existe");

	}
*/
/*echo $userid;
//$stmt = $pdo->prepare('SELECT * FROM users WHERE userid = :userid');
// $userid = filter_input(INPUT_GET, 'userid', FILTER_SANITIZE_NUMBER_INT); // <-- filter your data first (see [Data Filtering](#data_filtering)), especially important for INSERT, UPDATE, etc.
$userid = filter_input(INPUT_GET, "userid", FILTER_VALIDATE_INT);
// var_dump($userid);
echo $userid;
if ($userid === false) {
echo "Error";
} else {
$stmt->bindParam(':userid', $userid, PDO::PARAM_INT); // <-- Automatically sanitized for SQL by PDO
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);

}
//document.write("<br>");
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
*/
?>

