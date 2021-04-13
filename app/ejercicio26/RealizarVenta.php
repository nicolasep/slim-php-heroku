<?php
include "producto.php";
include "usuario.php";
include_once "ventas.php";
/*Aplicación Nº 26 (RealizarVenta) Archivo: RealizarVenta.php método:POST Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por POST . Verificar que el usuario y el producto exista y tenga stock. crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). carga los datos necesarios para guardar la venta en un nuevo  renglón.
Retorna un : “venta realizada”Se hizo una venta “no se pudo hacer“si no se pudo hacer Hacer los métodos necesarios en las clases
*/

$arrayUsuarios = array();
$arrayProductos = array();
$arrayVentas = array();
$miArchivo;

if(!file_exists("usuarios.json"))
{
	$arrayUsuarios = Usuario::RecuperarUsuarios();
}
else
{
	Usuario::Add(new Usuario("nico","perez",1));
	Usuario::Add(new Usuario("matias","sosa",2));
	Usuario::Add(new Usuario("cristan","gimenez",3));
}
if(file_exists("./productos.json"))
{

	$arrayProductos = Producto::RecuperarProductos();
}
else
{
	$prod1 = new Producto("111111","notebook","portatil",20,80000);
	$prod2 = new producto("222222","pc","escritorio",15,50000);
	$prod3 = new Producto("333333","monitor","led",40,18000);
	if(Producto::ModificarArchivo($prod1) &&
	   Producto::ModificarArchivo($prod2) &&
	   Producto::ModificarArchivo($prod3))
	{
		$arrayProductos = Producto::CargarProductos();
		echo "Productos cargados\n\n";
	}
	

}

if(isset($_POST["codigoProducto"]) && isset($_POST["idUsuario"]) && isset($_POST["cantidad"]))
{
	$codIngresado = $_POST["codigoProducto"];
	$idIngresado = (int)$_POST["idUsuario"];
	$cantidadCompra = (int)$_POST["cantidad"];

	$existeUsuario=0;
	$existeProductoYCantidad = -1;
	$indexProducto = -1;
	$contador=0;

	foreach ($arrayUsuarios as $usuario) 
	{
		if($usuario->ValidarPorId($idIngresado))
		{
			$existeUsuario = 1;
			break;
		}
	}
	foreach ($arrayProductos as $producto) 
	{
		$resultado = $producto->ValidarProductoDisponible($codIngresado,$cantidadCompra,$producto);
		if($resultado)
		{
			$existeProductoYCantidad = 1;
			$indexProducto = $contador;
			break;
		}
		elseif($resultado == 0)
		{
			$existeProductoYCantidad = 0;
			break;
		}
		$contador++;
	}
	if($existeUsuario && $existeProductoYCantidad)
	{
		$arrayProductos[$indexProducto]->DescontarStock($cantidadCompra);
		Producto::ModificarArchivo($arrayProductos,"w");
		$venta = new Ventas($idIngresado,$arrayProductos[$indexProducto],$cantidadCompra);
		Ventas::RegistrarVenta($venta);
		echo "Venta Realizada";
	}
	else
	{
		echo "No se pudo hacer";
	}

}



?>