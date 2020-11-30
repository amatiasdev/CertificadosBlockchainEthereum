<?php 
require_once('cone.php');
$matricula=htmlentities($_GET['term']);

$stmt = $mysqli->prepare("SELECT matricula FROM alumnos WHERE matricula LIKE CONCAT( ?,'%')");

$stmt->bind_param("i",$matricula);
$stmt->execute();
$matriculaArr=array();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
  $data['value']=$row['matricula'];
  array_push($matriculaArr,$data);
}
if(count($matriculaArr)==0){
	array_push($matriculaArr, "No se ha encontrado la matricula");
}

echo json_encode($matriculaArr);

 ?>