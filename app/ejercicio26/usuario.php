<?php

class Usuario
{
	public $_id;
	public $_nombre;
	public $_apellido;
	
	
	public function __construct($nombre="", $apellido="", $id=null)
	{
		$this->_nombre = $nombre;
		$this->_apellido = $apellido;
		if(is_null($id))
		{
			$this->_id = rand(1,10000);
		}
		else
		{
			$this->_id = (int)$id;
		}
		
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
	public function Equals($usuario)
	{
		return ($this->_id == $usuario->_id && $this->_nombre == $usuario->_nombre && $this->_apellido == $usuario->_apellido);
	}
	public function ValidarPordId($id)
	{
		return $this->_id == $id;
	}
	static function RecuperarUsuarios()
	{
		$arrayUsuarios;
		$lineaLeida;

		$miArchivo = fopen("usuarios.json", "r");

		if(!(is_null($miArchivo)))
		{
			
			while(!feof($miArchivo))
			{

				$lineaLeida = fgets($miArchivo);
				$arrayJson = json_decode($lineaLeida,true);
				if(!is_null($arrayJson))
				{
					$auxUsuario = new Usuario($arrayJson["_nombre"],$arrayJson["_apellido"],$arrayJson["_id"]);
		
					array_push($arrayUsuarios, $auxUsuario)
					
				}
				
			}
			fclose($miArchivo);

			return $arrayUsuarios;
	
		}
	}

}

?>