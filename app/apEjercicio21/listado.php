<?php

include "Usuario.php";

/*
Nicolas Eduardo Perez
Aplicación No 21 ( Listado CSV y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.csv.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>Coffee</li>
<li>Tea</li>
<li>Milk</li>
</ul>
Hacer los métodos necesarios en la clase usuario*/

$arrayUsuarios = array();
$miArchivo;

if(isset($_GET["archivo"]))
{
	//if($_GET["archivo"]=="usuarios.php")
	//{

		$miArchivo = fopen("usuarios.csv", "r");

		//if(!(is_null($miArchivo))
		//{
			//var_dump($_GET["archivo"]);
			while(!feof($miArchivo))
			{
				$lineaLeida = fgets($miArchivo);
				//echo $lineaLeida;
				$arrayLectura = explode(",", $lineaLeida);
				//echo "<br/>",$arrayLectura[0];
				if(count($arrayLectura) == 3)
				{
					$usuarioN = new Usuario($arrayLectura[0],$arrayLectura[1],$arrayLectura[2]);
					 array_push($arrayUsuarios, $usuarioN);
					 //echo "agrego \n";
				}
			}
			
			echo "usuarios cargados \n";
			foreach ($arrayUsuarios as $us) 
			{
				echo Usuario::MostrarUsuario($us);
			
			}
			fclose($miArchivo);
		//}
}




?>