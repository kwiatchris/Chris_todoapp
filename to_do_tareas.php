<?php
session_start();
//echo $_SESSION['login_user'];
//echo $_SESSION['id_usuario'];
$id_usu_sesion=$_SESSION['id_usuario'];
$id_usuario_sesion=$_SESSION['login_user'];
echo "hello ".$id_usuario_sesion;echo "<br>";
//echo $_GET['id_lista'];
$id_lista_elegida=$_GET['id_lista'];
$nombre_lista_elegida=$_GET['nombre'];
echo "lista: ". $nombre_lista_elegida;echo "<br>";
//echo $id_lista_elegida;
try {
	$pdo=new PDO('mysql:host=localhost;dbname=TO_DO_PHP','root','internet80');
		if(!$pdo){
				die('could not connect' . PDO_error());
				}
$statement_tarea=$pdo->query("SELECT * FROM  `tareas` WHERE  `id_lista` ='$id_lista_elegida'");
$statement_tarea->execute();
	$result= $statement_tarea->fetchAll(PDO::FETCH_ASSOC);
	//print_r($result);
}catch(PDOExeption $e){
		echo $e->getMessage();
	}
echo "<br>";
if($result){
foreach ($result as $res){//recoremos el resultado por filas adecuados[''] desde query $statement
        echo'<tr>';
        echo'<td>' ."tarea: ". $res['texto']."</td>";echo "<br>"; 
        //echo'<td>' ."usuario: ". $res['id_usuario']."</td>";echo "<br>";
        // echo'<td>' . "la lista creada dia ". $res['fecha_creacion'].'</td>';echo "<br>";
        echo'<tr>';
        echo "<br>";echo "<br>";
    }}
    else {echo "falta tareas";}

?>
<!-- formulario de la tarea *****************************************************************-->
<form action="" method="post">
tarea: <input type="text" name="tarea"><br>
<input name="submit" type="submit" value="ADD TAREA" >
</form>
<?php
$nuevatarea=$_POST['tarea'];echo "<br>";
//*****************************************************crear tarea********************
if(isset($_POST['submit'])&&(!empty($nuevatarea))){//creamos nueva tarea
	
	//echo $nuevatarea;echo "<br>";
	$statement_tarea_crear=$pdo->query("INSERT INTO  `tareas` (`id_tarea` ,`id_lista` ,`id_usuario` ,`texto`)
VALUES ('null',  '$id_lista_elegida',  '$id_usu_sesion',  '$nuevatarea');");//insertamos la tarea al BD
	//comprobamos si el INSERT se ejecuto correctamente
	if($statement_tarea_crear){
		echo "<script language='javascript'>";
		echo "alert('la tarea creada corectamente!!!!')";
		echo "</script>";
		header("Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_tareas.php?id_lista=".$id_lista_elegida);
		//header("Location: index.php?id=".$_POST['ac_id']."&err=".$login);
	}else{
		echo "<script language='javascript'>";
		echo "alert('fallo creando la tarea!!!!')";
		echo "</script>";
	}
}
?>