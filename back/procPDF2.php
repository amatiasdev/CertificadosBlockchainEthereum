<?php 
session_start();
function createPDF($matriculaAl,$conNo, $libroNo, $fojas)
{

require_once('../vendor/autoload.php');
require_once('cone.php');
require_once('parseLetra.php');
$mpdfConfig = array(
                'mode' => 'utf-8', 
                'format' => 'Legal',    // format - A4, for example, default ''
                'default_font_size' => 0,     // font size - default 0
                'default_font' => '',    // default font family
                'margin_left' => 0,     // 15 margin_left
                'margin_right' => 10,        // 15 margin right
                // 'mgt' => $headerTopMargin,     // 16 margin top
                // 'mgb' => $footerTopMargin,       // margin bottom
                'margin_header' => 0,     // 9 margin header
                'margin_footer' => 0,     // 9 margin footer
                'orientation' => 'P'    // L - landscape, P - portrait
            );
$_SESSION['matriculaAl']=$matriculaAl;
$_SESSION['noCertificado']=$conNo;
$_SESSION['noLibro']=$libroNo;
$_SESSION['noFojas']=$fojas;
$mpdf = new \Mpdf\Mpdf($mpdfConfig);
$mpdf->SetLeftMargin(0);
ob_start();
include "plantillaPdf2.php";
$template = ob_get_contents();
ob_end_clean();
$css=file_get_contents('css/style2.css');
$mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($template,\Mpdf\HTMLParserMode::HTML_BODY);
//echo $template;
$mpdf->Output('matricula.pdf' ,'I'); 
}
?> 