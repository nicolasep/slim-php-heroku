<?php

/*
NICOLAS EDUARDO PEREZ
Aplicación Nº 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/

$numeros = array();
$sumaTotal = 0;
$promedio = 0.0;
$resultado = " ";

for ($i=0; $i < 5 ; $i++) {

	$numeros[$i] = rand(1,10);
	$sumaTotal += $numeros[$i];

}

$promedio = $sumaTotal / 5;


if($promedio < 6)
{
	$resultado = "El Promedio es menor a 6";
}
elseif($promedio > 6)
{
	$resultado = "El Promedio es mayor a 6";
}
else
{
	$resultado = "El Promedio es igual a 6";
}

echo $resultado,"<br/>";

?>