<?php

require "producto.php";

/*
Nicolas Eduardo Perez
Aplicación Nº 30 ( AltaProducto BD)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
, carga la fecha de creación y crear un objeto ,se debe utilizar sus métodos para poder
verificar si es un producto existente,
si ya existe el producto se le suma el stock , de lo contrario se agrega .
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/
$listaProductos;
$productoNuevo;


if(isset($_POST["codigo_de_barra"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && 
	isset($_POST["stock"]) && isset($_POST["precio"]))
{

	$listaProductos = Producto::RetornarProductos();
	$prodBd =null;
	$productoNuevo = new Producto($_POST["codigo_de_barra"],$_POST["nombre"],$_POST["tipo"],(int)$_POST["stock"],(int)$_POST["precio"]);

	if($listaProductos != null)
	{

		
		if($prodBd=$productoNuevo->ValidarExistenciaEnBd($listaProductos))
		{
			$prodBd->ModificarStockProducto($productoNuevo);
			echo "Alcualizado";
		}
		elseif($prodBd==false)
		{
			if(!is_null($productoNuevo->Add()))
			{
				echo "Ingresado";
			}
		}
		else
		{
			echo "No se pudo hacer";
		}
		
	}
	else
	{
		echo " es null";
	}

}






?>