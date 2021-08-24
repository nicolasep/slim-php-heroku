<?php


class Operario
{
	private $_apellido;
	private $_legajo;
	private $_nombre;
	private $_salario;


	public function __construct(int $legajo, string $apellido, string $nombre, float $salario)
	{
		$this->_legajo = $legajo;
		$this->_apellido = $apellido;
		$this->_nombre = $nombre;
		$this->_salario = $salario;

	}


	public function Equals(Operario $op1, Operario $op2)
	{
		return ($op1->GetNombreApellido() == $op2->GetNombreApellido()) && ($op1->_legajo == $op2->_legajo);
	}

	public function GetNombreApellido()
	{
		return $this->_nombre . " " . $this->_apellido;
	}

	public function GetSalario()
	{
		return $this->_salario;
	}

	public function Mostrar()
	{

		return Operario::MostrarOp($this);
	}
	static function MostrarOp(Operario $op)
	{
		return "Legajo: " . $op->_legajo . " " . $op->GetNombreApellido() . " " . $op->GetSalario();
	}
	public function SetAumentarSalario(float $aumento)
	{
		$this->_salario += (($this->GetSalario() * $aumento) / 100);
	}

}

?>