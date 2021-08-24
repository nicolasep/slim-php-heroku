<?php

//require "AccesoDatos.php";
include_once "AccesoDatos.php";

class Producto
{
	public $id;
	public $codigo_de_barra;
	public $nombre;
	public $tipo;
	public $stock;
	public $precio;
	public $fecha_de_creacion;
	public $fecha_de_modificacion;

	public function __construct()
    {
        $param = func_get_args();

        $num = func_num_args();

        $funcionConstructor = "__construct" . $num;

        if (method_exists($this, $funcionConstructor)) {
            call_user_func_array(array($this, $funcionConstructor), $param);
        }

    }

    function __construct0()
    {
        
    }
	function __construct5($codigo_de_barra,$nombre, $tipo, $stock,$precio,$fecha_de_creacion=null,
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
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into producto (codigo_de_barra, nombre,tipo,stock,precio,fecha_de_creacion,fecha_de_modificacion)values(:codigo_de_barra,:nombre,:tipo,:stock,:precio,:fecha_de_creacion,:fecha_de_modificacion)");

			$consulta->bindValue(':codigo_de_barra',$this->codigo_de_barra, PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
			$consulta->bindValue(':stock', $this->stock, PDO::PARAM_INT);
			$consulta->bindValue(':precio',$this->precio, PDO::PARAM_INT);
			$consulta->bindValue(':fecha_de_creacion',$this->fecha_de_creacion, PDO::PARAM_STR);
			$consulta->bindValue(':fecha_de_modificacion',$this->fecha_de_modificacion, PDO::PARAM_STR);
			if($consulta->execute())
			{
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
			}		
				
		}

		return false;
	}

	public function ListarProducto()
	{
		return "<li>". $this->id." ".$this->codigo_de_barra." ".$this->nombre." ".$this->tipo." ".$this->stock." ".$this->precio." ".$this->fecha_de_creacion." ".$this->fecha_de_modificacion."</li>"."\n";
	}
	public function Equals($prod)
	{
		if($this->codigo_de_barra == $prod->codigo_de_barra && $this->nombre == $prod->nombre && 
			$this->tipo == $prod->tipo && $this->precio == $prod->precio)
		{
			return true;

		}
		return false;
	}
	public function ValidarExistencia($lista)
	{
		foreach ($lista as $prod) 
		{
			if($this->Equals($prod))
			{
				return $prod;

			}
		}

		return false;
	}
	static function BuscarProductoPorCodigo($lista,$codigo)
	{
		foreach ($lista as $prod) 
		{
			if($codigo == $prod->codigo_de_barra)
			{
				return $prod;
			}
		}
		return null;
	}
	static function BuscarProductoPorCodigoEnBd($codigo)
	{
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM producto WHERE codigo_de_barra=:codigo_de_barra");
		$consulta->bindValue(':codigo_de_barra',$codigo, PDO::PARAM_INT);
		if(!is_null($consulta->fetch(PDO::FETCH_CLASS, "Producto")))
		{
			return true;
		}
		return false;
	}
	public function DescontarStock($cantidad)
	{
		if($this->stock >= $cantidad)
		{
			$this->stock -= $cantidad;
			if($this->ModificarStockProducto())
			{
				return true;
			}
			
		}
		return false;
	}
	
	private function ModificarStockProducto()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE producto SET stock = :stock WHERE id=:idProd");
		$consulta->bindValue(':idProd',$this->id, PDO::PARAM_INT);
		$consulta->bindValue(':stock', $this->stock, PDO::PARAM_INT);
		if($consulta->rowCount()==1)
		{
			return true;
		}
		return false;

	}
	public function ModificarProductoBd()
	{
		if($this->ValidarProducto())
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE producto SET nombre = :nombre, tipo = :tipo, stock = :stock, precio = :precio, fecha_de_creacion = :fecha_de_creacion, fecha_de_modificacion = :fecha_de_modificacion WHERE codigo_de_barra = :codigo_de_barra");

			$consulta->bindValue(':codigo_de_barra',$this->codigo_de_barra, PDO::PARAM_STR);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
			$consulta->bindValue(':stock',$this->stock, PDO::PARAM_INT);
			$consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
			$consulta->bindValue(':fecha_de_creacion',$this->fecha_de_creacion, PDO::PARAM_STR);
			$consulta->bindValue(':fecha_de_modificacion',$this->fecha_de_modificacion, PDO::PARAM_STR);
			$consulta->execute();
			
			
			if($consulta->rowCount()==1)
			{
				return true;
			}		
		}

		return false;
	}

}

?>