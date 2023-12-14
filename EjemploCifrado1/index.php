<?php 

echo "<pre>";

$conn = mysqli_connect( 'localhost' ,'root', 'mysql' ,'PRUEBAS');
$email = 'elerikinha@dominio.es';
$password = 'admin'; //Sin crifrado 
$password = md5 'admin';// Ciframos la password , cuando grabamos el registro esta guardado en cirfrado y no se podera ver la password  se usa MD5 O SHA1 

$insert = "insert into users( email , password ) values ( ' ".$email."', '".$password."')"; 

$return = mysqli_query ( $conn, $insert);


print_r( ($return)); // si todo va bien nos devuelve un 1  ( true ) 

mysqli_close ( $conn);

?>

