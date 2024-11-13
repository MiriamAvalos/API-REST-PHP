<?php
// Parámetros de conexión a Clever Cloud
$servername = "btvax3f1faoz6dli8zrx-mysql.services.clever-cloud.com";
$username = "uwn4oeduomhguidh"; 
$password = "9fZhJdADyQ3edlVjPTaJ";  
$dbname = "btvax3f1faoz6dli8zrx";  
$port = 3306;  


$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$conn->set_charset("utf8");


echo "Conexión exitosa a la base de datos";

?>
