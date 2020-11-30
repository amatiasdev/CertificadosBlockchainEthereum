<?php 
session_start();
header("Content-Type: application/json; charset=UTF-8");
require_once('../vendor/autoload.php');
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$matriculaAl=htmlentities($_POST['ma']);
$_SESSION['matriculaAl']=$matriculaAl;
$mpdfConfig = array(
                'mode' => 'utf-8', 
                'format' => 'a4',
                'default_font_size' => 0,
                'default_font' => '',
                'margin_left' => 0, 
                'margin_right' => 10,
                'margin_header' => 0,
                'margin_footer' => 0,
                'margin_top' => 3,
                'orientation' => 'P' 
            );
$mpdf = new \Mpdf\Mpdf($mpdfConfig);
$mpdf->SetLeftMargin(0);
ob_start();
include "Kardex.php";
$template = ob_get_contents();
ob_end_clean();
$css=file_get_contents('css/stylesKardex.css');
$mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($template,\Mpdf\HTMLParserMode::HTML_BODY);
echo  $mpdf->Output('matricula.pdf' ,'S'); 
?>