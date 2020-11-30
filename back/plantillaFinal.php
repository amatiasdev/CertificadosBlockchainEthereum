<?php 
    require_once('cone.php'); 
    require_once('parseLetra.php');
function conectores($value)
{
    $value= str_replace(" Del ", ' del ' , $value);
    $value= str_replace("Ñ", 'ñ' , $value);
    $value= str_replace(" De ", ' de ' , $value);
    $value= str_replace("Ó", 'ó' , $value);
    $value= str_replace(" A ", ' a ' , $value);
    $value= str_replace(" La ", ' la ' , $value);
    $value= str_replace("Ii", ' II ' , $value);
    $value= str_replace(" Para ", ' para ' , $value);
    $value= str_replace("Iii", 'III' , $value);
    $value= str_replace("Iv", 'IV' , $value);
    $value= str_replace("Vi", 'VI' , $value);
    $value= str_replace("Á", 'á' , $value);
    $value= str_replace(" Y ", ' y ' , $value);
    $value= str_replace("ion ", 'ión ' , $value);
    $value= str_replace(" El ", ' el ' , $value);
    $value= str_replace("Analisis", 'Análisis' , $value);
    $value= str_replace("Í", 'í' , $value);
    $value= str_replace("Teoricos", 'Teóricos' , $value);
    $value= str_replace("Investigacion", 'Investigación' , $value);
    $value= str_replace("Critico", 'Crítico' , $value);
    $value= str_replace("afia", 'afía' , $value);
    $value= str_replace("II i", 'III' , $value);
    $value= str_replace("logia", 'logía' , $value);
    $value= str_replace("Etica", 'Ética' , $value);
    $value= str_replace("Estetica", 'Estética' , $value);    
    return $value;
}

 $stmt = $mysqli->prepare("SELECT a.matricula, a.nombres, a.apellidoP, a.apellidoM, b.nombre  as carrera, c.nombre, c.asignatura, IF(d.periodo IS NULL,'****',d.periodo) AS periodo, IF(defin IS NULL,'**',defin) AS defin,IF(d.tipo IS NULL,'***',d.tipo) AS tipo , c.cred, sum(if(defin >=7, c.cred, 0)) AS creditos_cumplidos FROM sicoes.alumnos a INNER JOIN   sicoes.asignaturas c ON c.carrera=a.carrera  LEFT JOIN  sicoes.calif d ON d.asignatura=c.asignatura AND d.matricula=a.matricula  INNER JOIN sicoes.carreras b ON b.idcarrera= a.carrera WHERE a.matricula=? GROUP BY c.asignatura;");
$matricula=201426274;
$stmt->bind_param("i",$matricula);

$stmt-> execute();
$result = $stmt->get_result();
$stmt->close();
while($row = $result->fetch_assoc()) {
  $ids[] = $row['matricula'];
  if(strlen($row['nombre'])>=40){
   
    if(strlen($row['nombre'])>=46){
         $arrayMaterias[]=' class="longitudL">'.ucwords(strtolower($row['nombre']));
    }else{
         $arrayMaterias[]=' class="longitud">'.ucwords(strtolower($row['nombre']));
    }
    }else{
        $arrayMaterias[]='>'.ucwords(strtolower($row['nombre']));
    }
  $nombresAl[]=$row['nombres'];
  $apellidoPAl[]=$row['apellidoP'];
  $apellidoMAl[]=$row['apellidoM'];
  $arrayperiodo[]=$row['periodo'];
  $arrayORD[]=$row['tipo'];
  $arrayCalificacion[]=$row['defin'];
  $carrera[]=$row['carrera'];
}

$nombreDirector="MTRO. DEMETRIO MORENO ARCEGA";
$numRegistro="Registro 71-XXVI, fojas 93";
$nombreAlumno=$nombresAl[0]." ".$apellidoPAl[0]." ".$apellidoMAl[0];
$in=strlen($nombreAlumno);
for ($i=$in; $i <=40 ; $i++) { 
    $nombreAlumno.="_";
}


$matriculaAl=$ids[0];
$noCertificado=12;
$noLibro=13;
$noFojas=14;
$fechaCert=date('d/m/Y');
$i=0;
//$nombreCarrera=mayus('ANÁLISIS CRÍTICO DE LA ARQUITECTURA Y EL ARTE II');
$nombreCarrera=$carrera[0];
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
$mes="SEPTIEMBRE";
$centenaAgnio=19; 

