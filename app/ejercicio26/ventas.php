<?php
include "producto.php";


class Ventas
{
	public $idUsuario;
	public $nombreProducto;
	public $tipo;
	public $cantidadComprada;
	public $totalAPagar;

	public function __construct($idUsuario,$producto,$cantidad)
	{
		$this->idUsuario = $idUsuario;
		$this->nombreProducto = $producto->_nombre;
		$this->tipo = $producto->_tipo;
		$this->cantidadComprada = $cantidad;
		$this->totalAPagar = $producto->_precio * $cantidad;
	}

	
	static function RegistrarVenta($venta)
	{

		$miArchivo = fopen("ventas.json","a");
				
		fwrite($miArchivo,json_encode($venta,JSON_UNESCAPED_UNICODE)."\n");
		
		
		fclose($miArchivo);
		
		return true;
	}

}


?>