<?php
require_once 'commons.php';

function search($data){
        
        $sqlText="SELECT * FROM ml_request order by id desc LIMIT 0 , 100";
      
        $conection = getConnection();
        $result=execQuery($conection,$sqlText);

//      if(!($result==false||mysql_num_rows($result)==0)){
                //$ret = mysql_fetch_array($result);
//      }
        mysql_close($conection);
        return $result;
}


function getUser($email,$password=null){
	
	$sqlText="SELECT * FROM usuario U WHERE U.email='$email'";
	if($password!=null){
		$md5Password=md5(trim($password));
		$sqlText .=  " AND U.password='$md5Password'";
	}
	$conection = getConnection();
	//$result=pg_exec($conection,$sqlText);
	$result=execQuery($conection,$sqlText);
	$retorno=false;
	/*if(!($result==false||pg_numrows($result)==0)){
		$retorno = pg_fetch_array($result);
		//var_dump($retorno);
	}
	pg_close($conexion);*/
	
	if(!($result==false||mysql_num_rows($result)==0)){
		$retorno = mysql_fetch_array($result);
		//var_dump($retorno);
	}
	mysql_close($conection);
	return $retorno;
}

function updatePassword($email,$newPassword){
	$conection = getConnection();
	$sqlText="UPDATE usuario SET password = '".md5($newPassword)."' WHERE email='".$email."'";
	$result = pg_exec($conection,$sqlText);
	pg_close($conexion);
	return $result;
	
}

function generateHash($array){
	$buffer='';
	while (list($key, $val) = each($array)) {
		$buffer.="$key:$val;";
	}
	return md5($buffer);
}

function sendMail($to,$data){
//	$hash=generateHash($data);
	$host=$_SERVER['SERVER_NAME'];
	//$host=$_SERVER['HTTP_HOST'];
	$port=$_SERVER['SERVER_PORT'];
	//$port=$_SERVER['HTTP_PORT'];
	$subject = 'Su fecha de cumplea�os ha sido agregada en www.sebastianmenel.com.ar';
	// El mensaje
	$mensaje=
'<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>
<div>
	<strong>Gracias</strong> por agregarte a la lista de cumplea&ntilde;os.<br>
</div>
<br><br>
---<br>
Lic. Sebasti�n Menel<br>
<a href="http://www.sebastianmenel.com.ar" target="_blank">www.sebastianmenel.com.ar</a>
</body>
</html>';

/*	$filename = "mail.php";
	$fd = fopen ($filename, "r");
	$mailbody = fread ($fd, filesize ($filename));
	fclose ($fd);*/

	// En caso de que cualquier linea tenga mas de 70 caracteres, habria
	// que usar wordwrap()
	$mensaje = wordwrap($mensaje, 70);
	
	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras ="From: Sebasti�n Menel <serbita@sebastianmenel.com.ar>" . "\r\n";
	$cabeceras .= 'Reply-To: serbita@sebastianmenel.com.ar' . "\r\n";
	$cabeceras .= "X-Mailer: PHP\n";
	$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
/*	$cabeceras = 'From: webmaster@example.com' . "\r\n" .
   'Reply-To: webmaster@example.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();*/
	
	return mail($to, $subject, $mensaje,$cabeceras);
}


