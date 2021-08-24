<?php

/*Nicolas Eduardo Perez*/
include "Helado.php";

if(isset($_POST["Sabor"])&& isset($_POST["Tipo"]))
{

	$listaHelados = Helado::CargarDesdeJson("helados");

	if(!is_null($listaHelados))
	{
		if(Helado::ValidaSiExisteTipoSabor()==1)
		{
			echo "si hay";
		}
		else
		{
			echo "no existe el tipo o sabor";
		}
	}
	else
	{
		echo "No existe el tipo y sabor";
	}
}



?>