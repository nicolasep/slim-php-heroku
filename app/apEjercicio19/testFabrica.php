<?php

include "Fabrica.php";
//include "Operario.php";


$fa = new Fabrica("Nicolas");

$op1 = new Operario(1,"per","nico",20300);
$op2 = new Operario(2,"lensi","ivan",50400);
$op3 = new Operario(3,"minu","cris",35205);
echo $op1->GetNombreApellido();
echo "<br/>", $op1->Mostrar();
echo "<br/>";

$fa->Add($op1);
$fa->Add($op2);
$fa->Add($op3);


echo "<br/>";
echo Fabrica::MostrarCosto($fa);
echo "<br/>";
echo $fa->Mostrar();
echo "<br/>";
$fa->Remove($op1);
echo "<br/>";
echo "Despues de eliminar el primero <br/>";
echo $fa->Mostrar();

?>