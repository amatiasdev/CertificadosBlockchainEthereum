<?php 
if(isset($_SESSION['matriculaAl'])){

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
$matricula=$_SESSION['matriculaAl'];
$stmt->bind_param("i",$matricula);

$stmt-> execute();
$result = $stmt->get_result();
$stmt->close();
while($row = $result->fetch_assoc()) {
  $ids[] = $row['matricula'];
  // if(strlen($row['nombre'])>=40){
   
  //   if(strlen($row['nombre'])>=46){

  //        $arrayMaterias[]=' class="'.ucwords(strtolower($row['nombre']));
  //   }else{
  //        $arrayMaterias[]=' class="'.ucwords(strtolower($row['nombre']));
  //   }
  //   }else{
  //       $arrayMaterias[]='>'.ucwords(strtolower($row['nombre']));
  //   }
  $arrayMaterias[]=ucwords(strtolower($row['nombre']));
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

$matriculaAl=$ids[0];
$noCertificado=$_SESSION['noCertificado'];
$noLibro=$_SESSION['noLibro'];
$noFojas=$_SESSION['noFojas'];
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

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div class="nombreDir"><?php echo $nombreDirector;?></div>
    <div class="Reg"><?php echo "  ".$numRegistro;?></div>
    <div class="nombreAl"><?php echo $nombreAlumno;?></div>
    <div class="matricula"><?php echo $matriculaAl;?></div>
    <div class="carrera"> <?php echo  $nombreCarrera; ?></div>
<div class="tableData">
<div class="tableCal">    
    <table class="materias">
        <tr>
            <th></th>
        </tr>

        <tr>
        <?php 
        $j=0; 
        $e=0;
        $p=0;
        $t=0;
        $c=0;
        $v=5;

        while($j!=2){ 
        ?>
            <td>
                <table class=<?php echo '"semestre'.($j+1).'"';?>>
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <?php
                        if($j==0){
                           $arrayMaterias[0] = conectores($arrayMaterias[0]);
                                echo '<tr><td>'.$arrayMaterias[0].'</td></tr>';
                                $i++;   
                        }
                            
                           for ($k=0; $k<$v; $k++) { 
                                $arrayMaterias[$i] = conectores($arrayMaterias[$i]);
                                echo '<tr><td class="mabajo">'.$arrayMaterias[$i].'</td></tr>';
                                $i++;
                            } 
                            $j++;
                            $v=6;
                        ?>
                    </tr>
                </table>
            </td>
            <td>
                <table class="periodo">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <?php 
                           for ($k=0; $k<6 ; $k++) { 
                                echo '<tr><td class="mabajo">'.$arrayperiodo[$p].'</td></tr>';
                                $p++;
                            } 
                         ?>
                    </tr>
                </table>
            </td>
            <td>
                <table class="cal">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <?php 
                           for ($k=0; $k<6 ; $k++) { 
                                echo '<tr><td class="mabajo">'.$arrayCalificacion[$c].'</td></tr>';
                                $c++;
                            } 
                         ?>
                    </tr>
                </table>
            </td>
            <td>
                <table class="examen">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <?php 
                           for ($k=0; $k<6 ; $k++) { 
                                echo '<tr><td class="mabajo">'.$arrayORD[$t].'</td></tr>';
                                $t++;
                            } 
                         ?>
                    </tr>
                </table>
            </td>
        <?php
        }
        ?> 
        </tr>
        
        <?php
        while($j!=9){ 
         
        if($j%2==0){
         echo "<tr>";
        }else{
            
        }
        ?>
            <td class="semestre3">
                <table class=<?php if($j%2==1){
                    echo '"semestre2"';
                }else{
                    echo '"semestre1"';
                }?>>
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <?php
                           for ($k=0; $k<6; $k++) { 
                                $arrayMaterias[$i] = conectores($arrayMaterias[$i]);
                                echo '<tr><td class="mabajo">'.$arrayMaterias[$i].'</td></tr>';
                                $i++;
                            } 
                            
                        ?>
                        </tr>
                </table>
            </td>
            <td class="semestre3">
                <table class="periodo">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <?php 
                           for ($k=0; $k<6 ; $k++) { 
                                echo '<tr><td class="mabajo">'.$arrayperiodo[$p].'</td></tr>';
                                $p++;
                            } 
                         ?>
                    </tr>
                </table>
            </td>
            <td  class="semestre3">
                <table class="cal">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <?php 
                           for ($k=0; $k<6 ; $k++) { 
                                echo '<tr><td class="mabajo">'.$arrayCalificacion[$c].'</td></tr>';
                                 $c++;
                            } 
                         ?>
                    </tr>
                </table>
            </td>
            <td  class="semestre3">
                <table class="examen">
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <?php 
                           for ($k=0; $k<6; $k++) { 
                                echo '<tr><td class="mabajo">'.$arrayORD[$t].'</td></tr>';
                                $t++;
                            } 
                         ?>
                    </tr>
                </table>
            </td>
        <?php
            $j++;
        }
        ?>  
    </table>
    </div>
    <div class="dataAlum" >
            <div class="noCert">
                <div class="leyNoCertn">
                    <?php echo $noCertificado;?>
                </div>
                <div class="leyNoCert">
                    <?php echo $noLibro;?>
                </div>
                <div class="leyNoCert"> 
                    <?php echo $noFojas;?>
                </div>
                <div class="f"> 
                    <?php echo $fechaCert;?>
                </div>
            </div>
    
</div>
</div>

    <table class="promedio">
        <tr>
            <th>85</th>
            <th class="pletra">OCHENTA Y CINCO</th>
        </tr>
    </table>
    <table class="leycred">
        <tr>
            <th>260</th>
            <th class="totalcre">260</th>
            <th class="matcur">53</th>
            <th class="totalmat">53</th>
        </tr>
    </table>
    <table class="leycred2">
        <tr>
            <th class="clave">ISIC-2010-224</th>
            <th class="diames">01 SEP</th>
            <th class="agnio">2020</th>
            <th class="aldiames">02 MAR</th>
            <th class="alagnio">2019</th>
        </tr>
    </table>
    <table class="leycred3">
        <tr>
            <th>27 DÍAS</th>
            <th class="mes">ENERO</th>
            <th class="dece">20</th>
        </tr>
    </table>
    
    
    
</body>


</html>
<?php 

session_destroy();
}
 ?>
