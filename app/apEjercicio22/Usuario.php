<?php

include "archivos.php";


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
			
			if((Archivos::EscribirArchivo(($usuario->_nombre.",".$usuario->_clave.",".$usuario->_mail.","),"nico")))
			{
				return true;
			}
		}
		return false;
	}

	static function MostrarUsuario($usuario)
	{
		return $usuario->_nombre." ".$usuario->_clave." ".$usuario->_mail."\n";
	}
	static function CompararUsuarios($usuario1, $usuario2)
	{
		$respuesta = -1;


		if($usuario1->_nombre == $usuario2->_nombre)
		{

			if($usuario1->_clave == $usuario2->_clave)
			{
				
			 	if($usuario1->_mail != $usuario2->_mail)
				{
					
					 $respuesta = -1;
				}
				
			}
			else
			{
				$respuesta =  0;
			}
			
		}
		return $respuesta;
		
		
	}

}

?>