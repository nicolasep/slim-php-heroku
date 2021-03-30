<?php

include "Garage.php";


$miGarage = new Garage("mi garage",150);

$auto1 = new Auto("fiat","negro",50000,new DateTime());
$auto2 = new Auto("ferrari","rojo",1050000,new DateTime());
$auto3 = new Auto("pagani","azul",150000,new DateTime());

$miGarage->Add($auto1);
$miGarage->Add($auto2);
$miGarage->Add($auto3);

echo $miGarage->MostrarGarage();


?>