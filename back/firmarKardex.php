<?php 
session_start();
require_once('../vendor/autoload.php');
use \setasign\Fpdi\PdfParser\StreamReader; 

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true); 
$hashIPFS=htmlentities($_POST['ipfsHash']);
$txHash=htmlentities($_POST['txHash']);
$from=htmlentities($_POST['from']);
$to=htmlentities($_POST['to']);
$blockNumber=htmlentities($_POST['blockNumber']);
$net=htmlentities($_POST['net']); 
$clave= substr(hash('sha256',substr(hash('sha256',bin2hex($hashIPFS)),24,-30)),24,-30); 
$logo =  'LTesi.png';
$size = '110x110';
$data = 'http://certesi.ddns.net:8080/CertificadosBlockchainEthereum/back/TESI __ Sitio __ Oficial.php?hashtx='.$txHash.'&n='.$net;//http://tesi.org.mx/dir/kardex.php?hashtx=$txHash';
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
 
$mpdf = new \Mpdf\Mpdf();
$fileContent  = file_get_contents('https://ipfs.io/ipfs/'.$hashIPFS);
$resu =  StreamReader::createByString($fileContent);
$pagecount = $mpdf->SetSourceFile($resu);
$tplId = $mpdf->ImportPage($pagecount);
$mpdf->SetPageTemplate($tplId); 
ob_start();
imagepng($QR); 
$imagedata = ob_get_clean();   
$template = '<table class="tableTx">
          <tr>
            <td class="conTx">Hash de la Transacción:</th>
            <td class="conTx">'.$txHash.'</th>
          </tr>
          <tr>
            <td class="conTx">De:</td>
            <td class="conTx">'.$from.'</td>
          </tr>
           <tr>
            <td class="conTx">Para:</td>
            <td class="conTx">'.$to.'</td>
          </tr>
          <tr>
            <td class="conTx">Bloque número:</td>
            <td class="conTx">'.$blockNumber.'</td>
          </tr>
        </table>';
$css=file_get_contents('css/stylesKardex.css');
$mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($template,\Mpdf\HTMLParserMode::HTML_BODY); 
$mpdf->Image("data:image/jpg;base64, ".base64_encode($imagedata), 7, 250);
imagedestroy($QR);
$mpdf->Output(); 
?>