function invitar($nombre,$email,$nombre_suscripto,$email_suscripto){
	$host=$_SERVER['SERVER_NAME'];
	//$host=$_SERVER['HTTP_HOST'];
	$port=$_SERVER['SERVER_PORT'];
	//$port=$_SERVER['HTTP_PORT'];
	$subject = "$nombre_suscripto te invita a participar de Rumbo a la Ant�rtida";
	// El mensaje
	//$mensaje = '<a href="http://localhost:8080/titanic/validar.php?id='.$hash.'">http://localhost:8080/titanic/validar.php?id='.$hash.'"<a/>"';
	$mensaje='<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><title>Concurso Rumbo a la Antartida</title>
</head>

<body>

<div class="header" style="width:600px; background:#E8F1F2; clear:both; display:block;"><a href="http://www.rumboalaantartida.com" target="_blank"><img src="http://www.rumboalaantartida.com/images/SPA_headermail.jpg" border="0"/></a></div>
<div class="mail" style="width:600px; padding-top:40px; padding-bottom:40px; background:#E8F1F2; clear:both; display:block; font-family:Arial, Helvetica, sans-serif; color:#36487A; font-size:110%;">
  <p style="padding-left:30px; padding-right:30px;">En <b>The History Channel</b> te damos una oportunidad &uacute;nica: visitar la Ant&aacute;rtida como parte de una expedici&oacute;n cient&iacute;fica al Continente Blanco.</p>
  <p style="padding-left:30px; padding-right:30px;">
 Entra en <a href="http://www.rumboalaantartida.com" target="_blank" style="color:#142658; text-decoration:none; border: 0px;"><b>www.rumboalaantartida.com</b></a>
y participa del concurso con s&oacute;lo llenar tus datos y responder a una pergunta en la que expreses tu opini&oacute;n. En esta oportunidad, 4 afortunados ganadores viajar&aacute;n <b>rumbo al Polo Sur</b> para conecer la Ant&aacute;rtida, a bordo del rompehielos m&aacute;s grande de Latinoam&eacute;rica.
  </p>
  <p style="padding-left:30px; padding-right:30px;">No pierdas esta oportunidad como s&oacute;lo The History Channel te la puede ofrecer.</p>
</div>
<div><a href="http://www.thc.tv" target="_blank"><img src="http://www.rumboalaantartida.com/images/SPA_footermail.jpg" border="0"/></a></div>
<!--<div><a href="http://www.thc.tv"><img src="http://www.rumboalaantartida.com/img/pie-thc.png" border="0"/></a></div>-->
</body>
</html>';

	$mensaje = wordwrap($mensaje, 70);
	
	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras ="From: The History Channel <concurso@thc.tv>" . "\r\n";
	$cabeceras .= "Reply-To: $email_suscripto" . "\r\n";
	$cabeceras .= "X-Mailer: PHP\n";
	$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	return mail($email, $subject, $mensaje,$cabeceras);

}

function userAlreadyExists($email){
	/*
	$conection = getConnection();
	$sqlText="SELECT * FROM usuario U WHERE U.email='$email'";
	$result=pg_exec($conection,$sqlText);
	if($result==false||pg_numrows($result)==0){
		pg_close($conexion);
		return false;
	}
	else{
		pg_close($conexion);
		return true;
	}
*/
	return false;

//            $reg=pg_fetch_row($result);         
}

/*
  `primer_nombre` varchar(255) NOT NULL default '',
  `segundo_nombre` varchar(255) default '',
  `apellido` varchar(255) NOT NULL default '',
  `sexo` varchar(10) NOT NULL default '',
  `direccion` varchar(255) default '',
  `codigo_postal` varchar(255) default '',
  `ciudad` varchar(255) default '',
  `email` varchar(255) default '',
  `pass` varchar(255) default '',
  `fecha_nacimiento` date NOT NULL default '0000-00-00',
  `pais` varchar(255) default '',
  `estado` varchar(255) default '',
  `telefono` varchar(255) default '',
  `data_hash` varchar(255) NOT NULL default '',
  `login_id` varchar(255) default '',
  `id` bigint(20) NOT NULL default '0',
  `web_page` varchar(255) default ''
*/

function createUser($data){
	$conection = getConnection();


	$sqlText="SELECT max(id) as max FROM usuario";
	$result = execQuery($conection,$sqlText);
	$row = mysql_fetch_array($result);
	$max=$row['max'] + 1;

	$hash=generateHash($data);
	$fecha_nacimiento=substr($data['fecha_nacimiento'],6,4)."-".substr($data['fecha_nacimiento'],3,2)."-".substr($data['fecha_nacimiento'],0,2);
	$sqlText="INSERT INTO usuario (id,data_hash,primer_nombre,segundo_nombre,apellido,sexo,direccion,codigo_postal,ciudad,email,pass,fecha_nacimiento,pais,estado,telefono,login_id,web_page) VALUES (".$max.",'".$hash."','".$data['primer_nombre']."','".$data['segundo_nombre']."','".$data['apellido']."','".$data['sexo']."','".$data['direccion']."','".$data['codigo_postal']."','".$data['ciudad']."','".$data['e-mail']."','".md5($data['pass'])."','".$fecha_nacimiento."','".$data['pais']."','".$data['estado']."','".$data['telefono']."','".$data['login_id']."','".$data['web_page']."');";

	$result = execQuery($conection,$sqlText);
	//pg_close($conexion);
	mysql_close($conection);
	return $result;	
}



