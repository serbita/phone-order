<?php

function getConnection(){
// --------- postgreSQL ------------
//	$conn = pg_pconnect("host=localhost port=5432 dbname=titanic user=thc password=thchannell4");
//	$conn = pg_pconnect("host=localhost port=5432 dbname=antartida user=thc password=thchannell4");
//	$conn = pg_pconnect("host=192.168.251.187 port=5432 dbname=antartida user=integration password=integration");
//	pg_set_client_encoding($conn, LATIN1);
//	return $conn;

// --------- mysql  ----------------
	//mysql_connect(servername,username,password);

	//Para conectarse en production environment, debe utilizar la siguiente forma:
	$conn=mysql_connect("localhost","root","123456");
	mysql_select_db("phone-order");


//$mysql_host = "mysql15.000webhost.com";
//$mysql_database = "a6926677_serbita";
//$mysql_user = "a6926677_serbita";
//$mysql_password = "ser123";


	//Para conectarse en local environment, debe utilizar la siguiente forma:
	//$conn = mysql_connect("Localhost:3306","root","");
	//mysql_select_db("test");

	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}
	return $conn;	
}

function execQuery($conection,$sqlText){
	$databaseMotor="mysql";
	if($databaseMotor=="mysql"){
		$result=mysql_query($sqlText);
		
	}
	if($databaseMotor=="postgresql"){
		$result=pg_exec($conection,$sqlText);
	}
	return $result;
}

function validateMail($email) {
  // First, we check that there's one @ symbol, and that the lengths are right
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
     if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
      return false;
    }
  }  
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}

function tellAFriend($nombre,$email,$nombre_suscripto,$email_suscripto){
	$host=$_SERVER['SERVER_NAME'];
	//$host=$_SERVER['HTTP_HOST'];
	$port=$_SERVER['SERVER_PORT'];
	//$port=$_SERVER['HTTP_PORT'];
	$subject = "$nombre_suscripto te invita a participar de Rumbo a la Antártida";
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

?>
