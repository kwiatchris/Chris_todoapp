<?php
session_start();
if(!isset($_SESSION['id_usuario'])){ header("Location: to_do_login.html");}  
//echo $_SESSION['login_user'];
//echo $_SESSION['id_usuario'];
$id_usu_sesion=$_SESSION['id_usuario'];
$id_usuario_sesion=$_SESSION['id_usuario'];
echo "hello ".$id_usuario_sesion;echo "<br>";
//echo $_GET['id_lista'];
$id_lista_elegida=$_GET['id_lista'];
$nombre_lista_elegida=$_GET['nombre'];
echo "lista: ". $nombre_lista_elegida;echo "<br>";
//echo $id_lista_elegida;
try {
	$pdo=new PDO('mysql:host=localhost;dbname=apptarea','apptarea','apptarea');
		if(!$pdo){
				die('could not connect' . PDO_error());
				}
$statement_tarea=$pdo->query("SELECT * FROM  `tareas` WHERE  `id_lista` ='$id_lista_elegida'");
$statement_tarea->execute();
	$result= $statement_tarea->fetchAll(PDO::FETCH_ASSOC);
	$row=mysql_fetch_assoc($result);
	echo $row;
	//print_r($result);
}catch(PDOExeption $e){
		echo $e->getMessage();
	}
	
echo "<br>";
if($result){
foreach ($result as $res){//recoremos el resultado por filas adecuados[''] desde query $statement
        echo'<tr>';
       //echo '<td>'."id_tarea: " .$res['id_tarea']."</td>";
        echo'<td>' ."tarea: ". $res['contenido']."</td>";echo "<br>"; 
        echo '<td>'." estado: " ."</td>";
        $estado=$res['estado'];
         switch ($estado) {
    case "0":
         echo "pendiente";
        break;
    case "1":
        echo "en proceso";
        break;
    case "2":
        echo "sin finalizar";
        break;
     case "3":
        echo "Finalizada";
        break;
    }echo "<br>";
    echo '<td>'."<a href=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_estado_change.php?id_tarea=".$res['id_tarea']."&estado=".$res['estado'].'>'."cambio de estado"."</a>".'</td>';
         /*?><select name="estado" onchange="subir()">
         <option >ELIGE</option>
          <option value="0">Pendiente</option>
 		  <option value="1">En curso</option>
 		  <option value="2">Sin finalizar</option>
 		  <option value="3">Finalizada</option>
</select>
 		 <?php*/
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
<select name="estado">
          <option value="0">Pendiente</option>
 		  <option value="1">En curso</option>
 		  <option value="2">Sin finalizar</option>
 		  <option value="3">Finalizada</option>
</select>
</form>
<?php
$nuevatarea=$_POST['tarea'];echo "<br>";
$estado_nueva_tarea=$_POST['estado'];
echo $estado_nueva_tarea;
//*****************************************************crear tarea********************
if(isset($_POST['submit'])&&(!empty($nuevatarea))){//creamos nueva tarea
	
	//echo $nuevatarea;echo "<br>";
	$statement_tarea_crear=$pdo->query("INSERT INTO `tareas`(`id_tarea`, `id_lista`, `estado`, `contenido`) VALUES ('null','$id_lista_elegida','$estado_nueva_tarea','$nuevatarea');");//insertamos la tarea al BD
	
	//comprobamos si el INSERT se ejecuto correctamente
	if($statement_tarea_crear){
		echo "<script language='javascript'>";
		echo "alert('la tarea creada corectamente!!!!')";
		echo "</script>";
		header("Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_tareas.php?id_lista=".$id_lista_elegida."&nombre=".$nombre_lista_elegida);
		//header("Location: index.php?id=".$_POST['ac_id']."&err=".$login);
	}else{
		echo "<script language='javascript'>";
		echo "alert('fallo creando la tarea!!!!')";
		echo "</script>";
	}
}

echo '<a href="http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/Logout.php">click here to log out</a>';

?>