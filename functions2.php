<?php
require_once '../../php/commons.php';

function search($data){
	
	$sqlText="SELECT id, primer_nombre, segundo_nombre, apellido, date_format(fecha_nacimiento,'%d/%c/%Y') as fecha_nacimiento, email FROM usuario where 1=1";
	if($data['nombre']!=null){
		$sqlText.=" and ((primer_nombre LIKE '%" . $data['nombre'] . "%')";
		$sqlText.=" or (segundo_nombre LIKE '%" . $data['nombre'] . "%')";
		$sqlText.=" or (apellido LIKE '%" . $data['nombre'] . "%'))";
	}
	if($data['email']!=null){
		$sqlText.=" and email LIKE '%" . $data['email'] . "%'";
	}
	if($data['fecha_nacimiento_desde']!=null){
		$dia=substr($data['fecha_nacimiento_desde'],0,2);
		$mes=substr($data['fecha_nacimiento_desde'],3,2);
		//$ano=substr($data['fecha_nacimiento_desde'],6,4);
		//$sqlText.=" and fecha_nacimiento >= '". $ano . "-" . $mes . "-" . $dia . "'";
		$sqlText.=" and ((MONTH(fecha_nacimiento) > " . $mes . ") or (MONTH(fecha_nacimiento) = " . $mes . " and DAYOFMONTH(fecha_nacimiento) >=  " . $dia ."))";
	}
	if($data['fecha_nacimiento_hasta']!=null){
		$dia=substr($data['fecha_nacimiento_hasta'],0,2);
		$mes=substr($data['fecha_nacimiento_hasta'],3,2);
		//$ano=substr($data['fecha_nacimiento_hasta'],6,4);
		//$sqlText.=" and fecha_nacimiento <= '". $ano . "-" . $mes . "-" . $dia . "'";
		$sqlText.=" and ((MONTH(fecha_nacimiento) < " . $mes . ") or (MONTH(fecha_nacimiento) = " . $mes . " and DAYOFMONTH(fecha_nacimiento) <=  " . $dia ."))";
	}

	$sqlText.=" ORDER BY MONTH(fecha_nacimiento) asc, DAYOFMONTH(fecha_nacimiento) asc";
	$sqlText.=";";

	$conection = getConnection();
	$result=execQuery($conection,$sqlText);

//	if(!($result==false||mysql_num_rows($result)==0)){
		//$ret = mysql_fetch_array($result);
//	}
	mysql_close($conection);
	return $result;
}

function delete($data){
	$sqlText="DELETE FROM usuario where id=" . $data['id'] . ";";
	$conection = getConnection();
	$result=execQuery($conection,$sqlText);
	mysql_close($conection);
	return true;
}

function felititar($id){

	$sqlText="SELECT email FROM usuario where id=" . $id . ";";
	$conection = getConnection();
	$result=execQuery($conection,$sqlText);
	mysql_close($conection);
	
	if(!($result==false||mysql_num_rows($result)==0)){
		$fila = mysql_fetch_array($result);
		$to = $fila['email'];
	}else{
		$to = "serbita@sebastianmenel.com.ar";
	}

	$host=$_SERVER['SERVER_NAME'];
	$port=$_SERVER['SERVER_PORT'];
	$subject = 'Felicidades !!!';
	$mensaje=
'<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>
<div>
	<strong>Felicidades !!!</strong><br><br>
	Espero que tengas un Muy Feliz Cumple !!!.
	<br><br>
	---<br>
	Lic. Sebastián Menel<br>
	<a href="http://www.sebastianmenel.com.ar" target="_blank">www.sebastianmenel.com.ar</a>
</div>
</body>
</html>';

	$mensaje = wordwrap($mensaje, 70);
	
	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras ="From: Sebastián Menel <serbita@sebastianmenel.com.ar>" . "\r\n";
	$cabeceras .= 'Reply-To: serbita@sebastianmenel.com.ar' . "\r\n";
	$cabeceras .= "X-Mailer: PHP\n";
	$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	return mail($to, $subject, $mensaje,$cabeceras);
}

?>