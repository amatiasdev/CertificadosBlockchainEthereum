<?php 
$mysqli = new mysqli("localhost", "root", "", "sicoes", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}else{
	
$mysqli->set_charset("utf8");
}

?>