<?php

/*
NICOLAS EDUARDO PEREZ
Aplicación Nº 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.
*/

$arrayUno = array(1 =>($arrayDos = array($arrayTres1 = array('color' => 'rojo','marca' => 'bic','trazo' => 'fino','precio' => 5.5),
	$arrayTres2 = array('color' => 'negro','marca' => 'bic','trazo' => 'grueso','precio' => 7.5),
	$arrayTres3 = array('color' => 'rojo','marron' => 'fabel','trazo' => 'fino','precio' => 9.5))));

foreach ($arrayUno as $key => $value) 
{
	foreach ($value as $key => $value2) 
	{
		echo "Lapicera <br/>";
		foreach ($value2 as $key => $value3) 
		{
			echo $key,": ", $value3,"<br/>";
		}
		echo "<br/>";
	}
}

?>