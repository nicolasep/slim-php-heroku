<?php

include "Usuario.php";
/*
Nicolas Eduardo Perez
Aplicación Nº 20 (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario
*/

	$nuevoUsuario;


	if(isset($_POST["nombre"])&&isset($_POST["clave"])&&isset($_POST["mail"]))
	{

		$nuevoUsuario = new Usuario($_POST["nombre"],$_POST["clave"],$_POST["mail"]);
		
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