<?php
class Users
{
	public $id_usuario='roman';
	public $nombre='roman';
	public $pass='roman';
	public $apellido1='roman';
	public $apellido2='roman';
	public $email='roman@gmail.com';
	

	public function insertar_usuario(){
		echo $this->id_usuario;
		$pdo=new PDO('mysql:host=localhost;dbname=apptarea','apptarea','apptarea');
		if(!$pdo){
				die('could not connect' . PDO_error());
					}
			$insert_usuario=$pdo->query("INSERT INTO `apptarea`.`usuarios`(`id_usuario`, `pass`, `nombre`, `apellido1`, `apellido2`, `email`) VALUES ('$this->id_usuario','$this->pass','$this->nombre','$this->apellido1','$this->apellido2','$this->email')");
			$insert_usuario=execute();
	}
}
?>