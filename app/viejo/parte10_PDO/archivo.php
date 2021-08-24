<?php

include "Usuario.php";
include "producto.php";
include "venta.php";
/*A. Obtener los detalles completos de todos los usuarios y poder ordenarlos
alfabéticamente de forma ascendente o descendente.
B. Obtener los detalles completos de todos los productos y poder ordenarlos
alfabéticamente de forma ascendente y descendente.
C. Obtener todas las compras filtradas entre dos cantidades.
D. Obtener la cantidad total de todos los productos vendidos entre dos fechas.
E. Mostrar los primeros “N” números de productos que se han enviado.
F. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
G. Indicar el monto (cantidad * precio) por cada una de las ventas.
H. Obtener la cantidad total de un producto (ejemplo:1003) vendido por un usuario
(ejemplo: 104).
I. Obtener todos los números de los productos vendidos por algún usuario filtrado por
localidad (ejemplo: ‘Avellaneda’).
J. Obtener los datos completos de los usuarios filtrando por letras en su nombre o
apellido.
K. Mostrar las ventas entre dos fechas del año.
*/

if(isset($_GET["ejercicio"])&& isset($_GET["tipo"]))
{


	switch ($_GET["ejercicio"]) {
		case 'a':
			$listaUsuarios = Usuario::RetornarUsuariosOrdenados($_GET["tipo"]);
			foreach ($listaUsuarios as $usuario) 
			{
				echo $usuario->ListarUsuario();
			}
			break;
		case 'b':
			$listaProductos = Producto::RetornarProductosOrdenados($_GET["tipo"]);
			foreach ($listaProductos as $prod) 
			{
				echo $prod->ListarProducto();
			}
			break;
		case 'c':
			$listaVentas = Venta::RetornarVentasConNombreProducto();
			echo "Id - Producto - Usuario - Cantiad\n";
			foreach ($listaVentas as $venta) 
			{
				echo $venta["id"]." - ".$venta["producto"]." - ".$venta["usuario"]." - ".$venta["cantidad"]."\n";
			}
			break;
		case 'd':
			$cantidadVendidos = Venta::RetornarCantidadVendida("20200601","20210101");
			echo $cantidadVendidos[0];
			break;
		case 'e':
			$listaProductos = Venta::RetornarLosPrimerosNumeroDeProductos(5);
			foreach ($listaProductos as $prod) 
			{
				echo $prod["Producto"]."\n";
			}
			break;
		case 'f':
			$listaVenta = venta::RetornarUsuarioYProductoDeVenta($_GET["tipo"]);
			foreach ($listaVenta as $prod) 
			{
				echo $prod["usuario"]." - ".$prod["producto"]."\n";
			}
			break;
		case 'g':
			$listaVenta = Venta::RetornarMontoDeCadaVenta();
			echo "Venta - Monto\n";
			foreach ($listaVenta as $venta) 
			{
				echo $venta["id"]." - ".$venta["monto"]."\n";
			}
			break;
		case 'h':
			$cantidadProd = Venta::RetornarCantidadVendidaPorUsuario(1,1);
			
			echo $cantidadProd["cantidad"]."\n";
			break;
		case 'i':
			$listaVenta = Venta::RetornarVentasDeUsuarioPorLocalidad("avellaneda");
			foreach ($listaVenta as $venta) 
			{
				echo $venta->ListarVenta();
			}
			break;





		case 'j':

			$usuario = Usuario::RetornarUsuarioPorLetra("n");
			
			foreach ($usuario as $us) 
			{
				echo $us->ListarUsuario();
			}
			break;


		case 'k':
			$listaProductos = Producto::RetornarDetalleDeProductosOrdenados($_GET["tipo"]);
			foreach ($listaProductos as $prod) 
			{
				echo $prod["Producto"]."\n";
			}
			break;
		
		default:
			# code...
			break;
	}
}









?>