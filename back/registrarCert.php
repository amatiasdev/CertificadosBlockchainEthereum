<?php 
	require_once 'procPDF2.php'; 
	header("Content-Type: application/json; charset=UTF-8");
	$rest_json = file_get_contents("php://input");
	$_POST = json_decode($rest_json, true); 
	$matriculaAl=htmlentities($_POST['ma']);
	$conNo=htmlentities($_POST['conNo']);
	$libroNo=htmlentities($_POST['libro']);
	$fojas=htmlentities($_POST['fojas']);
	$folio=htmlentities($_POST['folio']); 
	echo json_encode (createPDF($matriculaAl,$conNo, $libroNo, $fojas)); 
?>