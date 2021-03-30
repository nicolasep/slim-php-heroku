<?php

/* NICOLAS EDUARDO PEREZ  
Aplicación No 5 (Números en letras)  Realizar un programa que en base al valor numérico de una variable $num,  pueda mostrarse por pantalla, el nombre del número que tenga dentro escrito con palabras,  para los números entre el 20 y el 60. Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”. */

$num = "22";

$resultadoUnidades;


$decenas = substr($num, 0, 1);
$unidades = substr($num, 1, 1);
switch ($decenas) 
{
    case '2':
        $resultado = "Veinte";
        break;
    case '3':
        $resultado = "Treinta";
        break;
    case '4':
        $resultado = "Cuarenta";
        break;
    case '5':
        $resultado = "Cincuenta";
        break;
    case '6':
        $resultado = "Sesenta";
        break;
}

if ($unidades != "0") 
{
    
    switch ($unidades) {
        case '1':
            $resultadoUnidades = "Uno";
            break;
        case '2':
            $resultadoUnidades = "Dos";
            break;
        case '3':
            $resultadoUnidades = "Tres";
            break;
        case '4':
            $resultadoUnidades = "Cuatro";
            break;
        case '5':
            $resultadoUnidades = "Cinco";
            break;
        case '6':
            $resultadoUnidades = "Seis";
            break;
        case '7':
            $resultadoUnidades = "Siete";
            break;
        case '8':
            $resultadoUnidades = "Ocho";
            break;
        case '9':
            $resultadoUnidades = "Nueve";
            break;
    }
    if($decenas == '2')
    {
        $resultado = "Veinti".strtolower($resultadoUnidades);
    }
    else
    {
        $resultado = $resultado . " Y ".$resultadoUnidades;
    }

}

echo "El resultado es: ", $resultado;


?>