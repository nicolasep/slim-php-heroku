<?php
/* Nicolas Eduardo Perez Aplicación Nº 18 (Auto - Garage) Crear la clase Garage que posea como atributos privados: 
_razonSocial (String) 
_precioPorHora (Double) 
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior) 
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros: 
i. La razón social. 
ii. La razón social, y el precio por hora. 
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y que mostrará todos los atributos del objeto. Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje. Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage” (sólo si el auto no está en el garaje, de lo contrario informarlo). Ejemplo: $miGarage->Add($autoUno); Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo: $miGarage->Remove($autoUno); En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los métodos.*/

include "Auto.php";

class Garage
{

	private $_razonSocial;
	private $_precioPorHora;
	private $_autos;

	public function __construct()
	{
		$parametros = func_get_args();

		$numParam = func_num_args();

		$funcionConstructor = "__construct" . $numParam;

        if (method_exists($this, $funcionConstructor)) {
            call_user_func_array(array($this, $funcionConstructor), $parametros);
        }

        
	}
	function __construct1($razonSocial)
	{
		$this->__construct2($razonSocial,0);
	}
	function __construct2($razonSocial,$precionPorHora)
	{
		$this->_razonSocial = $razonSocial;
		$this->_precioPorHora = $precionPorHora;
		$this->_autos = array();
	}
	public function Add(Auto $au)
	{
		if($this->Equals($au)==false)
		{
			array_push($this->_autos, $au);
			return true;
		}
		else
		{
			return false;
		}
	}
	public function Remove(Auto $au)
	{
		for($i=0;$i<count($this->_autos);$i++)
		{
			if($this->_autos[$i]->Equals($au))
			{
				unset($this->_autos[$i]);
				return true;
			}
		}
		return false;
	}

	public function MostrarGarage()
	{
		$datos = "Razon Social: ".$this->_razonSocial." Precio por hora: ".$this->_precioPorHora."<br/>";
		foreach($this->_autos as $auto)
		{
			$datos = $datos . Auto::MostrarAuto($auto);
		}
		return $datos;
	}
	public function Equals(Auto $au)
	{
		foreach ($this->_autos as $auto) {
			if($auto->Equals($au))
			{
				return true;
			}
		}
		return false;
	}
}


?>