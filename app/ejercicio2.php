<?php

/*
NICOLAS EDUARDO PEREZ
Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/

$tiempo = date("F j, Y");
echo $tiempo;
echo "<br/>";
echo "<br/>";

$tiempo = date("j n Y");
echo $tiempo;
echo "<br/>";
echo "<br/>";

$tiempo = date("Ymd");
echo $tiempo;
echo "<br/>";
echo "<br/>";

$dia = date("j");

$mes = date("n");


switch (($mes)) {
	case '1':
	case '2':
		echo "Es verano";
		break;
	case '3':
		if($dia<='20')
		{
			echo "Es verano";
		}
		else
		{
			echo "Es otoño";
		}
		break;
	case '4':
	case '5':
		echo "Es otoño";
		break;
	case '6':
		if($dia<='20')
		{
			echo "Es otoño";
		}
		else
		{
			echo "Es invierno";
		}
		break;
	case '7':
	case '8':
		echo "Es invierno";
		break;
	case '9':
		if($dia<='20')
		{
			echo "Es invierno";
		}
		else
		{
			echo "Es primavera";
		}
		break;
	case '10':
	case '11':
		echo "Es primavera";
		break;
	case '12':
		if($dia<='20')
		{
			echo "Es primavera";
		}
		else
		{
			echo "Es verano";
		}
		break;
		
}


?>