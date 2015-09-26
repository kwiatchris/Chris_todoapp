
<?php
session_start();
//PDO + mySQL
extract($_POST);
$pdo=new PDO('mysql:host=localhost;dbname=TO_DO_PHP','root','internet80');
if(!$pdo){
	die('could not connect' . PDO_error());
}

extract($_POST);
try{
$statement=$pdo->query("SELECT * FROM `usuarios` WHERE login='$login' and password='$password'");
$statement->execute();
$result= $statement->fetchAll(PDO::FETCH_ASSOC);
$fila=mysql_fetch_array($result);
//echo $fila["login"];
//print_r($result);
//echo $login;

} catch(PDOExeptcion $e){
	echo $e->getMessage();
}
if(!$result==null&&$login==$result[0]["login"]&&($password==$result[0]["password"])){
	
	$_SESSION['login_user']=$login; 
	$_SESSION['id_usuario']=$result[0]["id_usuario"];
	echo "<script language='javascript'>";
		echo "alert('you are in!!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_listas.php');
}else{
	echo "prueba otra vez";
	echo "<script language='javascript'>";
		echo "alert('prueba otra vez!!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_login.html');
}
?>

