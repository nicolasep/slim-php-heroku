<?php
include "Usuario.php";
/*
Nicolas Eduardo Perez
Aplicación Nº 32(Modificacion BD)
Archivo: ModificacionUsuario.php
método:POST
Recibe los datos del usuario(nombre, clavenueva, clavevieja,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer la modificación,
guardando los datos la base de datos
retorna si se pudo agregar o no.
Solo pueden cambiar la clave
*/

if(isset($_POST["nombre"])&&isset($_POST["claveNueva"])&&isset($_POST["claveVieja"])&&isset($_POST["mail"]))
{
	$usuario = new Usuario($_POST["nombre"],(int)$_POST["claveVieja"],$_POST["mail"]);
	if($usuario->ModificarClave($_POST["claveNueva"]))
	{
		echo "Clave modificada con exito";
	}
	else
	{
		echo "No se pudo modificar la clave";
	}
}



?>