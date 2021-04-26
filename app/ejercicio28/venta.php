<?php

//require "AccesoDatos.php";
include_once "AccesoDatos.php";
class Venta
{
	private $id;
	public $id_producto;
	public $id_usuario;
	public $cantidad;
	
	public $fecha_de_venta;
	

	
	public function __construct($id_producto,$id_usuario, $cantidad,$fecha_de_venta=null,$id=null)
	{

		$this->id_producto = $id_producto;
		$this->id_usuario = $id_usuario;
		$this->cantidad = $cantidad;
		
		if($fecha_de_venta == null)
		{
			$this->fecha_de_venta = date("Y-m-d");
		}
		

		if($id != null)
		{
			$this->id = id;
		}
		
	}
	static function RetornarVentas()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from venta");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Venta");

	}

	private function ValidarVenta()
	{
		$estado = false;

		if(!(empty($this->id_producto))&& !(empty($this->id_usuario))&& !(empty($this->cantidad))
			&& !(empty($this->fecha_de_venta)))
		{
			$estado = true;	
		}
		
		return $estado;
	}

	public function Add()
	{
		
		if($this->ValidarVenta())
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into producto (id_producto, id_usuario,cantidad,fecha_de_venta)values(:id_producto,:id_usuario,:cantidad,:fecha_de_venta)");

				$consulta->bindValue(':id_producto',$this->id_producto, PDO::PARAM_INT);
				$consulta->bindValue(':id_usuario',$this->id_usuario, PDO::PARAM_INT);
				$consulta->bindValue(':cantidad',$this->cantidad, PDO::PARAM_INT);
				$consulta->bindValue(':fecha_de_venta', $this->fecha_de_venta, PDO::PARAM_STR);
				
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
			
			//return true;
		}

		return false;
	}

	public function ListarVenta()
	{
		return "<li>".$this->id." ".$this->id_producto." ".$this->id_usuario." ".$this->cantidad." ".$this->fecha_de_venta."</li>"."\n";
	}

}

?>