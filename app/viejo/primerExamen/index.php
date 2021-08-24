<?php

/*

Nicolas Eduardo Perez

A- (1 pt.) index.php:Recibe todas las peticiones que realiza el postman, y administra a que archivo se debe incluir.
B- (1 pt.) HeladoCarga.php: (por GET)se ingresa Sabor, precioBruto, Tipo (“agua” o “crema”), cantidad( de
unidades de palitos helados) el objeto helado tiene función que guarda el precio más IVA en el atributo
precioFinal. Se guardan los datos en en el archivo de texto helados.json, tomando un id autoincremental como
identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.
Validar que los valores sean válidos.
2-
(1pt.) HeladoConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo
helados.json, retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.*/

if(isset($_GET["Sabor"]))
{
	require "HeladosCarga.php";
}
elseif(isset($_POST["Sabor"]))
{
	require "HeladoConsultar.php";
}






?>