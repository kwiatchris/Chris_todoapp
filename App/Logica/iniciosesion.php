<?php
// Conectando, seleccionando la base de datos
$usuario=$_POST['txtusuario'];
$pass=$_POST['txtpass'];

//$consulta="select id_usuario,pass,nombre FROM usuarios where id_usuario='".$usuario."'";
//$conex= new mysqli('localhost','apptarea','apptarea','apptarea');
$pdo=new PDO('mysql:host=localhost;dbname=AppTarea','root','internet80');

if(!$pdo){
	die('could not connect' . PDO_error());
}
//var_dump($_POST);
//extract($_POST);
//$value = mysql_real_escape_string($_POST['login']);
$statement=$pdo->query("select id_usuario,pass,nombre FROM usuarios where id_usuario='".$usuario."'");
$statement->execute();
	$resultado= $statement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($_POST);
if ($conex->connect_errno)
{
	die("Error al conectar. ".$conex->connect_errno);
}
else
{
	//echo "Conexion OK<br>";
}

//$resultado = $conex->query($consulta);

if (!$fila=mysql_fetch_array($resultado))//si no devuelve nada --> no existe el usuario
{
	echo '<script>alert("No existe el usuario.")</script>';//mensaje con javascript
    echo "<script>location.href='../index.php'</script>";//redirecciona a X pagina 
    //redireccionar al inico
	//header('Location: index.html');
}
else
{
	if($fila['pass']!=$pass)
	{
		echo '<script>alert("Contraseña incorrecta.")</script>';//mensaje con javascript
        echo "<script>location.href='index.php'</script>";//redirecciona a X pagina

	}
	else
	{
		session_start();

		$_SESSION['id']=$fila['id_usuario'];
		$_SESSION['nomusu']=$fila['nombre'];
		$_SESSION['ape1']=$fila['apellido1'];
		echo $fila['id_usuario'];

		$nombre=$_SESSION['nomusu']." ".$_SESSION['ape1'];
		
		echo '<script>alert("Bienvenido '.$nombre.'")</script>';		
		//mandar al inicio
		echo "<script>location.href='inicio.php'</script>";
	}
}

$conex->close;

?>