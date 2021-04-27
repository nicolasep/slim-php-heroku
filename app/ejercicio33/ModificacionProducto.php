<?php
include "producto.php";
/*
Nicolas Eduardo Perez
Aplicación Nº 33 ( ModificacionProducto BD)
Archivo: modificacionproducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
,
crear un objeto y utilizar sus métodos para poder verificar si es un producto existente,
si ya existe el producto el stock se sobrescribe y se cambian todos los datos excepto:
el código de barras .
Retorna un :
“Actualizado” si ya existía y se actualiza
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/

if(isset($_POST["codigo_de_barra"])&&isset($_POST["nombre"])&&isset($_POST["tipo"])&&isset($_POST["stock"])&&isset($_POST["precio"]))
{
	

	$codigo = $_POST["codigo_de_barra"];
	$nombre = $_POST["nombre"];
	$tipo = $_POST["tipo"];
	$stock = (int)$_POST["stock"];
	$precio = (float)$_POST["precio"];

	$producto = new Producto($codigo,$nombre,$tipo,$stock,$precio);
	if($producto->ModificarProductoBd())
	{
		echo "Actualizado";
	}
	else
	{
		echo "No se pudo hacer";
	}

}



?>