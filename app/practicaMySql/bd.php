<?php



$mysqli = new mysqli("127.0.0.1", "root", "", "utn");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

    
    
}
//$lista = $mysqli->msql_query("SELECT * FROM usuario");
$lista = $mysqli->query("SELECT * FROM usuario");
//echo $mysqli->host_info . "\n";
while ($result = $lista->fetch_assoc()) {
	//var_dump($result);
	echo "id:". $result['id']." ".$result['nombre']." ".$result['apellido']."<br/>";
}
echo"-----------";

if($mysqli->close())
{
	echo"<br/>---cerro-------";
}

?>