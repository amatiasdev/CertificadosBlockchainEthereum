<?php
require_once('../vendor/autoload.php');

$rest_json = file_get_contents("php://input");
 $_POST = json_decode($rest_json, true);

 if (!empty($_POST['folio'])) {
 		$folio=htmlentities($_POST['folio']);
        $hashIPFS=htmlentities($_POST['ipfsHash']);
        $txHash=htmlentities($_POST['txHash']);
        $from=htmlentities($_POST['from']);
        $to=htmlentities($_POST['to']);
        $blockNumber=htmlentities($_POST['blockNumber']);
        $net=htmlentities($_POST['net']);

$data = 'http://tesi.org.mx/dir/certificados.php?hashtx='.$txHash.'&n='.$net;
$size = '200x200';
$logo =  'LTesi.png';

$QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));

if($logo !== FALSE){
	$logo = imagecreatefromstring(file_get_contents($logo));
	$QR_width = imagesx($QR);
	$QR_height = imagesy($QR);	
	$logo_width = imagesx($logo);
	$logo_height = imagesy($logo);	
	// Scale logo to fit in the QR Code
	$logo_qr_width = $QR_width/2;
	$scale = $logo_width/$logo_qr_width;
	$logo_qr_height = $logo_height/$scale;
	
	imagecopyresampled($QR, $logo, $QR_width/3.8, $QR_height/2.3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
}	

imagepng($QR,"qrs/".$folio.".png");
imagedestroy($QR);

$mpdf = new \Mpdf\Mpdf(); 
$css=file_get_contents('css/style.css');
$plantilla=file_get_contents('plantillaQr.html');
$plantilla = str_replace("+nombreQr", $folio.".png" , $plantilla);
$plantilla = str_replace("+Folio", $folio , $plantilla);
$plantilla = str_replace("+hashIPFS", $hashIPFS , $plantilla);
$plantilla = str_replace("+txHash", $txHash , $plantilla);
$plantilla = str_replace("+from", $from , $plantilla);
$plantilla = str_replace("+to", $to , $plantilla);
$plantilla = str_replace("+blockNumber", $blockNumber , $plantilla);
$plantilla = str_replace("+net", $net , $plantilla);


$mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
//$mpdf->Output();
//$mpdf->Output('matricula.pdf' ,\Mpdf\Output\Destination::DOWNLOAD);
$mpdf->Output($folio.'.pdf' ,'I');
 }

		
?>