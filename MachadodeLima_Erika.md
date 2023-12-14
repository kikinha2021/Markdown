# 				1 - Introducción

 		El Open Web Application Security Project [OWASP](https://www.owasp.org )   es una organización sin fines de lucro con la misión de mejorar la seguridad de las aplicaciones web. OWASP persigue esta misión proporcionando a los desarrolladores acceso gratuito a una amplia variedad de recursos de seguridad, incluyendo listados de vulnerabilidades, mejores prácticas de seguridad, sistemas deliberadamente vulnerables para practicar pruebas de aplicaciones web y más. 

​		OWASP también ha apoyado el desarrollo de herramientas de prueba de seguridad de aplicaciones y organiza múltiples conferencias anuales en todo el mundo.



#### 1. 1 - Vulnerabilidades de seguridad de aplicaciones recogidas de OWASP :  



[Top 10 ](https://owasp.org/www-project-top-ten) 



- Control de acceso roto
- Fallas criptográficas
- Inyección
- Diseño inseguro
- Mal configuración de seguridad
- Componentes vulnerables y obsoletos
- Fallos de identificación y autenticación
- Fallas de integridad de datos y software
- Fallos de registro y monitoreo de seguridad
- Falsificación de solicitudes del lado del servidor 





# 				2 -  Fallos Criptográficos 



​		Un [fallo criptográfico](https://owasp.org/Top10/es/A02_2021-Cryptographic_Failures) es un fallo de seguridad que se produce cuando una entidad de terceros (aplicaciones, páginas web, diferentes sitios web) expone datos sensibles. Para ser exactos, es cuando esa entidad lo hace sin una intención específica detrás. Ya sea por negligencia, incompetencia o descuido, un fallo criptográfico puede tener consecuencias personales y empresariales catastróficas.

​		A veces se debe a una protección inadecuada de la base de datos. Otras veces, se debe a errores de configuración al poner en marcha nuevas instancias de almacenes de datos. A veces, la exposición de datos sensibles se debe a un uso inadecuado de los sistemas de datos.


​		Originalmente llamado exposición de datos sensibles, un fallo criptográfico se produce cuando un sistema hace que los datos sensibles sean accesibles a fisgones potencialmente snoopers maliciosos. También ocurre cuando se produce un incidente de seguridad que permite el borrado accidental/ilegal, la destrucción, la alteración o la divulgación injustificada de información sensible.

####                                 2. 1 -  En general, los fallos criptográficos se dividen en tres categorías:

**Violación de la confidencialidad** . Es lo que ocurre cuando un tercero puede acceder a datos confidenciales o cuando una organización revela dichos datos por accidente.
**Violación de la integridad**  Ésta describe una situación en la que se alteran datos confidenciales, una vez más, sin autorización y/o intención detrás.
**Violación de la disponibilidad**  Pertenecen a esta categoría las situaciones en las que se destruyen datos sensibles o se pierde el acceso a ellos. La categoría cubre tanto la pérdida de datos permanente como la temporal. 



#### 2. 2 - Descripción 

​		

- Se transmiten datos en texto claro? Esto se refiere a protocolos como HTTP, SMTP, FTP que también utilizan actualizaciones de TLS como STARTTLS. El tráfico externo de Internet es peligroso. Verifique todo el tráfico interno, por ejemplo, entre balanceadores de carga, servidores web o sistemas de back-end.
- ¿Se utilizan algoritmos o protocolos criptográficos antiguos o débiles de forma predeterminada o en código antiguo?
- ¿Se utilizan claves criptográficas predeterminadas, se generan o reutilizan claves criptográficas débiles, o es inexistente la gestión o rotación de claves adecuadas? ¿Se incluyen las claves criptográficas en los repositorios de código fuente?
- ¿No es forzado el cifrado, por ejemplo, faltan las directivas de seguridad de los encabezados HTTP (navegador) o los encabezados?
- ¿El certificado de servidor recibido y la cadena de confianza se encuentran debidamente validados?
- ¿Los vectores de inicialización se ignoran, se reutilizan o no se generan de forma suficientemente seguros para el modo de operación criptográfico? ¿Se utiliza un modo de funcionamiento inseguro como el ECB? ¿Se utiliza un cifrado cuando el cifrado autenticado es más apropiada?
- ¿Las contraseñas se utilizan como claves criptográficas en ausencia de una función de derivación de claves a partir de contraseñas?
- ¿Se utiliza con fines criptográficos generadores de aleatoriedad que no fueron diseñaron para dicho fin? Incluso si se elige la función correcta, debe ser inicializada (seed) por el desarrollador y, de no ser así, ¿el desarrollador ha sobrescrito la funcionalidad de semilla fuerte incorporada con una semilla que carece de suficiente entropía/imprevisibilidad?
- ¿Se utilizan funciones hash en obsoletas, como MD5 o SHA1, o se utilizan funciones hash no criptográficas cuando se necesitan funciones hash criptográficas?



#### 2. 3 - Como  Prevenir un Fallo Criptográfico



- Clasifique los datos procesados, almacenados o transmitidos por una aplicación. Identifique qué datos son confidenciales de acuerdo con las leyes de privacidad, los requisitos reglamentarios o las necesidades comerciales.

- No almacene datos sensibles innecesariamente. Descártelos lo antes posible o utilice una utilización de tokens compatible con PCI DSS o incluso el truncamiento. Los datos que no se conservan no se pueden robar.

- Asegúrese de cifrar todos los datos sensibles en reposo (almacenamiento).

- Garantice la implementación de algoritmos, protocolos y claves que utilicen estándares sólidos y actualizados; utilice una gestión de claves adecuada.

- Cifre todos los datos en tránsito con protocolos seguros como TLS con cifradores de confidencialidad adelantada (forward secrecy, o FS), priorización de cifradores por parte del servidor y parámetros seguros. Aplique el cifrado mediante directivas como HTTP Strict Transport Security (HSTS).

- Deshabilite el almacenamiento en caché para respuestas que contengan datos sensibles.

- Aplique los controles de seguridad requeridos según la clasificación de los datos.

- No utilice protocolos antiguos como FTP y SMTP para transportar datos sensibles.

- Almacene las contraseñas utilizando funciones robustas, flexibles, que utilicen sal en los hashes y use un factor de retraso (factor de trabajo), como Argon2, scrypt, bcrypt o PBKDF2.

- Elija vectores de inicialización apropiados para el modo de operación. Para muchos modos, esto significa usar un CSPRNG (generador de números pseudoaleatorios criptográficamente seguro). Para los modos que requieren un nonce, el vector de inicialización (IV) no necesita un CSPRNG. En todos los casos, el IV nunca debe usarse dos veces para una clave fija.

- Utilice siempre cifrado autenticado en lugar de solo cifrado.

    

    

    # 3 - Necesidad de un control más estricto de las claves y algoritmos criptográficos



 

​		En resumen, el cifrado es una herramienta poderosa para proteger datos sensibles, pero cuando se utiliza mal o se descuida, puede ser el origen de brechas de seguridad catastróficas.

Muchos de los errores más comunes relacionados con la criptografía pueden atribuirse a fallos en el control de las claves criptográficas y los algoritmos. He aquí algunos de los problemas más comunes:

​		Uso de algoritmos y protocolos criptográficos débiles u obsoletos.
A medida que avanza la tecnología, los algoritmos y protocolos que antes se consideraban seguros pueden volverse vulnerables. 

​		Del mismo modo, el uso de métodos de relleno criptográfico obsoletos, como PKCS número 1 v1.5, también puede dar lugar a vulnerabilidades.

Uso inadecuado de claves criptográficas
Las claves criptográficas son una parte fundamental de la criptografía, pero a menudo se gestionan mal.

​		Entre los problemas más comunes se encuentran el uso, generación o reutilización de claves criptográficas débiles y la falta de rotación adecuada de las claves.

Además, un almacenamiento inadecuado de las claves, como almacenarlas en el código fuente, puede hacerlas vulnerables a la exposición y el robo.

​		Transmisión de datos en texto plano
Incluso con cifrado, si los datos se transmiten en texto claro (por ejemplo, a través de protocolos como HTTP, SMTP, FTP), pueden ser interceptados y leídos por atacantes.

​		Fallo en la validación adecuada de certificados y cadenas de confianza
Para establecer una conexión segura, debe validar correctamente los certificados del servidor y las cadenas de confianza. Si no lo hace, los atacantes pueden hacerse pasar por entidades de confianza e interceptar o alterar los datos.

​		Ausencia de cifrado autenticado
El cifrado autenticado es una forma de criptografía que no sólo protege la confidencialidad de los datos, sino también su integridad y autenticidad.

Si sólo se utiliza el cifrado, sin autenticación, los datos pueden ser vulnerables a determinados tipos de ataques.





# 				6  . Ejemplos de Escenarios de Ataques

**Escenario #1:** 

​		Cómo podríamos ser atacados si nuestro código presenta vulnerabilidades debido a fallos criptográficos. El primer escenario se plantea  un mal almacenamiento de las contraseñas en la base de datos. Se están guardando las contraseñas hasheadas, pero sin completar con un salt, es decir, sin unos bits extra que la distorsionen. En este caso, el atacante puede consultar las tablas arcoíris, rainbow table, que no es más que una tabla precalculada con los valores que tomarían los hash, como los antiguos libros de logaritmos, vamos, y así poder desencriptar las contraseñas y recuperar sus valores en claro. Si añadimos los caracteres extra a cada contraseña, los hash resultantes ya no tendrán ningún parecido. Así que, aun encontrándolos en las tablas arcoíris, difícilmente nos llevarían al valor original. Pero ,  incluso si salamos las contraseñas, podrían ser crackeadas si la función hash escogida es demasiado rápida o simple. Así que lo suyo es salarlas y usar funciones seguras .

**Escenario #2 :** 

​		Como segundo escenario, imagina esto. La aplicación cifra los datos delicados, como los números de cuenta de sus clientes, utilizando el cifrado automático de la base de datos. Bien, en la base de datos, no habrá datos en claro. Sin embargo, ese mismo sistema automático de la base de datos descifra la información en el momento de recuperarla. Es automático, es transparente para nosotros, tan transparente que es inútil. Porque, por ejemplo, si sufriéramos un ataque de inyección SQL, el atacante recuperaría los datos como nosotros, en claro. En cambio, si el cifrado y descifrado lo hacemos a mano en la capa de servicio, el resultado obtenido en ese ataque no pasaría por esa fase de descifrado y seria información no explotable por el atacante

**Escenario #3 :** 

​		Vamos a por el tercer y último escenario? Tenemos una aplicación que o no usa o no fuerza el uso de TLS, es decir, de seguridad en la capa de transporte en todas sus páginas o usa una encriptacion demasiado débil. Un atacante monitorea el tráfico de red, por ejemplo, usando un red wifi pública, degrada las conexiones de HTTPS a HTTP, intercepta peticiones y roba la cookie con la sesión de usuario. Con toda esa información, ya puede secuestrar la sesión de usuario, probablemente autenticada, y así acceder como si fuera el usuario legítimo a sus datos privados, incuso modificarlos. Incluso podría cambiar el destinatario de esa transferencia de un millón de euros que acabas de hacerte de un banco a otro. Si hay un camino difícil y un camino fácil, evidentemente, los malos intentarán ir por el camino fácil; por eso, solo podemos tener el camino difícil.



**Escenario #1**  de un mal y buen almacenamiento de las contraseñas en la base de datos  : 



Primero escenario planteado es un mal funcionamiento en la base de datos donde creamos una pagina web de registro de usuarios , lo que vamos ver como almacenar contraseñas seguras criptadas en PHP y Mysql porque tienen que estar cifradas no se puede dejar nunca en la vista y tienen que ser siempre seguras para prevenir atacantes y fallos criptográficos . 



![Imagen](C:\Users\PERSONAL\OneDrive\Escritorio\CiberSeguridad\6 - Posta en produción segura\UD2\Tarea UD2\Capturas\Captura4.JPG)





![Imagen](C:\Users\PERSONAL\OneDrive\Escritorio\CiberSeguridad\6 - Posta en produción segura\UD2\Tarea UD2\Capturas\Captura44.JPG)





- **Mal funcionamiento**   :

Verificamos un mal funcionamiento porque la contraseña generada en PHP no es crifrada 

````  php

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
````



![Captura1](C:\Users\PERSONAL\OneDrive\Escritorio\CiberSeguridad\6 - Posta en produción segura\UD2\Tarea UD2\Capturas\Captura1.JPG)







- **Buen Funcionamiento** : 

  Desarrollamos una pagina web con PHP, HTML, CSS y MYQSl de registro de usuarios con las contraseñas encriptadas en la base de datos : 

```html
<head>
	<meta charset="UTF-8">
     <title> Erika Machado de Lima </title>
     <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="cajafuera">
    <div class="formulariocaja">
        <div class="botondeintercambiar">
            <div id="btnvai"></div>
             <button type="button" class="botoncambiarcaja" onclick="loginvai()">Login</button>
             <button type="button" class="botoncambiarcaja" onclick="registrarvai()">Registrar</button>
		</div>
				<div class="logovai">
					<img src="logo1.png">
				</div>
		<!--Formulario para el login -->
        <form id="frmlogin" class="grupo-entradas" method="POST" action="login_registrar.php">
        <input type="text" class="cajaentradatexto" placeholder="&#128273; Ingresar usuario" name="txtusuario" required>
        <input type="password" class="cajaentradatexto" placeholder="&#128274; Ingresar contraseña" name="txtpassword" required>
        <input type="checkbox" class="checkboxvai"><span>Recordar contraseña</span>
        <button type="submit" class="botonenviar" name="btnloginx">Iniciar sesión</button>
        </form>
		<!--Formulario para registrar -->
        <form id="frmregistrar" class="grupo-entradas" method="POST" action="login_registrar.php">
        <input type="text" class="cajaentradatexto" placeholder="&#128273 Ingresar usuario" required 
		name="txtusuario">
        <input type="password" class="cajaentradatexto" placeholder="&#128274 Ingresar contraseña" required name="txtpassword">
        <input type="checkbox" class="checkboxvai"><span>He leído y acepto los términos y condiciones de uso.</span>
        <button type="submit" class="botonenviar" name="btnregistrarx">Registrar</button>
        </form>
        </div>
    </div>
    <script>
    var x = document.getElementById("frmlogin");
    var y = document.getElementById("frmregistrar");
    var z = document.getElementById("btnvai");
        
        function registrarvai(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
            function loginvai(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</body>
</html>
```



 

```php+HTML
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


```





![Imagen](C:\Users\PERSONAL\OneDrive\Escritorio\CiberSeguridad\6 - Posta en produción segura\UD2\Tarea UD2\Capturas\prueba1.JPG)





* **Contraseña Encriptada  y Segura**

  

  

  ![imagen](C:\Users\PERSONAL\OneDrive\Escritorio\CiberSeguridad\6 - Posta en produción segura\UD2\Tarea UD2\Capturas\prueba2.JPG)

  

   

