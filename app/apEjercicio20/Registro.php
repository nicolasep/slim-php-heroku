<?php

include "Usuario.php";
/*
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



	$nuevoUsuario = new Usuario($_POST["nombre"],$_POST["clave"],$_POST["mail"]);
	//$nuevoUsuar = new Usuario();
	
	if(Usuario::Add($nuevoUsuario))
	{
		return "Usuario agregado con exito!!<br/>";
	}
	else
	{
		return "El usuario no se pudo agregar<br/>";
	}


?>