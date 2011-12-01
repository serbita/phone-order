<?php
require_once 'functions.php';

function insertRequest($data){
        $conection = getConnection();

        $sqlText="SELECT max(id) as max FROM ml_request";
        $result = execQuery($conection,$sqlText);
        $row = mysql_fetch_array($result);
        $max=$row['max'] + 1;

//        $hash=generateHash($data);
//        $fecha_nacimiento=substr($data['fecha_nacimiento'],6,4)."-".substr($data['fecha_nacimiento'],3,2)."-".substr($data['fecha_nacimiento'],0,2);
//        $sqlText="INSERT INTO usuario (id,data_hash,primer_nombre,segundo_nombre,apellido,sexo,direccion,codigo_postal,ciudad,email,pass,fecha_nacimiento,pais,estado,telefono,login_id,web_page) VALUES (".$max.",'".$hash."','".$data['primer_nombre']."','".$data['segundo_nombre']."','".$data['apellido']."','".$data['sexo']."','".$data['direccion']."','".$data['codigo_postal']."','".$data['ciudad']."','".$data['e-mail']."','".md5($data['pass'])."','".$fecha_nacimiento."','".$data['pais']."','".$data['estado']."','".$data['telefono']."','".$data['login_id']."','".$data['web_page']."');";

//        $sqlText="INSERT INTO ml_request (id,acc_id,request) VALUES (".$max.",".$data['acc_id'].",'".$data['extra_part']."')";

        $sqlText="
INSERT INTO ml_request 
(id, acc_id, seller_op_id, mp_op_id, status, item_id, 
name, total_amount,additional_amount,price,ship_cost_amount,payment_method,extra_part) VALUES 
( ".$max.",".$data['acc_id'].",'".$data['seller_op_id']."',".$data['mp_op_id'].",'".$data['status']."','".$data['item_id']."',
'".$data['name']."',".$data['total_amount'].",".$data['additional_amount'].",".$data['price'].",".$data['ship_cost_amount'].",'".$data['payment_method']."','".$data['extra_part']."')";

        $result = execQuery($conection,$sqlText);
        //pg_close($conexion);
        mysql_close($conection);
        return $result; 
}


$errors=array();
$data=array();
$success=false;

$data['acc_id']=$_POST['acc_id'];
$data['extra_part']=$_POST['extra_part'];
$data['seller_op_id']=$_POST['seller_op_id'];
$data['mp_op_id']=$_POST['mp_op_id'];
$data['status']=$_POST['status'];
$data['item_id']=$_POST['item_id'];
$data['name']=$_POST['name'];
$data['total_amount']=$_POST['total_amount'];
$data['price']=$_POST['price'];
$data['ship_cost_amount']=$_POST['ship_cost_amount'];
$data['additional_amount']=$_POST['additional_amount'];
$data['payment_method']=$_POST['payment_method'];
$data['ins_dt']=date("F j, Y, g:i a");

if(trim($data['acc_id'])=='')
        $data['acc_id']=-1;
if(trim($data['mp_op_id'])=='')
        $data['mp_op_id']=-1;
if(trim($data['total_amount'])=='')
        $data['total_amount']=-1;
if(trim($data['price'])=='')
        $data['price']=-1;
if(trim($data['ship_cost_amount'])=='')
        $data['ship_cost_amount']=-1;
if(trim($data['additional_amount'])=='')
        $data['additional_amount']=-1;

//$dia=substr($data['fecha_nacimiento'],0,2);
//$mes=substr($data['fecha_nacimiento'],3,2);
//$ano=substr($data['fecha_nacimiento'],6,4);
//if(trim($data['fecha_nacimiento'])==''||!intval($dia)||!intval($mes)||!intval($ano)||!checkdate(intval($mes), intval($dia), intval($ano)))
//        $errors['fecha_nacimiento']="Ingrese una fecha de nacimiento v&aacute;lida";

/* if(count($errors)>0){
        require 'birthday.php';
}else{
*/
        if(!insertRequest($data)){
                $errors['falla_creacion_usuario']='Falla al crear el usuario';

                $output='error';
//                require 'birthday.php';
/*        }else if(sendMail($data['e-mail'],$data)){
                $success=true;
                require 'birthday.php';
        }else{
                $errors['falla_envio_mail']='Usted ha sido ingresado al sistema pero no se le pudo enviar el email correspondiente. Don\'t worry !!!';
                require 'birthday.php';
*/
       }else{
            $output='OK';
        }
//}
?>

<div class="main-content">        
                        <!-- Pagetitle -->
                        <h1 class="pagetitle"><?=$output?>&nbsp;&nbsp;<a href="http://serbita.freeiz.com/ml/report_process.php">Ver Reporte</a></h1>
        
                        <!-- Content unit - One column -->
                        <div class="column1-unit">
                                <table>
                                        <tr>
                                                <th class="top" scope="col">acc_id</th>
                                                <th class="top" scope="col">seller_op_id</th>
                                                <th class="top" scope="col">mp_op_id</th>
                                                <th class="top" scope="col">status</th>
                                                <th class="top" scope="col">item_id</th>
                                                <th class="top" scope="col">name</th>
                                                <th class="top" scope="col">amount</th>
                                                <th class="top" scope="col">extra_part</th>
                                        </tr>
                                
                                                <tr>
                                                        <td scope="row"><?=$data['acc_id']?></td>
                                                        <td scope="row"><?=$data['seller_op_id']?></td>
                                                        <td scope="row"><?=$data['mp_op_id']?></td>
                                                        <td scope="row"><?=$data['status']?></td>
                                                        <td scope="row"><?=$data['item_id']?></td>
                                                        <td scope="row"><?=$data['name']?></td>
                                                        <td scope="row"><?=$data['amount']?></td>
                                                        <td scope="row"><?=$data['extra_part']?></td>                                       
                                                </tr>                                               
                                </table> 
                                                                <?=
               $sqlText="
INSERT INTO ml_request 
(id, acc_id, seller_op_id, mp_op_id, status, item_id, 
name, total_amount,additional_amount,price,ship_cost_amount,payment_method,extra_part) VALUES 
( ".$max.",".$data['acc_id'].",'".$data['seller_op_id']."',".$data['mp_op_id'].",'".$data['status']."','".$data['item_id']."',
'".$data['name']."',".$data['total_amount'].",".$data['additional_amount'].",".$data['price'].",".$data['ship_cost_amount'].",'".$data['payment_method']."','".$data['extra_part']."')";

                                                                ?>
                        </div>
 </div>
                <!-- END B.2 MAIN CONTENT -->