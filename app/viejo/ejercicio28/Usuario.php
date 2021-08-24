<?php

require "AccesoDatos.php";
//include_once "AccesoDatos.php";

class Usuario
{
	public $id;
	public $nombre;
	public $apellido;
	public $clave;
	public $mail;
	public $localidad;
	public $fecha_de_registro;

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
    function __construct3($nombre,$apellido, $clave, $mail,$localidad,$fecha_de_registro=null,$id=null)
    {
        $this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->clave = $clave;
		$this->mail = $mail;
		$this->localidad = $localidad;

		if($fecha_de_registro == null)
		{
			$this->fecha_de_registro = date("Y-m-d");
		}
		else
		{
			$this->fecha_de_registro = $fecha_de_registro;
		}
		
		if($id != null)
		{
			$this->id = $id;
		}
    }
    
	/*
	public function __construct($nombre==null,$apellido==null, $clave==null, $mail==null,$localidad==null,$fecha_de_registro=null,$id=null)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->clave = $clave;
		$this->mail = $mail;
		$this->localidad = $localidad;

		if($fecha_de_registro == null)
		{
			$this->fecha_de_registro = date("Y-m-d");
		}
		else
		{
			$this->fecha_de_registro = $fecha_de_registro;
		}
		
		if($id != null)
		{
			$this->id = $id;
		}
		
		
	}*/
	static function RetornarUsuarios()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
		
	}

	private function ValidarUsuario()
	{
		$estado = false;

		if(!(empty($this->nombre))&& !(empty($this->clave))&& !(empty($this->mail)))
		{
			$estado = true;	
		}
		
		return $estado;
	}

	public function Add()
	{
		
		if($this->ValidarUsuario())
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,apellido,clave,mail,fecha_de_registro)values(:nombre,:apellido,:clave,:mail,:fecha_de_registro)");

				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':apellido',$this->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':clave',$this->clave, PDO::PARAM_INT);
				$consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
				$consulta->bindValue(':fecha_de_registro',$this->fecha_de_registro, PDO::PARAM_STR);
				$consulta->execute();		
				//return $objetoAccesoDato->RetornarUltimoIdInsertado();
			
			return true;
		}

		return false;
	}

	public function ListarUsuario()
	{
		return "<li>".$this->id." ".$this->nombre." ".$this->apellido." ".$this->clave." ".$this->mail." ".$this->fecha_de_registro."</li>"."\n";
	}

}

?>