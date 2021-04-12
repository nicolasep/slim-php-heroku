<?php

class Usuario
{
	public $_nombre;
	public $_apellido;
	public $_nombreFoto;
	
	public function __construct($nombre="", $apellido="", $foto="")
	{
		$this->_nombre = $nombre;
		$this->_apellido = $apellido;
		$this->_nombreFoto = $foto;
	}

	static function ValidarUsuario(Usuario $usuario)
	{
		$estado = false;

		if(!(empty($usuario->_nombre))&& !(empty($usuario->_apellido))&& !(empty($usuario->_nombreFoto)))
		{
			$estado = true;	
		}
		
		return $estado;
	}

	static function Add($usuario)
	{
		
		if(Usuario::ValidarUsuario($usuario))
		{
			$miArchivo = fopen("usuarios.json", "a");
			
			fwrite($miArchivo,json_encode($usuario,JSON_UNESCAPED_UNICODE)."\n");
			
			
			fclose($miArchivo);
			
			return true;
		}
		return false;
	}

	public function MostrarUsuario()
	{
		return $this->_apellido." , ".$this->_nombre." , ".$this->_nombreFoto;
	}
	static function ListarUsuario($usuario)
	{
		return ("<li>".$usuario->_apellido." , ".$usuario->_nombre." , ".$usuario->_nombreFoto."</li>");
	}

}

?>