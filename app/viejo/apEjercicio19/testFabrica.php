<?php

include "Fabrica.php";

$fa = new Fabrica("italsur");

$op1 = new Operario(1, "per", "nico", 20300);
$op2 = new Operario(2, "lensi", "ivan", 50400);
$op3 = new Operario(3, "minu", "cris", 35205);
echo "Muestro nombre y apellido del empleado 1: ", $op1->GetNombreApellido(), "<br/>";
echo "<br/>Muestro todos los datos del empleado 1: <br/>", $op1->Mostrar();
echo "<br/>";

$fa->Add($op1);
$fa->Add($op2);
$fa->Add($op3);


echo "<br/>";

echo "<br/> Muestro los empleados: <br/>";
echo $fa->Mostrar();
echo Fabrica::MostrarCosto($fa);
echo "<br/>";

$fa->Remove($op1);
echo "<br/>";
echo "Muestro despues Despues de eliminar el primero <br/>";
echo $fa->Mostrar();
echo "<br/>";
echo Fabrica::MostrarCosto($fa);

$op1->SetAumentarSalario(10);
echo "<br/>";
echo "<br/>Aumento 10% el sueldo del empleado 1";
echo "<br/>", $op1->Mostrar(), "<br/>";
$fa->Add($op1);
echo "<br/>";

echo "Agrego al empleado 1 con aumento de sueldo y muestro la fabrica<br/>";
echo $fa->Mostrar();
echo Fabrica::MostrarCosto($fa);

?>