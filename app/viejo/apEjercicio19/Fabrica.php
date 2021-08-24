<?php
include "Operario.php";

class Fabrica
{
	private $_cantMaxOperarios;
	private $_operarios;
	private $_razonSocial;

	public function __construct(string $rs)
	{
		$this->_cantMaxOperarios = 5;
		$this->_razonSocial = $rs;
		$this->_operarios = array();
	}

	public function Add(Operario $op)
	{
		
		$cantidadAnterior = count($this->_operarios);
		if($cantidadAnterior < $this->_cantMaxOperarios && $this->Equals($this,$op)==false)
		{
			array_push($this->_operarios,$op);
			if($cantidadAnterior < count($this->_operarios))
			{
				return true;
			}
		}
		
		return false;
	}
	public function Equals(Fabrica $fb,Operario $op)
	{
		foreach ($fb->_operarios as $op1) 
		{
			if($op1->Equals($op1,$op))
			{

				return true;
			}
			
		}
		return false;
	}
	public function Mostrar()
	{
		return $this->MostrarOperarios();
	}
	static function MostrarCosto(Fabrica $fb)
	{
		return "El costo total es: ".$fb->RetornarCostos();
	}
	private function MostrarOperarios()
	{
		$datos="";
		foreach ($this->_operarios as $value) {
			$datos =$datos."".$value->Mostrar()."<br/>";
		}
		return $datos;
	}
	public function Remove(Operario $op)
	{
		
		for($i=0;$i<count($this->_operarios);$i++)
		{
			if($this->Equals($this,$op))
			{
				unset($this->_operarios[$i]);
			}
			
		}
	}
	private function RetornarCostos()
	{
		$salarios=0.0;
		foreach ($this->_operarios as $operario) 
		{
			
			$salarios += $operario->GetSalario();
		}
		return $salarios;
	}

}


?>