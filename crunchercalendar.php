<?php 

require_once('data/conexiondb.php');
$accion="";
$empresa =""; 
$empresa       = $mysqli->real_escape_string($_POST['empresa']);
$accion       = $mysqli->real_escape_string($_POST['accion']);

if($accion=="actualizaSelectEmpresa"){
	actualizaSelectEmpresa($mysqli);
}elseif ($accion=="actualizaSelectPosto") {
	actualizaSelectPuesto($mysqli, $empresa);
}



function muestraFechas($id,$mysqli ){

	$sql="SELECT inicio, fin, horas, razon_social, postos.posto  FROM fct RIGHT JOIN postos ON(fct.posto=postos.id) JOIN empresas ON (fct.empresa=empresas.id) WHERE fct.alumno='".$id."'";
    $result = $mysqli->query($sql);

    if ($mysqli->errno) {echo('Esto va mal' . $bd->error);}

    $resulta = array();
    while($registro = $result->fetch_assoc()) {
        $resulta[] = $registro;

    }


    return $resulta;
}

function calculaFechaFinal(){
	$fechaTemp = new Datetime($resulta[0]['inicio']); 
  	$diasRestantes=(384-$resulta[0]['horas'])/8 ; //	$fechaTemp=$fechaTemp->add(new DateInterval('P1D'));
      
        for ($i=0; $i<$diasRestantes; $i++)  {                                   
            
            $fechaTemp=$fechaTemp->add(new DateInterval('P1D'));
                     
        if ($fechaTemp == "Sat" || $fechaTemp == "Sun"){  
            $i--;  
        //}elseif () {
        //
        //}  
    	}  

}			
}


function actualizaSelectEmpresa($mysqli){
 $sql="SELECT id, razon_social FROM empresas WHERE empresas.id IN(SELECT postos.empresa FROM postos WHERE postos.id NOT IN (SELECT posto FROM fct where fct.posto=postos.id))";
       $result = $mysqli->query($sql);
        $dropdown= '<option value="0">Todas</option>';
        if ($mysqli->errno) {echo('Esto va mal  ' . $mysqli->error);}

        while($registro = $result->fetch_assoc()) {
             $dropdown.= '<option value="'.$registro["id"].'">'.$registro["razon_social"].'</option>';

    
    }
        echo $dropdown;
}

function actualizaSelectPuesto($mysqli, $empresa){
	$filtraempresa="";
	if($empresa!=0){
	$filtraempresa= "postos.empresa='".$empresa."' AND";
	}
 $sql="SELECT id, postos.posto FROM postos WHERE ".$filtraempresa." postos.id NOT IN (SELECT fct.posto FROM fct where fct.posto=postos.id)";
       $result = $mysqli->query($sql);
        $dropdown= '<option value="0">Seleccionar</option>';
        if ($mysqli->errno) {echo('Esto va mal  ' . $mysqli->error);}

        while($registro = $result->fetch_assoc()) {
             $dropdown.= '<option value="'.$registro["id"].'">'.$registro["posto"].'</option>';

    
    }
        echo $dropdown;
}








 ?>