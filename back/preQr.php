<?php
session_start();
require_once('../vendor/autoload.php');
require_once('cone.php');
require_once('parseLetra.php');

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
        $_SESSION['folio']=$folio;
        $_SESSION['txHash']=$txHash;
        $_SESSION['from']=$from;
        $_SESSION['to']=$to;
        $_SESSION['blockNumber']=$blockNumber;
        $_SESSION['net']=$net;
        $size = '200x200';
        $logo =  'LTesi.png';
        $clave= substr(hash('sha256',substr(hash('sha256',bin2hex($hashIPFS)),24,-30)),24,-30);
        $_SESSION['clave']=$clave;
        //$data = 'http://tesi.org.mx/dir/certificados.php?hashtx='.$txHash.'&n='.$net.'&ps='.$clave;
        $data = 'http://localhost:8080/CertificadosBlockchainEthereum/back/TESI __ Sitio __ Oficial.php?hashtx='.$txHash.'&n='.$net.'&ps='.$clave;
$QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));

if($logo !== FALSE){
    $logo = imagecreatefromstring(file_get_contents($logo));
    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);  
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);  
    $logo_qr_width = $QR_width/2;
    $scale = $logo_width/$logo_qr_width;
    $logo_qr_height = $logo_height/$scale;
    
    imagecopyresampled($QR, $logo, $QR_width/3.8, $QR_height/2.3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
}   
imagepng($QR,"qrs/".$folio.".png");
imagedestroy($QR);
$mpdfConfig = array(
                'mode' => 'utf-8', 
                'format' => 'Legal',
                'default_font_size' => 0,
                'default_font' => '',
                'margin_left' => 0, 
                'margin_right' => 10,
                'margin_header' => 0,
                'margin_footer' => 0,
                'orientation' => 'P' 
            );
$mpdf = new \Mpdf\Mpdf($mpdfConfig);
$mpdf->SetLeftMargin(0);
ob_start();
include "plantillaQr.php";
$template = ob_get_contents();
ob_end_clean();
$css=file_get_contents('css/style.css');
$mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($template,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output('matricula.pdf' ,'I');
}else{
    session_destroy();
}
?>