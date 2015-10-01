
<?php
session_start();
//PDO + mySQL
extract($_POST);
$pdo=new PDO('mysql:host=localhost;dbname=apptarea','apptarea','apptarea');
if(!$pdo){
	die('could not connect' . PDO_error());
}

extract($_POST);
try{
$statement=$pdo->query("SELECT * FROM `usuarios` WHERE id_usuario='$login' and pass='$password'");
$statement->execute();
$result= $statement->fetchAll(PDO::FETCH_ASSOC);

$fila=mysql_fetch_array($result);
//echo $fila["login"];
//print_r($result);
//echo $login;

} catch(PDOExeptcion $e){
	echo $e->getMessage();
}
if(!$result==null&&$id_usuario==$result[0]["login"]&&($pass==$result[0]["password"])){
	
	$_SESSION['id_usuario']=$login; 
	//echo $_SESSION['id_usuario'];
	//$_SESSION['id_usuario']=$result[0]["id_usuario"];
	echo "<script language='javascript'>";
		echo "alert('you are in!!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_listas.php');
}else{
	echo "prueba otra vez";
	echo "<script language='javascript'>";
		echo "alert('prueba otra vez!!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_login.html');
}
?>

