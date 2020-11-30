<?php 
require_once('../vendor/autoload.php');
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
include "plantillaFinal.php";
$template = ob_get_contents();
ob_end_clean();
$css=file_get_contents('css/style.css');
$mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($template,\Mpdf\HTMLParserMode::HTML_BODY);
//echo $template;
$mpdf->Output('matricula.pdf' ,'I'); 
?>