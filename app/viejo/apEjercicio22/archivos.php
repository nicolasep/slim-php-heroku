<?php


class Archivos
{
	static function LeerArchivo($nombreArchivo)
	{


		$miArchivo = fopen($nombreArchivo.".csv","r");

		if(!(is_null($miArchivo)))
		{
			$arrayUsuarios = array();
			while(!feof($miArchivo))
			{
				$lineaLeida = fgets($miArchivo);
				
				$arrayLectura = explode(",", $lineaLeida);
				
				if(count($arrayLectura) == 4)
				{
					$usuarioN = new Usuario($arrayLectura[0],$arrayLectura[1],$arrayLectura[2]);
					 array_push($arrayUsuarios, $usuarioN);
					 
				}
			}
			fclose($miArchivo);
			
			return $arrayUsuarios;
		}
		return 0;
	}

	static function EscribirArchivo($datosACargar,$nombreArchivo)
	{
		$resultado = false;

		$miArchivo = fopen($nombreArchivo.".json", "a");

		if((fwrite($miArchivo,json_encode($datosACargar)."\n")) != false)
		{
			$resultado = true;
		}
			
		
		if(feof($miArchivo))
		{
			fclose($miArchivo);
		}
		return $resultado;
	}
}


?>