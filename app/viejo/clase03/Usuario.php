<?php

class Usuario
{
	public $_usuario;
	public $_clave;

	static function ValidarUsuario(Usuario $usuario)
	{
		$estado = null;

		if(isset($usuario->_usuario)&&isset($usuario->_clave))

		{
			
			if($usuario->_usuario == "admin" && $usuario->_clave == 1234)
			{
				$estado = "OK";
				
			}
			else
			{
				$estado = "Usuario no registrado";
			}
		}
		else 
		{
			$estado = "Faltan datos";
			# code...
		}

		$miArchivo = fopen("log.txt", "a");
		fwrite($miArchivo, "\nEstado: ".$estado."  " .$usuario->_usuario. " ".date("d/m/Y")."\n");
		fclose($miArchivo);

		return $estado;
	}

}

?>