<?php
session_start();
//include('to_do.php');
//echo $_SESSION['login_user'];
//echo $_SESSION['id_usuario'];
$id_usu_sesion=$_SESSION['id_usuario'];
//echo $id_usu_sesion;
$pdo=new PDO('mysql:host=localhost;dbname=TO_DO_PHP','root','internet80');
if(!$pdo){
	die('could not connect' . PDO_error());
}
$statement=$pdo->query("SELECT * FROM  `listas` WHERE  id_usuario =  '$id_usu_sesion'");
$statement_tarea=$pdo->query("SELECT * FROM  `tareas` WHERE  `id_usuario` ='$id_usu_sesion'");
//"INSERT INTO `TEST`.`usuarios` (`id`, `login`, `password`, `nombre`) VALUES (NULL, '$login', '$name', '$password')");
//echo $_SESSION['id_usuario'];echo "<br>";
//var_dump($_POST);
$statement->execute();
$result= $statement->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
//echo "<br>";
$id_lista=$result[0]['id_lista'];//pasamos numero de la lista desde la querry $statement
//echo "numero de la lista: " .$id_lista;
echo "<br>";
foreach ($result as $res){//recoremos el resultado por filas adecuados[''] desde query $statement
        echo'<tr>';
        echo'<td>' ."lista: ". $res['id_lista']."</td>";echo "<br>"; 
        echo'<td>' ."usuario: ". $res['id_usuario']."</td>";echo "<br>";
        echo'<td>' ."nombre de la lista : ". $res['nombre'].'</td>';echo "<br>";
        echo'<td>' . "la lista creada dia ". $res['fecha_creacion'].'</td>';echo "<br>";
        echo'<tr>';
    }
$statement_tarea->execute();//query in execucion donde buscamos las tareas del $_SESSION['id_usuario']
$resu_tarea=$statement_tarea->fetchAll(PDO::FETCH_ASSOC);
//print_r($resu_tarea);
foreach ($resu_tarea as $value) {//recorremos el array q devuelto la query $statement_tarea
	echo "tareas: ".$value['texto'];echo "<br>";
}
//extract($_POST);
//esto poner en to_do_crear _tarea con $POST
/*if(!isset($tarea)){
			echo "<script language='javascript'>";
		echo "alert('falta datos!!!!')";
		echo "</script>";
}
elseif(!empty($tarea)){
$statement_tarea_crear=$pdo->query("INSERT INTO  `tareas` (`id_tarea` ,`id_lista` ,`id_usuario` ,`texto`)
VALUES ('null',  '$id_lista',  '$id_usu_sesion',  '$texto');");
}*/
/*if (isset($_POST['Submit1'])) {
$username = $_POST['username'];
if ($username == "letmein") {
print ("Welcome back, friend!");
}
else {
print ("You're not a member of this site");
}
}*/
?>
<form action="" method="post">
tarea: <input type="text" name="tarea"><br>
<input name="submit" type="submit" value="ADD TAREA" >
</form>
<?php
//cuando añadimos nueva tarea.....
$nuevatarea=$_POST['tarea'];echo "<br>";
if(isset($_POST['submit'])&&(!empty($nuevatarea))){
	
	//echo $nuevatarea;echo "<br>";
	$statement_tarea_crear=$pdo->query("INSERT INTO  `tareas` (`id_tarea` ,`id_lista` ,`id_usuario` ,`texto`)
VALUES ('null',  '$id_lista',  '$id_usu_sesion',  '$nuevatarea');");//insertamos la tarea al BD
	//$statement_tarea_crear->execute();
	$statement_tarea=$pdo->query("SELECT * FROM  `tareas` WHERE  `id_usuario` ='$id_usu_sesion'");
	$statement_tarea->execute();//query in execucion donde buscamos las tareas del $_SESSION['id_usuario']
$nuevatarea="";
		$resu_tarea=$statement_tarea->fetchAll(PDO::FETCH_ASSOC);
	foreach ($resu_tarea as $value) {//recorremos el array q devuelto la query $statement_tarea
	echo "tareas: ".$value['texto'];echo "<br>";
}
	echo $tarea;
}

?>