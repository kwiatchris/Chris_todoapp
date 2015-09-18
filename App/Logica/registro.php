<?php
$id_usuario=$_POST['txt_Usuario'];
$pass=$_POST['txt_Pass'];
$passvalid=$_POST['txt_PassValid'];
$nombre=$_POST['txt_Nombre'];
$ape1=$_POST['txt_Apellido1'];
$ape2=$_POST['txt_Apellido2'];
$email=$_POST['txt_Email'];
/*INSERT INTO usuarios (id_usuario,nombre,pass,apellido1,apellido2,email)
    SELECT 'ierai','ierai','papaa','','',''
        FROM DUAL
        WHERE NOT EXISTS (SELECT id_usuario
                              FROM usuarios
                              WHERE id_usuario='ierai')
        LIMIT 1;*/
$comand="insert into usuarios(id_usuario,pass,nombre,apellido1,apellido2,email)values('".$id."','".$pass."','".$nombre."','".$ape1."','".$ape2."','".$email."',)"

if ($pass!=$passvalid)
{
	echo '<script>alert("Las contraseñas no coinciden.")</script>'
}
else
{
	if(!isset($id)||!isset($pass)||!isset($passvalid)||!isset($nombre)||!isset($ape1)||!isset($email))
	{
		echo '<script>alert("Faltan datos por introducir.")</script>'
	}
	else
	{

	}

}
?>