<?php

include "Usuario.php";
/*
Nicolas Eduardo Perez
Aplicación Nº 29( Login con bd)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado en la
base de datos,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario.
*/

$nuevoUsuario;
$arrayUsuarios;
$noEncontrado = -1;

	if(isset($_POST["clave"])&&isset($_POST["mail"]))
	{
		$arrayUsuarios = Usuario::RetornarUsuarios();
		$nuevoUsuario = new Usuario($_POST["clave"],$_POST["mail"]);

		foreach ($arrayUsuarios as $usu) 
		{
			if(($noEncontrado=$nuevoUsuario->Equals($usu))==1)
			{
				echo "Verificado\n";
				echo $usu->ListarUsuario();
				break;
			}
			elseif($nuevoUsuario->Equals($usu)==0)
			{
				echo "Error en los datos\n";
				break;
			}
			
		}
		if($noEncontrado == -1)
		{
			echo "Usuario no registrado\n";
		}
		
	}
	else
	{
		echo "Hay campos sin rellenar!!!\n";
	}
?>