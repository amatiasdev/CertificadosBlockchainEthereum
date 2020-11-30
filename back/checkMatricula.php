<?php 
	require_once('cone.php'); 
	if($mysqli->connect_errno){ 
	}else{
		header("Content-Type: application/json; charset=UTF-8");
		$rest_json = file_get_contents("php://input");
		$_POST = json_decode($rest_json, true); 
		$matriculaAl=htmlentities($_POST['ma']);
		$stmt = $mysqli->prepare("SELECT a.matricula FROM sicoes.alumnos a WHERE a.matricula=?;");
		$stmt->bind_param("i",$matriculaAl);

		$stmt-> execute();
		$result = $stmt->get_result();
		$stmt->close();
		if($result->num_rows > 0){ 
			echo json_encode (true);
		}else{
			echo json_encode (false);
		}
	}
	
?>