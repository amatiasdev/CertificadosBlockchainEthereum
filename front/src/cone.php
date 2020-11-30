<?php
$mysqli = new mysqli("localhost", "root", "", "ingles_tesi");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli = new mysqli("localhost", "root", "", "ingles_tesi", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>