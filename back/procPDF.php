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

$css=file_get_contents('css/style.css');
$plantilla=file_get_contents('plantillaPdf.html');


///SELECT
//  $stmt = $mysqli->prepare("SELECT matricula FROM alumnos WHERE matricula = ?");
//  $matricula=201426274;
// $stmt->bind_param("i",$matricula);
// $stmt->execute();
// $result = $stmt->POST_result();
// while($row = $result->fetch_assoc()) {
//   echo $row['matricula'];
// }
// $stmt->close();



$nombreDirector="MTRO. DEMETRIO MORENO ARCEGA";
$numRegistro="Registro 71-XXVI, fojas 93";
$nombreAlumno="ALDO RAFAEL MATIAS ORTIZ";
$in=strlen($nombreAlumno);
for ($i=$in; $i <59 ; $i++) { 
    $nombreAlumno.="_";
}

$matricula=$matriculaAl;
$noCertificado=$conNo;
$noLibro=$libroNo;
$noFojas=$fojas;
$fechaCert=date('d/m/Y',strtotime($fecha));


$nombreCarrera="SISTEMAS COMPUTACIONALES";
$promedioNum=99;
$promedioLet=toLetra($promedioNum);
$numCreditos=260;
$totalCreditos=260;
$numAsigna=53;
$totalAsigna=53;
$clavePlan="ISIC-2010-224";
$fechaInicio="05 SEP";
$agnioInicio=2012;
$fechaTermino="05 DIC";
$agnioTermino=2018;
$numDias="14 DÍAS";
$mes="JUNIO";
$centenaAgnio=19;

$nummat=6;
$eliminar='';
$numSemestresCursados=7;


$arrayMaterias = array("Calculo Diferencial",
"Fundamentos De Programación",
"Taller De Etica",
"Matematicas Discretas",
"Taller De Administracion",
"Fundamentos De Investigacion",
"Calculo Integral",
"Programacion Orientada A Objetos",
"Contabilidad Financiera",
"Quimica",
"Algebra Lineal",
"Probabilidad Y Estadistica",
"Calculo Vectorial",
"Estructura De Datos",
"Cultura Empresarial",
"Investigacion De Operaciones",
"Sistemas Operativos",
"Fisica General",
"Ecuaciones Diferenciales",
"Metodos Numericos",
"Topicos Avanzados De Programacion",
"Fundamentos De Base De Datos",
"Taller De Sistemas Operativos",
"Principios Electricos Y Aplicaciones Digital",
"Desarrollo Sustentable",
"Fundamentos De Telecomunicaciones",
"Taller De Base De Datos",
"Simulacion",
"Fundamentos De Ingenieria De Software",
"Arquitectura De Computadoras",
"Lenguajes Yautomatas I",
"Redes De Computadoras",
"Administracion De Base De Datos",
"Graficacion",
"Ingenieria De Software",
"Lenguaje De Interfaz",
"Lenguajes Vautomatas Ii",
"Conmutacion Y Enrutamiento De Redes De Datos",
"Taller De Investigacion I",
"Gestion De Proyectos De Software",
"Sistemas Programables",
"Introduccion A La Seguridad Informatica",
"Programacion Logicay Funcional",
"Administracion De Redes",
"Taller De Investigacion Ii",
"Programacion Web",
"Taller De Derecho A La Seguridad Informatica",
"Seguridad En El Desarrollo De Software",
"Inteligencia Artificial",
"Residencia Profesional",
"Servicio Social",
"Actividades Complementarias",
"Sistemas De Seguridad Empresarial",
"Auditoria De La Seguridad Informatica"
);
$arrayCalificacion=array(100);
$arrayperiodo=array("18-2");

$arrayORD = array("ORD");


$materiasXsemestre = array(6,6,6,6,6,6,6,6,6);
$semestre=0;
$materiaAct=$materiasXsemestre[0];
$j=1;
$i=1;
$materiaAct=0;

while ( $semestre+1<= 9) {
    if(strlen($arrayMaterias[$materiaAct])>=44){
         $eliminar='<td>+materiaS'.$j."".$i;
        $plantilla = str_replace($eliminar, '<td class="longitud">'.$arrayMaterias[$materiaAct] , $plantilla);
    }else{
        $eliminar='+materiaS'.$j."".$i;
        $plantilla = str_replace($eliminar, $arrayMaterias[$materiaAct] , $plantilla);
    }   
    $eliminar='+periodoS'.$j."".$i;
    $plantilla = str_replace($eliminar, $arrayperiodo[$materiaAct] , $plantilla);
    $eliminar='+calificacionS'.$j."".$i;
    $plantilla = str_replace($eliminar, $arrayCalificacion[$materiaAct] , $plantilla);
    $eliminar='+tipoSemestreS'.$j."".$i;
    $plantilla = str_replace($eliminar, $arrayORD[$materiaAct] , $plantilla);
    $i++;
    $materiaAct++;
    if($i-1==$materiasXsemestre[$semestre]) {
        if($materiasXsemestre[$semestre]<6){
            while ($i <=6 ) {
                $eliminar='+materiaS'.$j."".$i;
                $plantilla = str_replace($eliminar,'', $plantilla);
                $eliminar='+periodoS'.$j."".$i;
                $plantilla = str_replace($eliminar,'', $plantilla);
                $eliminar='+calificacionS'.$j."".$i;
                $plantilla = str_replace($eliminar, '', $plantilla);
                $eliminar='+tipoSemestreS'.$j."".$i;
                $plantilla = str_replace($eliminar, '', $plantilla);
                $i++;                
            }
        }
        $semestre++;
        $j++;
        $i=1;
    }
}



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



//$mpdf->SetJS('this.print();');

$mpdf->WriteHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
        //$mpdf->Output();
        //$mpdf->Output('matricula.pdf' ,\Mpdf\Output\Destination::DOWNLOAD);
$mpdf->Output('matricula.pdf' ,'I');
}
 ?>