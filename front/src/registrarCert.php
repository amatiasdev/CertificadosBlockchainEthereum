<?php 


	require_once 'cone.php';
	require_once 'index.php';
	
///SELECT
// 	$stmt = $mysqli->prepare("SELECT matricula FROM alumnos WHERE matricula = ?");
// 	$matricula=201426274;
// $stmt->bind_param("i",$matricula);
// $stmt->execute();
// $result = $stmt->POST_result();
// while($row = $result->fetch_assoc()) {
//   echo $row['matricula'];
// }
// $stmt->close();

$matriculaAl=$_POST['ma'];
$conNo=$_POST['conNo'];
$libroNo=$_POST['libro'];
$fojas=$_POST['fojas'];
$folio=$_POST['folio'];
$fecha=date("Y/m/d");

$stmt = $mysqli->prepare("INSERT INTO certificados (conNo, libroNo, fojas, fecha, folio, matriculaAl) VALUES(?,?,?,?,?,?)");
$stmt->bind_param("isisii", $conNo, $libroNo, $fojas, $fecha, $folio, $matriculaAl);
$stmt->execute();
$newId = $stmt->insert_id;
$stmt->close();


createPDF($matriculaAl,$conNo, $libroNo, $fojas, $fecha);



/*
//UPDATE
$stmt = $mysqli->prepare("UPDATE certificados SET libroNo = ? WHERE idcertificados = ?");
$s=5;
$d="078";
$stmt->bind_param('si',$d,$s);
$stmt->execute(); 
$stmt->close();

*//*
$stmt = $mysqli->prepare("DELETE FROM certificados WHERE idcertificados = ?");
$s=5;
$stmt->bind_param('i', $s);
$stmt->execute(); 
$stmt->close();*/
?>