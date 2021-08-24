<?php
include "venta.php";
include "AccesoDatos.php";
/*Nicolas Eduardo Perez*/

if(isset($_POST["mail"])&& isset($_POST["sabor"])&& isset($_POST["tipo"]) && isset($_POST["cantidad"]))
{
	$nuevaVenta = new Venta($_POST["mail"],$_POST["sabor"],$_POST["tipo"],$_POST["cantidad"]);


	$destino = "./ImagenesDeLaVenta/".$_POST["tipo"].$_POST["sabor"].$_POST["mail"];
	if($nuevaVenta->GuardarEnBd()&&move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino))
	{
		echo "La venta se agregado con exito!!\n";
	}

}




?>