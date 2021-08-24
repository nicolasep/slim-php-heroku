<?php

/*
NICOLAS EDUARDO PEREZ
Aplicación Nº 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.

*/
$lapicera = array('color' => 'rojo','marca' => 'bic','trazo' => 'fino','precio' => 5.5);

foreach ($lapicera as $key => $value) 
{
	echo $key,": ",$value,"<br/>";
}

?>