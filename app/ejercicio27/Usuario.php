<?php

require "AccesoDatos.php";

class Usuario
{
	public $nombre;
	public $apellido;
	public $clave;
	public $mail;
	public $localidad;
	public $fecha_de_registro;

	
	public function __construct($nombre,$apellido, $clave, $mail,$localidad)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->clave = $clave;
		$this->mail = $mail;
		$this->localidad = $localidad;
		$this->fecha_de_registro = date("Y-m-d");
	}

	static function ValidarUsuario(Usuario $usuario)
	{
		$estado = false;

		if(!(empty($usuario->nombre))&& !(empty($usuario->clave))&& !(empty($usuario->mail)))
		{
			$estado = true;	
		}
		
		return $estado;
	}

	static function Add($usuario)
	{
		
		if(Usuario::ValidarUsuario($usuario))
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,apellido,clave,mail,fecha_de_registro)values(:nombre,:apellido,:clave,:mail,:fecha_de_registro)");

				$consulta->bindValue(':nombre',$usuario->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':apellido',$usuario->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':clave',$usuario->clave, PDO::PARAM_INT);
				$consulta->bindValue(':mail', $usuario->mail, PDO::PARAM_STR);
				$consulta->bindValue(':fecha_de_registro',$usuario->fecha_de_registro, PDO::PARAM_STR);
				$consulta->execute();		
				//return $objetoAccesoDato->RetornarUltimoIdInsertado();
			
			return true;
		}

		return false;
	}

}

?>