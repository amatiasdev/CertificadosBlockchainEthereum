<?php

 header('Content-Type: image/png');

 $rest_json = file_get_contents("php://input");
 $_POST = json_decode($rest_json, true);

$matriculaAl=htmlentities($_POST['ma']);
$folio=htmlentities($_POST['folio']);

// $stmt = $mysqli->prepare("SELECT a.matricula, a.nombres, a.apellidoP, a.apellidoM, b.nombre  as carrera, c.nombre, c.asignatura, IF(d.periodo IS NULL,'****',d.periodo) AS periodo, IF(defin IS NULL,'**',defin) AS defin,IF(d.tipo IS NULL,'***',d.tipo) AS tipo , c.cred, sum(if(defin >=7, c.cred, 0)) AS creditos_cumplidos FROM sicoes.alumnos a INNER JOIN   sicoes.asignaturas c ON c.carrera=a.carrera  LEFT JOIN  sicoes.calif d ON d.asignatura=c.asignatura AND d.matricula=a.matricula  INNER JOIN sicoes.carreras b ON b.idcarrera= a.carrera WHERE a.matricula=? GROUP BY c.asignatura;");
// $matricula=201426274;
// $stmt->bind_param("i",$matricula);

// $stmt-> execute();
// $result = $stmt->get_result();
// $stmt->close();
// while($row = $result->fetch_assoc()) {
//   $ids[] = $row['matricula'];
//   $nombresAl[]=$row['nombres'];
//   $apellidoPAl[]=$row['apellidoP'];
//   $apellidoMAl[]=$row['apellidoM'];
//   $arrayperiodo[]=$row['periodo'];
//   $arrayORD[]=$row['tipo'];
//   $arrayCalificacion[]=$row['defin'];
//   $carrera[]=$row['carrera'];
// }

$nombreAl='ALDO RAFAEL MATIAS ORTIZ';
$promedioAl='85';
$creditosCursados='260';
$totalCreditos='260';
$materiasCursadas='53';
$totalMaterias='53';
$codigoCarrera='ISIC-2010-224';
$fechaInicio='05 DE SEP. DE 2012';
$diaFinal='05';
$mesAgnioFinal='DIC DE 2019';
$fechaExpedicionCert='A LOS 14 DÍAS DEL MES DE JUNIO DE 2019.';


 $im = imagecreatefrompng('Template.png');

 $Black='C:/xampp/htdocs/CertificadosBlockchainEthereum/back/HELVETICANEUELTSTD-BLK.OTF';
 $BlackCondensed='C:/xampp/htdocs/CertificadosBlockchainEthereum/back/HELVETICANEUELTSTD-BLKCN.OTF';
 $MediumCondensed='C:/xampp/htdocs/CertificadosBlockchainEthereum/back/HELVETICANEUELTSTD-MDCN.OTF';


//$w = imagesx($qr);
//$h = imagesy($qr);

// place some text (top, left)
imagettftext($im, 30, 0, 165, 295, 0x4f585a, $Black, $nombreAl);

imagettftext($im, 18, 0, 500, 349, 0x4f585a, $BlackCondensed, $matriculaAl);
// SI ES 100 imagettftext($im, 16, 0, 445, 398, 0x4f585a, $BlackCondensed, '100');
imagettftext($im, 16, 0, 450, 398, 0x4f585a, $BlackCondensed, $promedioAl);

imagettftext($im, 14, 0, 380, 442, 0x4f585a, $BlackCondensed, $creditosCursados);

imagettftext($im, 14, 0, 611, 442, 0x4f585a, $BlackCondensed, $totalCreditos);

imagettftext($im, 14, 0, 666, 442, 0x4f585a, $BlackCondensed, $materiasCursadas);

imagettftext($im, 14, 0, 911, 442, 0x4f585a, $BlackCondensed, $totalMaterias);

imagettftext($im, 13, 0, 335, 462, 0x4f585a, $BlackCondensed, $codigoCarrera);

imagettftext($im, 13, 0, 755, 462, 0x4f585a, $MediumCondensed, $fechaInicio);

imagettftext($im, 13, 0, 916, 462, 0x4f585a, $MediumCondensed, $diaFinal);

imagettftext($im, 13, 0, 156, 481, 0x4f585a, $MediumCondensed, $mesAgnioFinal);

imagettftext($im, 13, 0, 502, 481, 0x4f585a, $MediumCondensed, $fechaExpedicionCert);

imagettftext($im, 13, 0, 76, 508, 0xc93852, $MediumCondensed, $folio);

imagepng($im);
imagedestroy($im);
?>


