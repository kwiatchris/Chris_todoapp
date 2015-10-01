<?php
require 'class_usuario.php';
require 'to_do_login.php';
extract($_POST);

$u1=new Users();

echo $_usuario;
$u1->id_usuario=$_usuario;
$u1->nombre=$nombre;
$u1->pass=$pass;
$u1->apellido1=$apellido1;
$u1->apellido2=$apellido2;
$u1->email=$email;

 

$u1->insertar_usuario();

var_dump($u1);
?>