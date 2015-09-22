
<?php
session_start();
//PDO + mySQL
extract($_POST);
$pdo=new PDO('mysql:host=localhost;dbname=TO_DO_PHP','root','internet80');
if(!$pdo){
	die('could not connect' . PDO_error());
}
//var_dump($_POST);
extract($_POST);
//$value = mysql_real_escape_string($_POST['login']);
$statement=$pdo->query("SELECT * FROM `usuarios` WHERE login='$login' and password='$password'");
//var_dump($_POST);
$statement->execute();
$result= $statement->fetchAll(PDO::FETCH_ASSOC);
$fila=mysql_fetch_array($result);
//echo $fila["login"];


print_r($result);
echo $login;
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

	//$statement->bindParam(':login',$login);
	/*$statement->execute();
	$result= $statement->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result);*/

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

