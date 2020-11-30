<?php 
function createPDF($matriculaAl,$conNo, $libroNo, $fojas, $fecha)
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
$mpdf = new \Mpdf\Mpdf($mpdfConfig);  
$mpdf->SetLeftMargin(0);
$css=file_get_contents('plantillas/style.css');
$plantilla=file_get_contents('index.html');
$nombreDirector="MTRO. JOSÉ ARTURO CAMACHOOOO LINARES";
$numRegistro="Registro 71-XXVI, fojas 93";
$nombreAlumno="ALDO";
$in=strlen($nombreAlumno);
for ($i=$in; $i <59 ; $i++) { 
    $nombreAlumno.="_";
}
$matricula=$matriculaAl;
$noCertificado=$conNo;
$noLibro=$libroNo;
$noFojas=$fojas;
$fechaCert=date('d/m/Y',$fecha);
echo "aqety".$fechaCert;


$nombreCarrera="SISTEMAS COMPUTACIONALES";
$promedioNum=85;
$promedioLet=decena($promedioNum);
$numCreditos=260;
$totalCreditos=260;
$numAsigna=53;
$totalAsigna=53;
$clavePlan="ARQU-2016-204";
$fechaInicio="05 SEP";
$agnioInicio=2012;
$fechaTermino="05 DIC";
$agnioTermino=2018;
$numDias="14 DÍAS";
$mes="JUNIO";
$centenaAgnio=19;

$plantilla = str_replace("+nombreDirector", $nombreDirector , $plantilla);
$plantilla = str_replace("+numRegistro",$numRegistro, $plantilla);
$plantilla = str_replace("+nombreAlumno", $nombreAlumno, $plantilla);
$plantilla = str_replace("+nombreCarrera", $nombreCarrera, $plantilla);
$plantilla = str_replace("+matricula", $matricula, $plantilla);
$plantilla = str_replace("+noCertificado", $noCertificado, $plantilla);
$plantilla = str_replace("+noLibro", $noLibro, $plantilla);
$plantilla = str_replace("+noFojas", $noFojas, $plantilla);
$plantilla = str_replace("+fechaCert", $fechaCert , $plantilla);
$plantilla = str_replace("+promedioNum",$promedioNum, $plantilla);
$plantilla = str_replace("+promedioLet", $promedioLet, $plantilla);
$plantilla = str_replace("+numCreditos", $numCreditos, $plantilla);
$plantilla = str_replace("+totalCreditos", $totalCreditos, $plantilla);
$plantilla = str_replace("+numAsigna", $numAsigna, $plantilla);
$plantilla = str_replace("+totalAsigna", $totalAsigna, $plantilla);
$plantilla = str_replace("+clavePlan", $clavePlan, $plantilla);
$plantilla = str_replace("+fechaInicio", $fechaInicio, $plantilla);
$plantilla = str_replace("+agnioInicio", $agnioInicio, $plantilla);
$plantilla = str_replace("+fechaTermino", $fechaTermino, $plantilla);
$plantilla = str_replace("+agnioTermino", $agnioTermino, $plantilla);
$plantilla = str_replace("+numDias", $numDias, $plantilla);
$plantilla = str_replace("+mes", $mes, $plantilla);
$plantilla = str_replace("+centenaAgnio", $centenaAgnio, $plantilla);
/*

//$mpdf->SetJS('this.print();');
$mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
//$mpdf->Output();
//$mpdf->Output('matricula.pdf' ,\Mpdf\Output\Destination::DOWNLOAD);
$mpdf->Output('matricula.pdf' ,'I');*/
}
 ?>