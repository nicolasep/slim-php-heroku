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

	private function ValidarUsuario()
	{
		$estado = false;

		if(!(empty($this->nombre))&& !(empty($this->apellido)&& !(empty($this->clave))&& 
			!(empty($this->mail))))
		{
			$estado = true;	
		}
		
		return $estado;
	}

	public function Add()
	{
		
		if($this->ValidarUsuario())
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,apellido,clave,mail,fecha_de_registro)values(:nombre,:apellido,:clave,:mail,:fecha_de_registro)");

				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':clave',$this->clave, PDO::PARAM_INT);
				$consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
				$consulta->bindValue(':fecha_de_registro',$this->fecha_de_registro, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
			
			//return true;
		}

		return false;
	}

}

?>