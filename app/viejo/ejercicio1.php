<?php

/*
NICOLAS EDUARDO PEREZ
Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/


$acumulador = 0;
$contador = 1;

do
 {
	
	if(($acumulador+$contador) < 1000)
	{
		printf("a %d se suma a %d <br/>",$acumulador,$contador);
		$acumulador += $contador;
		$contador++;
	}
	else
	{
		break;
	}
	
	
}while (1);

printf("La cantidad de numeros sumados es: %d y la suma total es: %d",$contador,$acumulador);


?>