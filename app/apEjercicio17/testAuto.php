<?php
include "Auto.php";


$au1 = new Auto("fiat", "rojo");
$au2 = new Auto("fiat", "rojo");

$au3 = new Auto("ferrari", "verde", 30000);
$au4 = new Auto("ferrari", "verde", 20000);

$au5 = new Auto("mclaren", "azul", 60000, new DateTime());

$au3->AgregarImpuesto(1500);
$au4->AgregarImpuesto(1500);
$au5->AgregarImpuesto(1500);

echo "La suma del auto1 y auto 2 es: ", Auto::Add($au1, $au2), "<br/>";


echo "<br/>";
echo "Los autos 1,2 y son iguales? : ", ($au1->Equals($au2) && $au1->Equals($au5)), "<br/>";

for ($i = 1; $i <= 5; $i++) 
{
    if (!($i % 2 == 0)) {
        Auto::MostrarAuto("au", $i);
    }
}




?>