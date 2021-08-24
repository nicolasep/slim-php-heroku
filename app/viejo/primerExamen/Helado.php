<?php
/*Nicolas Eduardo Perez*/
include "archivos.php";

class Helado
{
	public $id;
	public $sabor;
	public $precioBruto;
	public $tipo;
	public $cantidad;
	public $precioFinal;
	
	public function __construct($sabor, $precioBruto, $tipo, $cantidad)
	{
		$this->id = rand(1,1000);
		$this->sabor = $sabor;
		$this->precioBruto = $precioBruto;
		$this->tipo = $tipo;
		$this->cantidad = $cantidad;
		$this->precioFinal = $precioBruto*1.21;

	}

	public function AgregarSabor()
	{
		if(Helado::GuardarEnJson("helados","a",$this))
		{
			return true;
		}
	}

	public function ExisteSabor($lista)
	{
		foreach ($lista as $helado) 
		{
			if($this->sabor == $helado->sabor && $this->tipo == $helado->tipo)
			{
				$helado->precioBruto = $this->precioBruto;
				$helado->precioFinal = $this->precioFinal;
				$helado->cantidad += $this->cantidad;
				return true;
			}
		}
		return false;
	}

	public static function GuardarENJson($nombreArchivo,$tipoDeOperacion,$datos)
	{
		$miArchivo = fopen($nombreArchivo.".json", $tipoDeOperacion);

		if(is_array($datos))
		{
			foreach ($datos as $dato) 
			{
				
				fwrite($miArchivo,json_encode($dato,JSON_UNESCAPED_UNICODE)."\n");
			}
			
		}
		else
		{
			fwrite($miArchivo,json_encode($dato,JSON_UNESCAPED_UNICODE)."\n");

		}
		fclose($miArchivo);

		return true;
	}
	public static function CargarDesdeJson($nombreArchivo)
	{
		$miArchivo = fopen($nombreArchivo.".json", "r");
		$listaHelados;
		if(!(is_null($miArchivo)))
		{
			
			while(!feof($miArchivo))
			{
				
				$lineaLeida = fgets($miArchivo);
				$usJson = json_decode($lineaLeida,true);
				if(!is_null($usJson))
				{
					$helado = new Helado($usJson["id"],$usJson["sabor"],$usJson["precioBruto"],$usJson["tipo"],$usJson["cantidad"],$usJson["precioBruto"],$usJson["precioFinal"]);
				
					array_push($listaHelados, $helado);
				}
				
			}
			fclose($miArchivo);
			return true;
		}
		return false;

	}
	static function ValidaSiExisteTipoSabor($lista,$tipo,$sabor)
	{
		foreach ($lista as $helado) 
		{
			if($helado->sabor==$sabor && $helado->tipo==$tipo)
			{
				return 1;
			}
			elseif($helado->sabor!=$sabor && $helado->tipo==$tipo)
			{
				return 0;
			}
			else
			{
				return -1;
			}
		}
	}



?>