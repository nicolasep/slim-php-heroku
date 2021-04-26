<?php

include "usuario.php";
include "venta.php";
include "producto.php";

/*
Nicolas Eduardo Perez
Aplicación Nº 28 ( Listado BD)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,ventas)
cada objeto o clase tendrán los métodos para responder a la petición
devolviendo un listado <ul> o tabla de html <table>
*/


$arrayUsuarios = array();

/*
if(!file_exists("usuarios.json"))
{

	Usuario::Add(new Usuario("nico","perez","paisaje.jpg"));
	Usuario::Add(new Usuario("matias","sosa","estrellas.jpg"));
	Usuario::Add(new Usuario("cristan","gimenez","monte.jpg"));
}*/



if(isset($_GET["archivo"]))
{
	if($_GET["archivo"]=="usuarios")
	{
		$arrayUsuarios = Usuario::RetornarUsuarios();
	
		
			echo "Usuarios cargados \n";
			
			echo "<ul> \n";
			
			foreach ($arrayUsuarios as $us) 
			{
				echo $us->ListarUsuario();
			}
			echo "</ul>\n";
			
			
	}
	elseif ($_GET["archivo"]=="productos") 
	{

			$arrayProductos = Producto::RetornarProductos();
	
		
			echo "Productos cargados \n";
			
			echo "<ul> \n";
			
			foreach ($arrayProductos as $prod) 
			{
				echo $prod->ListarProducto();
			}
			echo "</ul>\n";
	}
	elseif ($_GET["archivo"]=="ventas") 
	{
			$arrayVentas = Venta::RetornarVentas();
	
		
			echo "Ventas cargadas \n";
			
			echo "<ul> \n";
			
			foreach ($arrayVentas as $ven) 
			{
				echo $ven->ListarVenta();
			}
			echo "</ul>\n";
	}	
}




?>