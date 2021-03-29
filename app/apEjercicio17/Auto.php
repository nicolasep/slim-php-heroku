<?php

class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct()
    {
        $param = func_get_args();

        $num = func_num_args();

        $funcionConstructor = "__construct" . $num;

        if (method_exists($this, $funcionConstructor)) {
            call_user_func_array(array($this, $funcionConstructor), $param);
        }

    }

    function __construct2($marca, $color)
    {
        $this->__construct3($marca, $color, 0);
    }
    function __construct3($marca, $color, $precio)
    {
        $this->__construct4($marca, $color, 0, new DateTime());
    }
    function __construct4($marca, $color, $precio, $fecha)
    {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
    }
    public function AgregarImpuesto($impuesto)
    {
        $this->_precio += $impuesto;
    }
    static function MostrarAuto($au)
    {
        $resul = $au->_marca . " " . $au->_color . " " . $au->_precio . " " . $au->_fecha . "<br/>";
        return $resul;
    }
    public function Equals(Auto $auto2)
    {
        if ($this->_marca == $auto2->_marca) {
            return true;
        }
        return false;
    }
    static function Add(Auto $au1, Auto $au2)
    {
        if ($au1->Equals($au2) && $au1->_color == $au2->_color) {
            return $au1->_precio + $au2->_precio;
        }
        else {
            return 0;
        }
    }
}

?>