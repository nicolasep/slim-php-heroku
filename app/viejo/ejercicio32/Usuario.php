<?php

//require "AccesoDatos.php";
include_once "AccesoDatos.php";

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
    function __construct2($clave, $mail)
    {
		$this->clave = $clave;
		$this->mail = $mail;
    }
    function __construct3($nombre,$clave, $mail)
    {
    	$this->nombre = $nombre;
		$this->clave = $clave;
		$this->mail = $mail;
    }
    function __construct5($nombre,$apellido, $clave, $mail,$localidad,$fecha_de_registro=null,$id=null)
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
	public function Equals($us2)
	{
		if($this->mail == $us2->mail && $this->clave == $us2->clave)
		{
			return 1;
		}
		elseif($this->mail == $us2->mail && $this->clave != $us2->clave)
		{
			return 0;
		}
		else
		{
			return -1;
		}
	}
	public function ListarUsuario()
	{
		
		return "<li>".$this->id." ".$this->nombre." ".$this->apellido." ".$this->clave." ".$this->mail." ".$this->fecha_de_registro."</li>"."\n";
		//return $this->clave." ".$this->mail;
	}
	static function BuscarUsuarioPorId($lista,$id)
	{
		foreach ($lista as $us) 
		{
			if($us->id == $id)
			{
				return $us;
			}
		}
		return null;
	}
	public function ModificarClave($claveNueva)
	{
		if($this->ValidarUsuario())
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuario SET clave = :claveNueva WHERE nombre = :nombre AND mail = :mail AND clave = :clave");

			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':clave',$this->clave, PDO::PARAM_INT);
			$consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
			$consulta->bindValue(':claveNueva',$claveNueva, PDO::PARAM_INT);
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