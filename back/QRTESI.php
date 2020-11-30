<?php 
session_start();
if(isset($_SESSION['transactionHash'])){

  header('Content-Type: image/png');

  $hashIPFS=$_SESSION['hash'];
  $txID=$_SESSION["transactionHash"];
  $from=$_SESSION["from"];
  $network=$_SESSION["n"];
  $hashIPFS=hex2bin($hashIPFS);
  if($network=='m'){
        $contractAddress="0xe2ec217dce9fbfbdbd6802b062d1bb2f99480ed2";
        $addressTesi="0x9d0616b594d1d189a61194d2b8aa4717555c99e4";
  }else{
    $contractAddress="0xe2ec217dce9fbfbdbd6802b062d1bb2f99480ed2";
    $addressTesi="0x9d0616b594d1d189a61194d2b8aa4717555c99e4";
  }
  

    if($txID!='' && $addressTesi==$from){

    $dataURL = 'http://tesi.org.mx/dir/certificados.php?hashtx='.$txID.'&n='.$network;
    $size = '200x200';
    $logo =  'LTesi.png';

    $Medium='C:/xampp/htdocs/CertificadosBlockchainEthereum/back/HELVETICANEUELTSTD-MD.OTF';
    $Black='C:/xampp/htdocs/CertificadosBlockchainEthereum/back/HELVETICANEUELTSTD-BLK.OTF';
    $BlackCondensed='C:/xampp/htdocs/CertificadosBlockchainEthereum/back/HELVETICANEUELTSTD-BLKCN.OTF';
    $MediumCondensed='C:/xampp/htdocs/CertificadosBlockchainEthereum/back/HELVETICANEUELTSTD-MDCN.OTF';

    //$from='0x95eD48b7EF3C298C8214Eb21E368E70E7A4Dd250';
    //$txID='0x11a3012a4f7606a6eebf876104c2e36d39c82f17b3f29a43946ccbf17073b851';
    $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($dataURL));
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


      $img =imagecreatefrompng("https://ipfs.io/ipfs/".$hashIPFS);
      imagecopyresampled($img, $QR, 14, 520, 0, 0, 150, 150, 200, 200);


      imagettftext($img, 10, 0, 179, 535, 0x4f585a, $Medium, 'ESCANEE ÉSTE CÓDIGO QR');

      imagettftext($img, 10, 0, 205, 555, 0x4f585a, $Medium, 'PARA VALIDAR LA ');

      imagettftext($img, 10, 0, 188, 575, 0x4f585a, $Medium, 'AUTENTICIDAD DE ESTE');

      imagettftext($img, 10, 0, 217, 595, 0x4f585a, $Medium, 'CERTIFICADO.');


      imagettftext($img, 10, 0, 170, 614, 0x4f585a, $MediumCondensed, 'FIRMADO POR:');

      imagettftext($img, 10, 0, 255, 614, 0x4f585a, $BlackCondensed, $from);

      imagettftext($img, 10, 0, 170, 633, 0x4f585a, $MediumCondensed, 'BLOCKCHAIN TRANSACTION HASH:');

      imagettftext($img, 10, 0, 170, 650, 0x4f585a, $BlackCondensed, $txID );

      imagepng($img);
      imagedestroy($QR);
      imagedestroy($img);
     
    }else{
    
    $im = imagecreatefrompng('NotFound.png');
    imagepng($im);
    imagedestroy($im);
    }
}

 session_unset();
  session_destroy();

?>