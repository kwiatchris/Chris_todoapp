<?php
session_start();
//include('to_do.php');
echo $_SESSION['login_user'];
echo $_SESSION['id_usuario'];
$id_usu_sesion=$_SESSION['id_usuario'];
//echo $id_usu_sesion;
$pdo=new PDO('mysql:host=localhost;dbname=TO_DO_PHP','root','internet80');
if(!$pdo){
	die('could not connect' . PDO_error());
}
$statement=$pdo->query("SELECT * FROM  `listas` WHERE  id_usuario =  '$id_usu_sesion'");


//var_dump($_POST);
$statement->execute();
$result= $statement->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
echo "<br>";
//echo "mis listas";
echo "<br>";
foreach ($result as $res){
        echo'<tr>'; 
        echo'<td>' ."usuario: ". $res['id_usuario']."</td>";echo "<br>";
        echo'<td>' ."nombre de la lista : ". $res['nombre'].'</td>';echo "<br>";
        echo'<td>' . "la lista creada dia ". $res['fecha_creacion'].'</td>';echo "<br>";
        echo'<tr>';
    }
?>