/*
function createUser($data){
	$conection = getConnection();
	$hash=generateHash($data);
	$fecha_nacimiento=substr($data['fecha_nacimiento'],6,4)."-".substr($data['fecha_nacimiento'],3,2)."-".substr($data['fecha_nacimiento'],0,2);
	$sqlText="INSERT INTO usuario (data_hash,password,email,nombre,apellido,genero,fecha_nacimiento,pais,ciudad,estado,direccion,telefono,compania_tv,newsletter,respuesta,habilitado) VALUES ('".$hash."','".md5($data['password'])."','".$data['email']."','".$data['nombre']."','".$data['apellido']."','".$data['genero']."','".$fecha_nacimiento."','".$data['pais']."','".$data['ciudad']."','".$data['estado']."','".$data['direccion']."','".$data['telefono']."','".$data['compania_tv']."','".$data['newsletter']."','".$data["respuesta"]."','true');";
	$result = pg_exec($conection,$sqlText);
	pg_close($conexion);
	return $result;
	
}*/

/*
function enviarContacto($data){
	$conection = getConnection();
	$fecha_nacimiento=substr($data['fecha_nacimiento'],6,4)."-".substr($data['fecha_nacimiento'],3,2)."-".substr($data['fecha_nacimiento'],0,2);
	$sqlText="INSERT INTO contacto (email,nombre,apellido,genero,fecha_nacimiento,pais,ciudad,estado,direccion,telefono,compania_tv,mensaje) VALUES ('".$data['email']."','".$data['nombre']."','".$data['apellido']."','".$data['genero']."','".$fecha_nacimiento."','".$data['pais']."','".$data['ciudad']."','".$data['estado']."','".$data['direccion']."','".$data['telefono']."','".$data['compania_tv']."','".$data["mensaje"]."');";
	$result = pg_exec($conection,$sqlText);
	pg_close($conexion);
	return $result;
}
*/

function sendMailContacto($to,$data){
	$host=$_SERVER['SERVER_NAME'];
	//$host=$_SERVER['HTTP_HOST'];
	$port=$_SERVER['SERVER_PORT'];
	//$port=$_SERVER['HTTP_PORT'];
	$fecha_nacimiento=substr($data['fecha_nacimiento'],6,4)."-".substr($data['fecha_nacimiento'],3,2)."-".substr($data['fecha_nacimiento'],0,2);
	$subject = 'Concurso Ant�rtida';
	// El mensaje
	$mensaje='<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><title>Inscripci&oacute;n concurso a la Antartida</title>
</head>
<body >
<p>
<strong>Datos de la persona:</strong>
</p>
<ul>
<li>E-mail: '.$data['email'].'</li>
<li>Nombre: '.$data['nombre'].'</li>
<li>Apellido: '.$data['apellido'].'</li>
<li>G&eacute;nero: '.$data['genero'].'</li>
<li>Fecha de nacimiento: '.$fecha_nacimiento.'</li>
<li>Pa&iacute;s: '.$data['pais'].'</li>
<li>Ciudad: '.$data['ciudad'].'</li>
<li>Compa&ntilde;&iacute;a de tv: '.$data['compania_tv'].'</li>
</ul>
<p>
<strong>Mensaje:<strong>
</p>
<p>'.$data["mensaje"].'
</p>
</body>
</html>';

/*Excluidos:
<li>Estado: '.$data['estado'].'</li>
<li>Direcci&oacute;n: '.$data['direccion'].'</li>
<li>Tel&eacute;fono: '.$data['telefono'].'</li>
*/
	// En caso de que cualquier linea tenga mas de 70 caracteres, habria
	// que usar wordwrap()
	$mensaje = wordwrap($mensaje, 70);
	
	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras ="From: antartida@thc.tv" . "\r\n";
	$cabeceras .= 'Reply-To: '.$data['email'] . "\r\n";
	$cabeceras .= "X-Mailer: PHP\n";
	$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	return mail($to, $subject, $mensaje,$cabeceras);


}



function validarDataHash($hash){
	
	$conection = getConnection();
	$sqlText="SELECT * FROM usuario U WHERE U.data_hash='$hash'";
	$result=pg_exec($conection,$sqlText);
	if($result==false||pg_numrows($result)==0)
		$retorno = false;
	else{
		$data = pg_fetch_array($result);
		$data['estaba_habilitado']=false;
		if($data['habilitado']=='t'){
			$data['estaba_habilitado']=true;
		}else{
			$sqlText = "UPDATE usuario SET habilitado='true' WHERE data_hash='$hash'";
			$err=pg_exec($conection,$sqlText);
			if(!$err)
				$retorno = false;
		}
		$retorno = $data;
	}
	pg_close($conexion);
	return $retorno;
	
}

?>
