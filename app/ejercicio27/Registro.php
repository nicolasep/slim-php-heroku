<?php

include "Usuario.php";
/*
Nicolas Eduardo Perez
Aplicación No 27 (Registro BD)
Archivo: registro.php
método:POST
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos la base de datos
retorna si se pudo agregar o no.
*/

	$nuevoUsuario;


	if(isset($_POST["nombre"])&&isset($_POST["apellido"])
		&&isset($_POST["clave"])&&isset($_POST["mail"])&&isset($_POST["localidad"]))
	{

		$nuevoUsuario = new Usuario($_POST["nombre"],$_POST["apellido"],$_POST["clave"],$_POST["mail"],$_POST["localidad"]);
		
		if(Usuario::Add($nuevoUsuario))
		{
			echo "Usuario agregado con exito!!\n";
		}
		else
		{
			echo "El usuario no se pudo agregar\n";
		}
	}
	else
	{
		echo "Hay campos sin rellenar!!!\n";
	}

	


?>