<?php

class Venta
{

	public $id;
	public $mail;
	public $sabor;
	public $tipo;
	public $cantidad;
	public $fecha;
	public $numeroDePedido;


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
    function __construct4($mail, $sabor,$tipo,$cantidad)
    {
    	$this->mail = $mail;
		$this->sabor = $sabor;
		$this->tipo = $tipo;
		$this->cantidad = $cantidad;
		$this->fecha = date("y-m-d");
		$this->numeroDePedido = rand(200,500);
    }
    public function GuardarEnBd()
    {
    	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (mail,sabor,tipo,cantidad,numeroDePedido,fecha)values
			(:mail,:sabor,:tipo,:cantidad,:numeroDePedido,:fecha)");

		$consulta->bindValue(':mail',$this->mail, PDO::PARAM_STR);
		$consulta->bindValue(':sabor',$this->sabor, PDO::PARAM_STR);
		$consulta->bindValue(':tipo',$this->tipo, PDO::PARAM_STR);
		$consulta->bindValue(':cantidad', $this->cantidad, PDO::PARAM_INT);
		$consulta->bindValue(':numeroDePedido',$this->numeroDePedido, PDO::PARAM_INT);
		$consulta->bindValue(':fecha',$this->fecha, PDO::PARAM_STR);
		$consulta->execute();
		if($consulta->rowCount()==1)
		{
			return true;
		}
		return false;		
    }

	
}



?>