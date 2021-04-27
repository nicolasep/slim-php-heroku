<?php
include "Usuario.php";
include "producto.php";
include "venta.php";


/*
Nicolas Eduardo Perez
Aplicación Nº 31 (RealizarVenta BD )
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en las clases
*/
$listaUsuarios;
$listaProductos;

if(isset($_POST["codigo_de_barra"]) && isset($_POST["id"]) && isset($_POST["cantidad"]))
{
	$listaUsuarios = Usuario::RetornarUsuarios();
	$listaProductos = Producto::RetornarProductos();

	if(!is_null($listaProductos) && !is_null($listaUsuarios))
	{
		if(!is_null($prod = Producto::BuscarProductoPorCodigo($listaProductos,$_POST["codigo_de_barra"]))&&
			!is_null($usuario = Usuario::BuscarUsuarioPorId($listaUsuarios,(int)$_POST["id"])))
		{

			if($prod->DescontarStock((int)$_POST["cantidad"]))
			{
				//actualizo lista en memoria
				$listaProductos = Producto::RetornarProductos();

				$venta = new Venta($prod->id,$usuario->id,(int)$_POST["cantidad"]);
				if($venta->AgregarVenta())
				{
					echo "Venta realizada\n";
				}
				else
				{
					echo "Error al cargar la venta";
				}
			}
			else
			{
				echo "No se pudo hacer stock insuficiente";
			}
		}
		else
		{
			echo "codigo de producto o id de cliente inexistente";
		}
	}
	else
	{
		echo "No existen productos o cliente";
	}
}
?>