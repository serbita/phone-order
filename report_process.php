<?php
require_once 'functions.php';

$errors=array();
$data=array();
$success=false;

/*$mode=$_REQUEST['mode'];
$data['id']=$_REQUEST['id'];
$data['nombre']=$_REQUEST['nombre'];
$data['email']=$_REQUEST['email'];
$data['fecha_nacimiento_desde']=$_REQUEST['fecha_nacimiento_desde'];
$data['fecha_nacimiento_hasta']=$_REQUEST['fecha_nacimiento_hasta'];

//echo '*****';
//echo $data['email'];



if(!isset($mode)){
	if(count($errors)>0){
		//nothing to do
	}else{
		$result=search($data);
		require 'report.php';
	}
}else if($mode=='edit'){
	require '../birthday.php';
}else if($mode=='delete'){
	delete($data);
	$result=search($data);
	require 'report.php';
}else if($mode=='felicitar'){
	felititar($data['id']);
	$result=search($data);
	require 'report.php';	
}
*/

$result=search($data);
require 'report.php';

?>