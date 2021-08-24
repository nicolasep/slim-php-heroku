<?php
/*
$pdo = new PDO('mysql:host=127.0.0.1;dbname=utn', "root", "");

$id_usuario = $_POST["id"];

$sentencia = $pdo->prepare("SELECT * FROM usuarios WHERE id = :idusuario");
$sentencia=$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sentencia->bindParam(":idusuario", $id_usuario, PDO::PARAM_INT);
$sentencia->execute();
*/
class Conexion
{

	private $singleton;
	

	private function __construct()
	{
		
		$this->singleton = new PDO('mysql:host=127.0.0.1;dbname=utn', "root", "");

	}

	static function RetornarConexion()
	{
		if($this->singleton == null)
		{
			new Conexion();
		}

		return $this->singleton;
	}

	static function RetornarDatos($tabla)
	{
		/*
		$conec = new PDO('mysql:host=127.0.0.1;dbname=utn', "root", "");
		$sentencia = $conec->prepare("SELECT * FROM :nomTabla");
		$sentencia=$conec->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
		//$sentencia->bindParam
		if($sentencia->bindParam(":nomTabla", $tabla, PDO::PARAM_STR))
		{
			$sentencia->execute();

			return $sentencia;
		}*/
		$id_usuario = 1;
		
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=utn', "root", "");
		/*$sentencia = $pdo->prepare("SELECT * FROM usuario WHERE id = :idusuario");
		//$sentencia=$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$sentencia->bindValue(":idusuario", $id_usuario, PDO::PARAM_INT);*/
		$sentencia = $pdo->prepare("SELECT * FROM :nomTabla");
		//$sentencia=$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$sentencia->bindValue(":nomTabla", usuario, PDO::PARAM_STR);
		$sentencia->execute();
		//$sentencia->fetchAll(PDO::FETCH_CLASS, "usuario");
		while ($us=$sentencia->fetchAll(PDO::FETCH_CLASS)) {

			//echo " ".$us['usuario']." ".$us['apellido']."<br/>";
			var_dump($us);
			echo "<br/>";
		}
		//var_dump($sentencia->fetchAll(PDO::FETCH_CLASS)) ;
	}
}
?>