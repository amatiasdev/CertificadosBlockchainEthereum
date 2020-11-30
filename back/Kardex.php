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

 $stmt = $mysqli->prepare("SELECT   c.nombre, c.asignatura,
            c.cred, sum(if(defin >=7, c.cred, 0)) AS creditos_cumplidos,
                GROUP_CONCAT(tipo SEPARATOR ', ') as tipos,
                GROUP_CONCAT(defin SEPARATOR ', ') as calificaciones,
                GROUP_CONCAT(periodo SEPARATOR ', ') as periodos
    FROM sicoes.alumnos a 
    INNER JOIN   sicoes.asignaturas c ON c.carrera=a.carrera  
    LEFT JOIN  sicoes.calif d ON d.asignatura=c.asignatura AND d.matricula=a.matricula  
    WHERE a.matricula=? AND defin IS NOT NULL GROUP BY c.asignatura;");
$matricula=$_SESSION['matriculaAl'];
$stmt->bind_param("i",$matricula);

$stmt-> execute();
$result = $stmt->get_result();
$stmt->close();
while($row = $result->fetch_assoc()) {
  $asignatura[]=$row["asignatura"];
  $tipo[]=$row['tipos'];
  $defin[]=$row['calificaciones'];
  $cred[]=$row['cred'];
  $nombre[]=$row['nombre'];
  $periodo[]=$row['periodos'];
}

$stmt = $mysqli->prepare("SELECT   a.matricula, a.nombres, a.apellidoP, a.apellidoM,
            b.nombre  as carrera
   FROM sicoes.alumnos a 
   INNER JOIN sicoes.carreras b ON b.idcarrera= a.carrera
   WHERE a.matricula=?");
$stmt->bind_param("i",$matricula);

$stmt-> execute();
$result = $stmt->get_result();
$stmt->close();
while($row = $result->fetch_assoc()) {
  $ids[] = $row['matricula'];
  $nombresAl[]=$row['nombres'];
  $apellidoPAl[]=$row['apellidoP'];
  $apellidoMAl[]=$row['apellidoM'];
  $carrera[]=$row['carrera'];
}
$nombreAlumno=$nombresAl[0]." ".$apellidoPAl[0]." ".$apellidoMAl[0];
$matriculaAl=$ids[0];
$fechaCert=date('d/m/Y');
$nombreCarrera=$carrera[0];

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/stylesKardex.css">
</head>
<body>
     
<div class="header">

    <div >
       <div class="tesi">
            <img src="LogoTesi.png"> 
        </div>
        <div class="gob">
            <img src="GobiernoEstado.png"> 
        </div>

        <div>
            <div class="tec">
                TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA
            </div>
            <div class="kardex">
                KARDEX
            </div>
            <div class="emitido">
                EMITIDO POR CONTROL ESCOLAR
            </div>
        </div>
    </div>
    <div class="infoAlumno">
        <table>
                <tr>
                    <td >
                        NOMBRE:
                    </td>
                    <td>
                        <?php echo $nombreAlumno; ?>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        MATRICULA:
                    </td>
                    <td >
                        <?php echo $matricula; ?>
                    </td>
                </tr>
            <tbody>
                <tr >
                    <td>
                        CARRERA:
                    </td>
                    <td>
                        <?php echo $nombreCarrera; ?>
                    </td>
                    <td class="matcursadas">
                       MATERIAS CURSADAS:
                    </td>
                    <td class="matcursadasNum">
                       54
                    </td>
                    <td>
                       PROMEDIO:
                    </td>
                    <td>
                       8.41
                    </td>
                </tr>
                <tr>
                    <td>
                        CREDITOS:
                    </td>
                    <td>
                        260
                    </td>
                    <td>
                       
                    </td>
                    <td>
                       
                    </td>
                    <td>
                       FECHA:
                    </td>
                    <td>
                       <?php echo $fechaCert; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="creditosCub">
            CREDITOS CUBIERTOS: 260
        </div>
    </div>
    <div class="infoMaterias">
        <table>
            <tr>
                <th>
                    CLAVE
                </th>
                <th>
                    CRED.
                </th>
                <th>
                    NOMBRE ASIGNATURA
                </th>
                <th>
                    ORD.
                </th>
                <th>
                    PER.
                </th>
                <th>
                    REC.
                </th>
                <th>
                    PER.
                </th>
                <th>
                    EXT.1
                </th>
                <th>
                    PER
                </th>
                <th>
                    EXT.2
                </th>
                <th>
                    PER.
                </th>
                <th>
                    INT.
                </th>
                <th>
                    SUF.
                </th>
                <th>
                    PER.
                </th>
                <th>
                    EQIV.
                </th>
                <th>
                    PER.
                </th>
                <th>
                    DEF.
                </th>
                <th>
                    PER.
                </th>
            </tr>
        <tbody>
                    <?php 
                    $result='';
                       for ($k=0; $k<count($asignatura); $k++) {
                        $result.='<tr>';
                            $result.='<td>'.$asignatura[$k].'</td>';
                            $result.='<td>'.$cred[$k].'</td>';
                            $result.='<td>'.$nombre[$k].'</td>'; 
                            $recurses = explode(",", $defin[$k]);
                            $periodoss = explode(",", $periodo[$k]);
                            $tiposs = explode(",", $tipo[$k]);
                            $EXT = strpos($tipo[$k], 'EXT');
                            $INT = strpos($tipo[$k], 'INT');
                            $OED = strpos($tipo[$k], 'OED');
                            $ORD = strpos($tipo[$k], 'ORD');
                            $REC = strpos($tipo[$k], 'REC');
                            $RXT = strpos($tipo[$k], 'RXT');
                            $SUF = strpos($tipo[$k], 'SUF');
                            if($ORD !== false){
                                $indice= array_search('ORD',$tiposs,true); 
                                $result.='<td  class="tableKardex">'.$recurses[$indice].'</td>';
                                $result.='<td>'.$periodoss[$indice].'</td>';
                                if($asignatura[$k]==3505){
                                    echo "ENTRAAAA";
                                    echo $indice;
                                }
                            }else{
                                $result.='<td></td>';
                                $result.='<td></td>';
                            }
                            if($REC !== false){
                                $indice= array_search('REC',$tiposs,true);
                                
                                $result.='<td class="tableKardex">'.$recurses[$indice].'</td>';
                                $result.='<td class="tableKardex">'.$periodoss[$indice].'</td>';
                            }else{
                                $result.='<td></td>';
                                $result.='<td></td>';
                            }
                            if($EXT !== false){
                                $indice= array_search('EXT',$tiposs,true);
                                // echo var_dump($periodoss).'<br>';
                                // echo var_dump($recurses).'<br>';
                                // echo var_dump($tiposs).'<br>';  
                                $result.='<td class="tableKardex">'.$recurses[$indice].'</td>';
                                $result.='<td class="tableKardex">'.$periodoss[$indice].'</td>';
                            }else{
                                $result.='<td></td>';
                                $result.='<td></td>';
                            }
                            if($RXT !== false){
                                $indice= array_search('RXT',$tiposs,true); 
                                $result.='<td  class="tableKardex">'.$recurses[$indice].'</td>';
                                $result.='<td  class="tableKardex">'.$periodoss[$indice].'</td>';
                            }else{
                                $result.='<td></td>';
                                $result.='<td></td>';
                            }
                            if($INT !== false){
                                $indice= array_search('INT',$tiposs,true); 
                                $result.='<td  class="tableKardex">'.$recurses[$indice].'</td>';
                            }else{
                                $result.='<td></td>';
                            }
                             if($SUF !== false){
                                $indice= array_search('SUF',$tiposs,true);
                                $result.='<td  class="tableKardex">'.$recurses[$indice].'</td>';
                                $result.='<td  class="tableKardex">'.$periodoss[$indice].'</td>';
                            }else{
                                $result.='<td></td>';
                                $result.='<td></td>';
                            }
                            if($OED !== false){
                                $indice= array_search('OED',$tiposs, true);
                                $result.='<td  class="tableKardex">'.$recurses[$indice].'</td>';
                                $result.='<td  class="tableKardex">'.$periodoss[$indice].'</td>';
                            }else{
                                $result.='<td></td>';
                                $result.='<td></td>';
                            }
                            $materiaActual=$asignatura[$k];
                            $result.='</tr>';
                        }
                        
                        echo $result;
                     ?>
        </tbody> 
        </table>
    </div>
</div>    
</body>
</html>
<?php 

session_destroy();
}
 ?>
