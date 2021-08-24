<?php
//
//$_FILE["archivo"]["tmp_name"]
//move_uploaded_file($_FILE["archivo"]["tmp_name"], $destino)


/*Aplicación Nº 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
crear un dato con la fecha de registro , toma todos los datos y utilizar sus métodos para
poder hacer el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
*/
class Usuario
{
	public $_nombre;
	public $_clave;
	public $_mail;
	public $_id;
	public $_fechaRegistro;
	
	public function __construct($nombre, $clave, $mail)
	{
		$this->_nombre = $nombre;
		$this->_clave = $clave;
		$this->_mail = $mail;
		$this->_id = rand(1,1000);
		$this->_fechaRegistro = date("d-m-y");
	}

	static function ValidarUsuario($usuario)
	{
		$estado = false;

		if(is_a($usuario, "Usuario") && !(empty($usuario->_nombre))&& !(empty($usuario->_clave))&& !(empty($usuario->_mail)))
		{
			$estado = true;	
		}
		
		return $estado;
	}

	static function Add($usuario)
	{
		
		if(Usuario::ValidarUsuario($usuario))
		{
			//$jsonArchivo = file_get_contents("usuarios.json");

			$miArchivo = fopen("usuarios.json", "a");
			//fwrite($miArchivo, $usuario->_nombre.",".$usuario->_clave.",".$usuario->_mail."\n");
			//$jsonUs = json_encode($usuario);
			fwrite($miArchivo,json_encode($usuario,JSON_UNESCAPED_UNICODE)."\n");
			//file_put_contents($miArchivo, $jsonUs);
			
			fclose($miArchivo);
			
			
			return true;
		}
		return false;
	}
	

}

?>