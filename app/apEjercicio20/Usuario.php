<?php

class Usuario
{
	public $_nombre;
	public $_clave;
	public $_mail;
	
	public function __construct($nombre, $clave, $mail)
	{
		$this->_nombre = $nombre;
		$this->_clave = $clave;
		$this->_mail = $mail;
	}

	static function ValidarUsuario(Usuario $usuario)
	{
		$estado = false;

		if(!(empty($usuario->_nombre))&& !(empty($usuario->_clave))&& !(empty($usuario->_mail)))
		{
			$estado = true;	
		}
		
		return $estado;
	}

	static function Add($usuario)
	{
		
		if(Usuario::ValidarUsuario($usuario))
		{
			$miArchivo = fopen("usuarios.csv", "a");
			fwrite($miArchivo, $usuario->_nombre.",".$usuario->_clave.",".$usuario->_mail."\n");

			if(feof($miArchivo))
			{
				fclose($miArchivo);
			}
			
			return true;
		}
		return false;
	}

}

?>