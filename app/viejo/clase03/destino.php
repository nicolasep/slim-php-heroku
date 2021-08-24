<?php

include "Usuario.php";
/*
echo "Array get: ";
var_dump($_GET);

echo "<br/>";
echo "Array post: ";
var_dump($_POST);*/

/*
if(isset($_POST["usuario"]))
{
	$usuarioIngresado = $_POST["usuario"];
	$claveIngresada = $_POST["clave"];
	if($usuarioIngresado == "admin" && $claveIngresada == 1234)
	{
		echo "OK";
	}
	else
	{
		echo "Usuario no registrado";
	}
}
else 
{
	echo "Faltan datos";
	# code...
}*/
$nuevoUsuario = new Usuario();
$nuevoUsuario->_usuario = $_POST["usuario"];
$nuevoUsuario->_clave = $_POST["clave"];



echo Usuario::ValidarUsuario($nuevoUsuario);

?>