<?php

$conn = new mysqli ("localhost","root","","loginvai");// conexion a la base de datos ( loginvai base datos creado en myqsli 


if($conn-> connect_errno) 
{
	echo "No hay conexion : (".$conn->connect_errno.")".$conn->connect_error; // se a conexion mostra algun problema mostra en mensaje 
	
}

// creamos las variables para recibir el usuario y contraseña 

$nombre = $_POST['txtusuario']; // txtusuario es como creamo en el formulario mismo nombre 
$pass 	= $_POST['txtpassword'];

//Para iniciar sesión
if(isset($_POST['btnloginx']))
{

$queryusuario = mysqli_query($conn,"SELECT * FROM login WHERE usu = '$nombre");
$nr 		= mysqli_num_rows($queryusuario); 
$mostrar	= mysqli_fetch_array($queryusuario); 
	
if (($nr == 1) && (password_verify($pass,$mostrar['pass'])) )
	
{ 
echo "Bienvenido : $nombre";


}
	
	
else
	{
	echo "<script> alert('Usuario o contraseña incorrecto.');window.location= 'index.html' </script>";
	}
}

//Para registrar
if(isset($_POST['btnregistrarx']))
{

$queryusuario 	= mysqli_query($conn,"SELECT * FROM login WHERE usu = '$nombre'");
$nr 			= mysqli_num_rows($queryusuario); 

if ($nr == 0)
{
//password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash fuerte de único sentido
	$pass_fuerte = password_hash($pass, PASSWORD_BCRYPT); // se crea una variable que creara la contrasena encriptada 
	$queryregistrar = "INSERT INTO login(usu, pass) values ('$nombre','$pass_fuerte')";
	

if(mysqli_query($conn,$queryregistrar))
{
	echo "<script> alert('Usuario registrado: $nombre');window.location= 'index.html' </script>";
}
else 
{
	echo "Error: " .$queryregistrar."<br>".mysql_error($conn);
}

}else
{
		echo "<script> alert('No puedes registrar a este usuario: $nombre');window.location= 'index.html' </script>";
}

} 

?>

