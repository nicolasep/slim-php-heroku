<?php

include "producto.php";

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

if(isset($_POST["codigoDeBarra"])&& isset($_POST["nombre"])&& isset($_POST["tipo"]) && 
   isset($_POST["stock"])&& isset($_POST["precio"]))
{
	$productoIngresado = 0;

	$arrayProductos;

	if(strlen($_POST["codigoDeBarra"])<=6)
	{
		$productoNuevo = new Producto($_POST["codigoDeBarra"],$_POST["nombre"],$_POST["tipo"],
								      $_POST["stock"],$_POST["precio"]);

		if(file_exists("./productos.json"))
		{

			$arrayProductos = Producto::CargarProductos();
		}
		else
		{
			$prod1 = new Producto("111111","notebook","portatil",20,80000);
			$prod2 = new producto("222222","pc","escritorio",15,50000);
			$prod3 = new Producto("333333","monitor","led",40,18000);
			if(Producto::AgregarProducto($prod1) &&
			   Producto::AgregarProducto($prod2) &&
			   Producto::AgregarProducto($prod3))
			{
				$arrayProductos = Producto::CargarProductos();
				echo "Productos cargados\n\n";
			}
			

			
		}

		foreach ($arrayProductos as $producto) 
		{

			if($productoNuevo->Equals($producto))
			{
				$productoIngresado = 1;
				break;
			}
		}

		if($productoIngresado == 0)
		{
			Producto::AgregarProducto($productoNuevo);

			//Acualizo la lista de productos en memoria
			$arrayProductos = Producto::CargarProductos();

			echo "Ingresado";
		}
		else
		{
			echo "Actualizado";
		}
	}
	else
	{
		echo "No se puedo hacer";
	}
	
	


}
else
{
	echo "Faltan datos";
}





?>