// $arrayMaterias = array("Calculo Diferencial",
// "Fundamentos De Programación",
// "Taller De Etica",
// "Matematicas Discretas",
// "Taller De Administracion",
// "Fundamentos De Investigacion",
// "Calculo Integral",
// "Programacion Orientada A Objetos",
// "Contabilidad Financiera",
// "Quimica",
// "Algebra Lineal",
// "Probabilidad Y Estadistica",
// "Calculo Vectorial",
// "Estructura De Datos",
// "Cultura Empresarial",
// "Investigacion De Operaciones",
// "Sistemas Operativos",
// "Fisica General",
// "Ecuaciones Diferenciales",
// "Metodos Numericos",
// "Topicos Avanzados De Programacion",
// "Fundamentos De Base De Datos",
// "Taller De Sistemas Operativos",
// "Principios Electricos Y Aplicaciones Digital",
// "Desarrollo Sustentable",
// "Fundamentos De Telecomunicaciones",
// "Taller De Base De Datos",
// "Simulacion",
// "Fundamentos De Ingenieria De Software",
// "Arquitectura De Computadoras",
// "Lenguajes Yautomatas I",
// "Redes De Computadoras",
// "Administracion De Base De Datos",
// "Graficacion",
// "Ingenieria De Software",
// "Lenguaje De Interfaz",
// "Lenguajes Vautomatas Ii",
// "Conmutacion Y Enrutamiento De Redes De Datos",
// "Taller De Investigacion I",
// "Gestion De Proyectos De Software",
// "Sistemas Programables",
// "Introduccion A La Seguridad Informatica",
// "Programacion Logicay Funcional",
// "Administracion De Redes",
// "Taller De Investigacion Ii",
// "Programacion Web",
// "Taller De Derecho A La Seguridad Informatica",
// "Seguridad En El Desarrollo De Software",
// "Inteligencia Artificial",
// "Residencia Profesional",
// "Servicio Social",
// "Actividades Complementarias",
// "Sistemas De Seguridad Empresarial",
// "Auditoria De La Seguridad Informatica"
// );  
//$arrayCalificacion=array(100);
//$arrayperiodo=array("18-2");

//$arrayORD = array("ORD");

$arrayEncabezado=array('PRIMER','SEGUNDO','TERCER','CUARTO','QUINTO','SEXTO','SEPTIMO','OCTAVO','NOVENO','');  
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
     
