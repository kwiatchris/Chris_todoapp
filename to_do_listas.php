<?php
session_start();
//echo $_SESSION['login_user'];
//echo $_SESSION['id_usuario'];
$id_usu_sesion=$_SESSION['id_usuario'];
$id_usuario_sesion=$_SESSION['login_user'];
echo "hello ".$id_usuario_sesion;
try {
	$pdo=new PDO('mysql:host=localhost;dbname=TO_DO_PHP','root','internet80');
		if(!$pdo){
				die('could not connect' . PDO_error());
					}
	$statement=$pdo->query("SELECT * FROM  `listas` WHERE  id_usuario =  '$id_usu_sesion'");
	//$statement_tarea=$pdo->query("SELECT * FROM  `tareas` WHERE  `id_usuario` ='$id_usu_sesion'");
	//echo $_SESSION['id_usuario'];echo "<br>";
	$statement->execute();
	$result= $statement->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOExeption $e){
		echo $e->getMessage();
	}
//print_r($result);echo "<br>";
$id_lista=$result[0]['id_lista'];//pasamos numero de la lista desde la querry $statement
echo "<br>";
foreach ($result as $res){//recoremos el resultado por filas adecuados[''] desde query $statement
        echo'<tr>';
        echo'<td>' ."lista: ". $res['id_lista']."</td>";echo "<br>"; 
        //echo'<td>' ."usuario: ". $res['id_usuario']."</td>";echo "<br>";
            
        echo '<td>'."<a href=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_tareas.php?id_lista=".$res['id_lista']."&nombre=".$res['nombre'].'>'.$res['nombre']."</a>".'</td>';//link con nombre de la lista******************************
       // echo'<td>' . "la lista creada dia ". $res['fecha_creacion'].'</td>';echo "<br>";
        echo'<tr>';
        echo "<br>";echo "<br>";
    }
extract($_POST);
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
?>

<!-- formulario de la lista -->
<form action="" method="post">
NUEVA LISTA: <input type="text" name="lista"><br>
<input name="submit" type="submit" value="ADD LISTA" >
</form>
<?php
//cuando añadimos nueva tarea.....
$nuevatarea=$_POST['tarea'];echo "<br>";
$nuevalista=$_POST['lista'];echo "<br>";

	
	/*$resu_tarea=$statement_tarea->fetchAll(PDO::FETCH_ASSOC);**********************************
	foreach ($resu_tarea as $value) {//recorremos el array q devuelto la query $statement_tarea
	echo "tareas: ".$value['texto'];echo "<br>";
}*/
	

if(isset($_POST['submit'])&&(!empty($nuevalista))){//creamos nueva lista
	$statement_lista_crear=$pdo->query("INSERT INTO `listas`(`id_lista`, `id_usuario`, `nombre`) 
VALUES ('null','$id_usu_sesion','$nuevalista');");//insertamos la lista al BD
if($statement_lista_crear){
		echo "<script language='javascript'>";
		echo "alert('la lista creada corectamente!!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/Chris_todoapp/to_do_listas.php');
		
	}else{
		echo "<script language='javascript'>";
		echo "alert('fallo creando la lista!!!!')";
		echo "</script>";
	}
	/*//$statement_tarea_crear->execute();
	$statement_tarea=$pdo->query("SELECT * FROM  `tareas` WHERE  `id_usuario` ='$id_usu_sesion'");
	$statement_tarea->execute();//query in execucion donde buscamos las tareas del $_SESSION['id_usuario']
$nuevatarea="";
		$resu_tarea=$statement_tarea->fetchAll(PDO::FETCH_ASSOC);
	foreach ($resu_tarea as $value) {//recorremos el array q devuelto la query $statement_tarea
	echo "tareas: ".$value['texto'];echo "<br>";
}
	echo $tarea;
	$nuevalista="";*/
}
?>