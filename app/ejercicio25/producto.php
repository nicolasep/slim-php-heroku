<?php

/*Aplicación Nº 25 ( AltaProducto)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
crear un objeto y utilizar sus métodos para poder verificar si es un producto existente,
si ya existe el producto se le suma el stock , de lo contrario se agrega al documento en un
nuevo renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/
class Producto
{
	public $_id;
	public $_codigoDeBarra;
	public $_nombre;
	public $_tipo;
	public $_stock;
	public $_precio;

	public function __construct($codigoDeBarra, $nombre, $tipo, $stock, $precio,$id=null)
	{

		$this->_codigoDeBarra = $codigoDeBarra;
		$this->_nombre = $nombre;
		$this->_tipo = $tipo;
		$this->_stock = (int)$stock;
		$this->_precio = (double)$precio;
		if(is_null($id))
		{
			$this->_id = rand(1,10000);
		}
		else
		{
			$this->_id = $id;
		}
		
	}

	static function ValidarProducto($producto)
	{
		if(is_a($producto, "Producto")&& !is_null($producto))
		{
			return true;
		}
		return false;
	}

	public function Equals($producto)
	{
		if($producto->ValidarProducto($producto)&& $producto->_nombre == $this->_nombre &&
		   $producto->_codigoDeBarra == $this->_codigoDeBarra && $producto->_precio == $this->_precio)
		{
			if($this->SumarProductos($producto))
			{
				return true;
			}
			
		}

		return false;
	}
	static function AgregarProducto($producto,$tipo="a")
	{

		if(is_array($producto))
		{
			$miArchivo = fopen("productos.json", "a");
			foreach ($producto as $prod) 
			{
				if(Producto::ValidarProducto($prod))
				{	
					fwrite($miArchivo,json_encode($prod,JSON_UNESCAPED_UNICODE)."\n");	
				}
			}
			fclose($miArchivo);
					
			return true;

		}
		else
		{
			if(Producto::ValidarProducto($producto))
			{
				$miArchivo = fopen("productos.json", "a");
				
				fwrite($miArchivo,json_encode($producto,JSON_UNESCAPED_UNICODE)."\n");
				
				
				fclose($miArchivo);
				
				return true;
			}
		}
		
		return false;
	}

	static function CargarProductos()
	{
		$productos = array();
		$miArchivo = fopen("productos.json", "r");

		if(!(is_null($miArchivo)))
		{
			
			while(!feof($miArchivo))
			{

				$lineaLeida = fgets($miArchivo);
				$producto = json_decode($lineaLeida,true);
				if(!is_null($producto))
				{
					$auxProducto = new Producto($producto["_codigoDeBarra"],$producto["_nombre"],$producto["_tipo"],
						                       (int)$producto["_stock"],(double)$producto["_precio"],(int)$producto["_id"]);
				
					array_push($productos, $auxProducto);

				}
				
			}
			fclose($miArchivo);

			return $productos;
		}
		return null;
	}
	private function SumarProductos($producto)
	{

		$this->_stock .= $producto->_stock;
		return true;
	}

}



?>