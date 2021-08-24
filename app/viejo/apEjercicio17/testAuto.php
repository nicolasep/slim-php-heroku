<?php


//Ejercicio 19
//Nicolas Eduardo Perez

include "Auto.php";


$au1 = new Auto("fiat", "rojo");
$au2 = new Auto("fiat", "rojo");

$au3 = new Auto("ferrari", "verde", 30000);
$au4 = new Auto("ferrari", "verde", 20000);

$au5 = new Auto("mclaren", "azul", 60000, new DateTime());

$au3->AgregarImpuesto(1500);
$au4->AgregarImpuesto(1500);
$au5->AgregarImpuesto(1500);

$suma = Auto::Add($au1, $au2);
echo "La suma del auto1 y auto 2 es: ", $suma, "<br/>";
echo Auto::MostrarAuto($au3), "<br/>";
echo Auto::MostrarAuto($au4), "<br/>";
echo Auto::MostrarAuto($au5), "<br/>";
echo "<br/>";
echo "Los autos 1,2 y 5 son: ";


if ($au1->Equals($au5) && $au1->Equals($au2)) 
{
    echo "son iguales <br/>";
}
else 
{
    echo "son distintos <br/>";
}
$autos = array($au1, $au2, $au3, $au4, $au5);

echo "Los autos impares son: <br/>";
$i = 1;
foreach ($autos as $auto) {

    if (($i % 2 != 0)) {

        echo Auto::MostrarAuto($auto);
    }
    $i++;
}





?>