<div class="header">

    <div >
       <div class="tesi">
            <img src="LogoTesi.png"> 
        </div>
        <div class="gob ">
            <img src="GobiernoEstado.png"> 
        </div>

        <div>

            <div class="tec">
                 TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA
            </div>
            <div class="organ">
            ORGANISMO PÚBLICO DESCENTRALIZADO  DEL GOBIERNO DEL ESTADO DE MÉXICO
            </div>
            <div class="cert">
                CERTIFICADO DE ESTUDIOS SUPERIORES
            </div>
            <div>
               <div class="claveCCT">
                    C.C.T. 15EIT0014F  
                </div>
                <div class="clave15">
                    C.I. 15MSU0913M
                </div> 

            </div>
                
            
        </div>
        
    </div>
    <div >
        <div class="LaC">
            <div class="lines ">
                La C. (El) C.</div><div class="nomDir"><u class="num"><?php echo $nombreDirector;?></u></div><div class="lineDir">__________________________ Directora (or) del Tecnológico de Estudios Superiores
            </div>
            <div class="linede">
                de Ixtapaluca, </div><div class="registro"><u><?php echo "  ".$numRegistro;?></u></div><div class="lineen">__________en la Dirección General de Profesiones de la S.E.P., certifica que según documentación que obra en el
            </div> 
            <div class="lineDeP">
                Departamento de Control Escolar de esta institución el (la) C.</div><div class="nomAlum"><u><?php echo $nombreAlumno;?></u>
            </div>
            <div class="line">
                acreditó las asignaturas del Ciclo Profesional, obteniendo las calificaciones definitivas siguientes: 
            </div>
                
        </div>
        <div class="matricula">
            <table class="tableMatricula noCert">
              <tr>
                <th class="thMatricula">No. DE MATRÍCULA</th>
              </tr>
              <tr>
                <td class="tdMatricula">
                    <?php echo $matriculaAl;?>
                </td>
              </tr>
            </table>
        </div>
    </div>
 </div>   
    <div class="carrera">
        <?php echo  $nombreCarrera; ?>  
    </div>
    <div class="tableData">
        <div class="tableCal">
            <div class="pc">
                <table width="600" height="800" >
                    <?php
                    $j=0; 
                    $e=0;
                    $p=0;
                    $t=0;
                    $c=0;
                        while($j!=5){ 
                     ?>
                    <tr class="tr">
                        <th class="semestre"><?php echo $arrayEncabezado[$e].' SEMESTRE';$e++;?> </th>
                        <th class="agnio">AÑO</th>
                        <th colspan="2" class="calif">CALIFICACIÓN</th>
                        <th class="semestre"><?php if($e!=9){ echo $arrayEncabezado[$e].' SEMESTRE';$e++;}?></th>
                        <th class="agnio"><?php if($e!=9){echo 'AÑO';}?></th>
                        <th colspan="2" class="calif i"><?php if($e!=9){echo 'CALIFICACIÓN';}?></th>
                    </tr>                    
                    <tr class="tr">
                        <td nowrap class="rowSem"  >
                            <table class="materia" cellpadding="2">
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                    <?php 
                                       for ($k=0; $k<6 ; $k++) { 
                                            $arrayMaterias[$i] = conectores($arrayMaterias[$i]);
                                            echo '<tr><td'.$arrayMaterias[$i].'</td></tr>';
                                            $i++;
                                        } 
                                     ?>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="materia" cellpadding="2">
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                    <?php 
                                       for ($k=0; $k<6 ; $k++) { 
                                            echo '<tr><td>'.$arrayperiodo[$p].'</td></tr>';
                                            $p++;
                                        } 
                                     ?>
                                </tr>
                            </table>
                        </td>
                        <td class="rowCal">
                            <table class="materia" cellpadding="2">
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                    <?php 
                                       for ($k=0; $k<6 ; $k++) { 
                                            echo '<tr><td>'.$arrayCalificacion[$c].'</td></tr>';
                                            $c++;
                                        } 
                                     ?>
                                </tr>
                            </table>
                        </td> 
                        <td class="rowOrd i">
                            <table class="materia" cellpadding="2">
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                    <?php 
                                       for ($k=0; $k<6 ; $k++) { 
                                            echo '<tr><td>'.$arrayORD[$t].'</td></tr>';
                                            $t++;
                                        } 
                                     ?>
                                </tr>
                            </table>
                        </td>
                        <?php 
                            if($j==4){

                                ?>
                                    <td class="rowSem">
                                
                            </td>
                            <td class="rowAgnio">
                                
                            </td>
                            <td class="rowCal">
                                
                            </td> 
                            <td class="rowOrd i">
                                
                            </td>
                            <?php 
                            }else{


                         ?>
                        <td nowrap class="rowSem"  >
                            <table class="materia" cellpadding="2">
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                   <?php 
                                       for ($k=0; $k<6 ; $k++) { 
                                            $arrayMaterias[$i] = conectores($arrayMaterias[$i]);
                                            echo '<tr><td'.$arrayMaterias[$i].'</td></tr>';
                                            $i++;
                                        } 
                                     ?>
                                </tr>
                            </table>
                        </td>
                        <td class="rowAgnio">
                            <table class="materia" cellpadding="2">
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                    <?php 
                                       for ($k=0; $k<6 ; $k++) { 
                                            echo '<tr><td>'.$arrayperiodo[$p].'</td></tr>';
                                            $p++;
                                        } 
                                     ?>
                                </tr>
                            </table>
                        </td>
                        <td class="rowCal">
                            <table class="materia" cellpadding="2">
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                    <?php 
                                       for ($k=0; $k<6 ; $k++) { 
                                            echo '<tr><td>'.$arrayCalificacion[$c].'</td></tr>';
                                            $c++;
                                        } 
                                     ?>
                                </tr>
                            </table>
                        </td> 
                        <td class="rowOrd i">
                            <table class="materia" cellpadding="2">
                                <tr>
                                    <th></th>
                                </tr>
                                <tr>
                                    <?php 
                                       for ($k=0; $k<6 ; $k++) { 
                                            echo '<tr><td>'.$arrayORD[$t].'</td></tr>';
                                            $t++;
                                        } 
                                     ?>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php
                    }
                    $j++; 
                        }
                     ?>
                    
                </table>
            </div>  

        </div>
        <div class="dataAlum" >
            <div class="">
                <svg height="300" width="140">
                  <ellipse cx="60" cy="180" rx="60" ry="100" style="fill:none;stroke:black;stroke-width:1" />
                </svg>
            </div>
            <div class="firmaAlumno">
                <div>
                     __________________________

                </div>
                <div>
                    FIRMA DE LA (EL) ALUMNA (O)
                </div>
            </div>
            <div class="noCert">
                <div class="leyCert">
                    REGISTRADO EN EL
                </div>
                <div class="leyCert">
                    DEPARTAMENTO DE
                </div>
                <div class="leyCert">
                    CONTROL ESCOLAR
                </div>
                <div class="leyNoCert">
                    CON No: <?php echo $noCertificado;?>
                </div>
                <div class="leyNoCert">
                    EN EL LIBRO: <?php echo $noLibro;?>
                </div>
                <div class="leyNoCert"> 
                    A FOJAS <?php echo $noFojas;?>
                </div>
                <div class="leyCert f"> 
                    <?php echo $fechaCert;?>
                </div>
                <div class="leyCert">
                    _______________
                </div>
                <div class="leyCert">
                    FECHA
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="pieP">
            <div class="nota">
                <div class="nota">
                    NOTA:
                </div>
                <div class="notaEscala">
                    Escala de Calificación de 0 a 10. La calificación minima aprobatoria es de 7 (siete) 
                </div>
                <div class="">
                    <div class="or">
                        OR = EXAMEN ORDINARIO
                    </div>
                    <div class="eex">
                        EEX = EXAMEN EXTRAORDINARIO
                    </div>
                    <div class="esu">
                        ESU = EXAMEN DE SUFICIENCIA
                    </div>
                    <div class="rec">
                        REC = RECURSAMIENTO
                    </div>
                    <div class="eq">
                        EQ = EQUIVALENCIA
                    </div>
                </div>
            </div>
            <div class="promedio">
                PROMEDIO <u class="num">_______<?php echo $promedioNum;?>_________________<?php echo $promedioLet;?>____________________</u> 
            </div>
            <div class="NumLet">
                <div class="numL">
                    NUMERO
                </div>
                <div class="letL">
                    LETRA
                </div>
            </div>
            <div class="leye">
                SE EXPIDE EL PRESENTE CERTIFICADO QUE AMPARA <u class="datosLlenar"><?php echo $numCreditos;?></u> CRÉDITOS DE UN TOTAL DE <u class="datosLlenar"><?php echo $totalCreditos;?></u> y <u class="datosLlenar"> <?php echo $numAsigna;?></u> ASIGNATURAS DE UN TOTAL DE <u class="datosLlenar"><?php echo $totalAsigna;?></u> QUE INTEGRAN EL
            </div>
            <div class="leye">
                PLAN DE ESTUDIOS, CLAVE <u class="nums"><?php echo $clavePlan;?></u> DURANTE EL PERIODO COMPRENDIDO DEL <u class="datosLlenar"><?php echo $fechaInicio;?></u> DE <u class="datosLlenar"><?php echo $agnioInicio;?></u> AL <u class="datosLlenar"><?php echo $fechaTermino;?></u> DE <u class="datosLlenar"><?php echo $agnioTermino;?></u> EN IXTAPALUCA, ESTADO DE
            </div>
            <div class="leye">
                MÉXICO, A LOS <u class="datosLlenar"><?php echo $numDias;?></u> DEL MES DE <u class="datosLlenar"><?php echo $mes;?></u> DE 20<u class="datosLlenar"><?php echo $centenaAgnio;?></u>. 
            </div>


            
            <div class="p">
                <div>
                    <div class="dir">
                        DIRECCIÓN ACADÉMICA
                    </div>
                    <div class="dirs">
                        DIRECCIÓN GENERAL
                    </div>
                </div>
                <div>
                    <div class="dirLi">
                        _______________________________________
                    </div>
                    <div class="dirsLi">
                        _____________________________________
                    </div>
                </div>
                <div>
                    <div class="dirNo">
                        DR. ANTONIO ALEXANDER CORDERO TREJO
                    </div>
                    <div class="dirsNo">
                        MTRO. DEMETRIO MORENO ARCEGA
                    </div>
                </div>
            </div>
            <div class="nota">
                ESTE DOCUMENTO NO ES VÁLIDO SI TIENE RASPADURAS O ENMENDADURAS
            </div>
        </div>
        <div class="sep">
            <div class="">
                 <table class="tableMatricula noCert">
                  <tr>
                    <th class="thMatricula">COTEJÓ</th>
                  </tr>
                  <tr>
                    <td class="c">
                        ________________________
                    </td>
                  </tr>
                </table>               
            </div>
            <div class="leye cen">
                JEFA (E) DEL
            </div>
            <div class="leye ce">
                DEPARTAMENTO DE
            </div>
            <div class="leye ce">
                CONTROL ESCOLAR
            </div>
        </div>
    </div>
</div>    
</body>
</html>
