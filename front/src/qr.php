<?php
require_once('../vendor/autoload.php');
$data = 'http://tesi.org.mx/dir/documentacion.html';
$size = '200x200';
$logo =  'LTesi.png';
//header('Content-type: image/png');
// Get QR Code image from Google Chart API
// http://code.google.com/apis/chart/infographics/docs/qr_codes.html
$matricula=201426274;
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
imagepng($QR,"qrs/".$matricula.".png");
imagedestroy($QR);


$mpdf = new \Mpdf\Mpdf(); 
$css=file_get_contents('plantillas/style.css');
$plantilla=file_get_contents('plantillaQr.html');
$plantilla = str_replace("+nombreQr", $matricula.".png" , $plantilla);


$mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
//$mpdf->Output();
//$mpdf->Output('matricula.pdf' ,\Mpdf\Output\Destination::DOWNLOAD);
$mpdf->Output('matricula.pdf' ,'I');


?>