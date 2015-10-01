<?php
require 'class_usuario.php';
require 'to_do_login.php';
extract($_POST);

$u1=new Users();

//echo $_usuario;
$u1->id_usuario=$_usuario;
$u1->nombre=$nombre;
$u1->pass=$pass;
$u1->apellido1=$apellido1;
$u1->apellido2=$apellido2;
$u1->email=$email;

 if(empty($_usuario)||empty($pass)||!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 		echo "<script language='javascript'>";
		echo "alert('falta datos o datos incorectos !!!!')";
		echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_login.php');

}else{
	$u1->insertar_usuario();
	echo "<script language='javascript'>";
	echo "alert('el usuario creado corectamente!!!!')";
	echo "</script>";
		header('Refresh:1;URL=http://localhost/Aitor/TO_DO_/TO_DO_GIT/todoapp/Chris_todoapp/to_do_login.html');
}
//var_dump($u1);
?>