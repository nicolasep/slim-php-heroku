<?php
include "Usuario.php";
include_once "archivos.php";

/*
Nicolas Eduardo Perez
Aplicación Nº 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario
*/



if(isset($_POST["usuario"]) && isset($_POST["clave"]) && isset($_POST["mail"]))
{
	$usuarioVerificar = new Usuario($_POST["usuario"],$_POST["clave"],$_POST["mail"]);
	
	$arrayUsuarios = Archivos::LeerArchivo("nico");
	$respuesta=1;

	foreach ($arrayUsuarios as $us) {
		
		$respuesta = Usuario::CompararUsuarios($usuarioVerificar,$us);

		if($respuesta == 1)
		{
			echo "Verificado";
			break;
		}
		elseif($respuesta == 0)
		{
			echo "Error en los datos";
			break;
		}
		
	}
	if($respuesta == -1)
	{
		echo "Usuario no registrado";
	}


}



?>