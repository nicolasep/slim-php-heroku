<?php

include "usuario.php";

/*
Nicolas Eduardo Perez
Aplicación Nº 24 ( Listado JSON y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.json.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>apellido, nombre,foto</li>
<li>apellido, nombre,foto</li>
</ul>
Hacer los métodos necesarios en la clase usuario
*/


$arrayUsuarios = array();
$miArchivo;

if(!file_exists("usuarios.json"))
{

	Usuario::Add(new Usuario("nico","perez","paisaje.jpg"));
	Usuario::Add(new Usuario("matias","sosa","estrellas.jpg"));
	Usuario::Add(new Usuario("cristan","gimenez","monte.jpg"));
}



if(isset($_GET["archivo"]))
{
	if($_GET["archivo"]=="usuarios")
	{
		$listaUs;
		$lineaLeida;

		$miArchivo = fopen("usuarios.json", "r");

		if(!(is_null($miArchivo)))
		{
			
			while(!feof($miArchivo))
			{

				
				$lineaLeida = fgets($miArchivo);
				$usJson = json_decode($lineaLeida,true);
				if(!is_null($usJson))
				{
					$usuarioN = new Usuario($usJson["_nombre"],$usJson["_apellido"],$usJson["_nombreFoto"]);
				
					if(array_push($arrayUsuarios, $usuarioN))
					{
						echo "usuario agregado!!!\n";
					}
				}
				
			}
			fclose($miArchivo);
	
		}
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