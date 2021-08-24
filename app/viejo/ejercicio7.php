<?php

/*
NICOLAS EDUARDO PEREZ
Aplicación Nº 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.
*/

$numerosImpares = array();
$contador = 0;
$i = 1;

while($contador < 10)
{
	if($i%2!=0)
	{
		$numerosImpares[$contador] = $i;
		$contador++;

	}
	$i++;
}

for($j=0; $j<10;$j++)
{
	echo $numerosImpares[$j],"<br/>";
}


echo "<br/>";
echo "Con foreach <br/>";

foreach ($numerosImpares as $value) 
{
	echo $value,"<br/>";
}

echo "<br/>";
echo "Con while <br/>";

$f=0;

while ($f<count($numerosImpares)) 
{
	echo $numerosImpares[$f],"<br/>";

	$f++;
}

?>