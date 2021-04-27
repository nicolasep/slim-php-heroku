<?php

//require "AccesoDatos.php";
include_once "AccesoDatos.php";
//include_once "producto.php";
//include_once "Usuario.php";
class Venta
{
	private $id;
	public $id_producto;
	public $id_usuario;
	public $cantidad;
	public $fecha_de_venta;
	
	static function RetornarVentasConNombreProducto()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT venta.id as id, producto.nombre as producto, usuario.nombre as usuario, venta.cantidad as cantidad FROM  producto, usuario INNER JOIN venta WHERE venta.id_usuario = usuario.id AND venta.id_producto = producto.id");
		$consulta->execute();	

		return $consulta->fetchAll(PDO::FETCH_BOTH);
	}
	static function RetornarCantidadVendida($fechaIni,$fechaFin)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT SUM(cantidad) FROM venta WHERE fecha_de_venta BETWEEN :inicio AND :fin");
		$consulta->bindValue(':inicio', $fechaIni, PDO::PARAM_STR);
		$consulta->bindValue(':fin', $fechaFin, PDO::PARAM_STR);
		$consulta->execute();	

		return $consulta->fetch(PDO::FETCH_BOTH);
	}
	static function RetornarLosPrimerosNumeroDeProductos($cantidad)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id_producto as Producto FROM venta LIMIT :cantidad");
		$consulta->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
		$consulta->execute();	

		return $consulta->fetchAll(PDO::FETCH_BOTH);
	}
	static function RetornarUsuarioYProductoDeVenta()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT  usuario.nombre as usuario ,producto.nombre as producto FROM  producto, usuario INNER JOIN venta WHERE venta.id_usuario = usuario.id AND venta.id_producto = producto.id");
		$consulta->execute();	

		return $consulta->fetchAll(PDO::FETCH_BOTH);
	}
	static function RetornarMontoDeCadaVenta()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT venta.id as id, producto.precio*venta.cantidad as monto FROM  producto, venta WHERE venta.id_producto = producto.id");
		$consulta->execute();	

		return $consulta->fetchAll(PDO::FETCH_BOTH);
	}
	static function RetornarCantidadVendidaPorUsuario($id_usuario,$producto)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT SUM(cantidad) as cantidad FROM venta WHERE id_producto = :producto AND id_usuario = :usuario");
		$consulta->bindValue(':producto', $producto, PDO::PARAM_INT);
		$consulta->bindValue(':usuario', $id_usuario, PDO::PARAM_INT);
		$consulta->execute();	

		return $consulta->fetch(PDO::FETCH_BOTH);
	}
	static function RetornarVentasDeUsuarioPorLocalidad($localidad)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT venta.id_producto FROM venta,usuario WHERE venta.id_usuario = usuario.id AND usuario.localidad = :localidad");
		$consulta->bindValue(':localidad', $localidad, PDO::PARAM_STR);
		$consulta->execute();	

		return $consulta->fetchAll(PDO::FETCH_CLASS,"Venta");
	}







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
	function __construct3($id_producto,$id_usuario, $cantidad,$fecha_de_venta=null,$id=null)
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
	public function AgregarVenta()
	{
		
		if($this->ValidarVenta())
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into venta (id_producto, id_usuario,cantidad,fecha_de_venta)values(:id_producto,:id_usuario,:cantidad,:fecha_de_venta)");

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
		return $this->id." ".$this->id_producto." ".$this->id_usuario." ".$this->cantidad." ".$this->fecha_de_venta."\n";
	}

}

?>