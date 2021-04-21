<?php

include "Usuario.php";

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
	if($_GET["archivo"]=="usuario")
	{
		$arrayUsuarios = Usuario::RetornarUsuarios();
	
		
			echo "Usuarios cargados \n";
			
			$listaUs ="<ul> \n";
			
			foreach ($arrayUsuarios as $us) 
			{
				$listaUs .= Usuario::ListarUsuario($us)."\n";
			}
			$listaUs .="</ul>\n";
			
			echo $listaUs;
	}	
}




?>