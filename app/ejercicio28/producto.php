<?php

//require "AccesoDatos.php";
include_once "AccesoDatos.php";
class Producto
{
	private $id;
	public $codigo_de_barra;
	public $nombre;
	public $tipo;
	public $stock;
	public $precio;
	public $fecha_de_creacion;
	public $fecha_de_modificacion;

	
	public function __construct($codigo_de_barra,$nombre, $tipo, $stock,$precio,$fecha_de_creacion=null,
								$fecha_de_modificacion=null,$id=null)
	{

		$this->codigo_de_barra = $codigo_de_barra;
		$this->nombre = $nombre;
		
		$this->tipo = $tipo;
		$this->stock = $stock;
		$this->precio = $precio;
		if($fecha_de_creacion == null)
		{
			$this->fecha_de_creacion = date("Y-m-d");
		}
		

		if($fecha_de_modificacion == null)
		{
			$this->fecha_de_modificacion = date("Y-m-d");
		}
		

		if($id != null)
		{
			$this->id = id;
		}
		
	}
	static function RetornarProductos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from producto");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Producto");

	}

	private function ValidarProducto()
	{
		$estado = false;

		if(!(empty($this->codigo_de_barra))&& !(empty($this->nombre))&& !(empty($this->precio))
			&& !(empty($this->tipo))&& !(empty($this->stock)))
		{
			$estado = true;	
		}
		
		return $estado;
	}

	public function Add()
	{
		
		if($this->ValidarProducto())
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into producto (codigo_de_barra, nombre,tipo,stock,precio,fecha_de_creacion,fecha_de_modificacion)values(:codigo_de_barra,:nombre,:tipo,:stock,:fecha_de_creacion,:fecha_de_modificacion)");

				$consulta->bindValue(':codigo_de_barra',$this->codigo_de_barra, PDO::PARAM_STR);
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
				$consulta->bindValue(':stock', $this->stock, PDO::PARAM_INT);
				$consulta->bindValue(':precio',$this->precio, PDO::PARAM_INT);
				$consulta->bindValue(':fecha_de_creacion',$this->fecha_de_creacion, PDO::PARAM_STR);
				$consulta->bindValue(':fecha_de_modificacion',$this->fecha_de_modificacion, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
			
			//return true;
		}

		return false;
	}

	public function ListarProducto()
	{
		return "<li>". $this->id." ".$this->codigo_de_barra." ".$this->nombre." ".$this->tipo." ".$this->stock." ".$this->precio." ".$this->fecha_de_creacion." ".$this->fecha_de_modificacion."</li>"."\n";
	}

}

?>