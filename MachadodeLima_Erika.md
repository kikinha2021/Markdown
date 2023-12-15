# 				1 - Introducción

​		El Open Web Application Security Project [OWASP](https://www.owasp.org )   es una organización sin fines de lucro con la misión de mejorar la seguridad de las aplicaciones web. OWASP persigue esta misión proporcionando a los desarrolladores acceso gratuito a una amplia variedad de recursos de seguridad, incluyendo listados de vulnerabilidades, mejores prácticas de seguridad, sistemas deliberadamente vulnerables para practicar pruebas de aplicaciones web y más. 

​	OWASP también ha apoyado el desarrollo de herramientas de prueba de seguridad de aplicaciones y organiza múltiples conferencias anuales en todo el mundo.



#### 1. 1 - Vulnerabilidades de seguridad de aplicaciones recogidas de OWASP :  



[Top 10 ](https://owasp.org/www-project-top-ten) 



- Control de acceso roto
- Fallos Criptográficos
- Inyección
- Diseño inseguro
- Mal configuración de seguridad
- Componentes vulnerables y obsoletos
- Fallos de identificación y autenticación
- Fallas de integridad de datos y software
- Fallos de registro y monitoreo de seguridad
- Falsificación de solicitudes del lado del servidor 





# 				2 -  Vulnerabilidades de seguridad de aplicaciones recogidas de OWASP  -  Fallos Criptográficos 



​		Un [fallo criptográfico](https://owasp.org/Top10/es/A02_2021-Cryptographic_Failures) es un fallo de seguridad que se produce cuando una entidad de terceros (aplicaciones, páginas web, diferentes sitios web) expone datos sensibles. Para ser exactos, es cuando esa entidad lo hace sin una intención específica detrás. Ya sea por negligencia, incompetencia o descuido, un fallo criptográfico puede tener consecuencias personales y empresariales catastróficas.

​		A veces se debe a una protección inadecuada de la base de datos. Otras veces, se debe a errores de configuración al poner en marcha nuevas instancias de almacenes de datos. A veces, la exposición de datos sensibles se debe a un uso inadecuado de los sistemas de datos.


​		Originalmente llamado exposición de datos sensibles, un fallo criptográfico se produce cuando un sistema hace que los datos sensibles sean accesibles a fisgones potencialmente snoopers maliciosos. También ocurre cuando se produce un incidente de seguridad que permite el borrado accidental/ilegal, la destrucción, la alteración o la divulgación injustificada de información sensible.

####                                 2. 1 -  En general, los fallos criptográficos se dividen en tres categorías:

**Violación de la confidencialidad** . Es lo que ocurre cuando un tercero puede acceder a datos confidenciales o cuando una organización revela dichos datos por accidente.

**Violación de la integridad**  Ésta describe una situación en la que se alteran datos confidenciales, una vez más, sin autorización y/o intención detrás.

**Violación de la disponibilidad**  Pertenecen a esta categoría las situaciones en las que se destruyen datos sensibles o se pierde el acceso a ellos. La categoría cubre tanto la pérdida de datos permanente como la temporal. 



#### 2 .  2  ¿ Que datos hay que proteger ? 



- Contraseñas 

- Numero de tarjetas de créditos , contas bancarias 

- Registro de Salud , creencias, afiliaciones políticas 

- Información Personal 

- Secreto Empresariales , industriales , propios de cada empresa 



#### 2. 3 Debilidades 



- Datos Transmitidos en claro en los distintos servidores de nuestra arquitectura , ejemplo balanceadores de carga , entre servidor web y backend 

- Algoritmos o protocolos criptográficos antiguos o débiles 

- Claves criptográficas débiles, reutilizadas o por defecto 

-  Validación cadena de certificación 

- Inicialización y semillas de clases 

- Uso de contraseñas como clave 

- Uso de aleatoriedad como criptografía 

- Uso de funciones hash en desuso ( MD5,SHA1) están obsoletas
- Uso de funciones de relleno obsoletas (PCKS 1 v1.5)
- Mensajes de error criptográfico explotables 



#### 2. 4 Prevención 



- Clasificar los datos según su sensibilidad
- Aplicar los controles adecuados a cada nivel 
- No almacenar datos sensibles no necesarios 
- Cifrar los datos sensibles almacenados 
- Cifrar los datos sensibles en transito 
- Usar algoritmos y protocolos estándares y fuertes 
- No implementar algoritmos propios 
- Almacenar contraseñas hasheadas con Salt 
- Escoger los vectores de inicialización adecuados
- Generar claves aleatoriamente 
- Preferir cifrado autenticado a cifrado simple 



## 3 - Los Escenarios de Ataques Criptográficos 



**1 - Escenario :  Almacenamiento de contraseñas : ** 



​		Es un mal almacenamiento de las contraseñas en base de datos , se están guardando las contraseñas hasheadas , pero sin completar un salt , es decir sin unos bits extra que la distorsionen . En este caso el atacante puede consultar las tablas arcoiris , raiw table, que no es más que una tabla precalculada con los valores que tomarían los hash, como los antiguos libros de logaritmos, vamos, y así poder desencriptar las contraseñas y recuperar sus valores en claro. Si añadimos los caracteres extra a cada contraseña, los hash resultantes ya no tendrán ningún parecido. Así que, aun encontrándolos en las tablas arcoíris, difícilmente nos llevarían al valor original. Pero ,  incluso si salamos las contraseñas, podrían ser crackeadas si la función hash escogida es demasiado rápida o simple. Así que lo suyo es salarlas y usar funciones seguras .



**2 - Escenario - Cifrado Automático** 



​		La  aplicación cifra los datos delicados, como los números de cuenta de sus clientes, utilizando el cifrado automático de la base de datos. En  la base de datos, no habrá datos en claro. Sin embargo, ese mismo sistema automático de la base de datos descifra la información en el momento de recuperarla. Es automático, es transparente para nosotros, tan transparente que es inútil. Porque, por ejemplo, si sufriéramos un ataque de inyección SQL, el atacante recuperaría los datos como nosotros, en claro. En cambio, si el cifrado y descifrado lo hacemos a mano en la capa de servicio, el resultado obtenido en ese ataque no pasaría por esa fase de descifrado y seria información no explotable por el atacante.



**3 -  Escenario - Mi cuenta ** :  



​		Una  aplicación que  no usa o no fuerza el uso de TLS, es decir, de seguridad en la capa de transporte en todas sus páginas o usa una encriptación demasiado débil. Un atacante monitorea el tráfico de red, por ejemplo, usando un red wifi pública, degrada las conexiones de HTTPS a HTTP, intercepta peticiones y roba la cookie con la sesión de usuario. 

​	Con toda esa información, ya puede secuestrar la sesión de usuario, probablemente autenticada, y así acceder como si fuera el usuario legítimo a sus datos privados, incuso modificarlos. Incluso podría cambiar el destinatario de esa transferencia de un millón de euros que acabas de hacerte de un banco a otro. Si hay un camino difícil y un camino fácil, evidentemente, los malos intentarán ir por el camino fácil; por eso, solo podemos tener el camino difícil.





####  1   - Ejemplo - Escenario 1 - De un mal y buen almacenamiento de las contraseñas 





````java


package owasp;

import java.util.Base64;
import java.security.SecureRandom;
import javax.crypto.spec.PBEKeySpec;


/**
 *
 * @author Erika Machado de Lima 
 */
public class Salt {
        
    public static void main(String[] args){
        
        String[] contrasenas = { "password123","mimamama","fsjjsjjs3444"};
        System.out.println("MAL: ");
        for (String s : contrasenas){
            byte[] salt = saltPredecible();
            System.out.print("salt: " + new String (Base64.getEncoder().encode(salt)));
            generaClave(s, salt);
            
              
        } 
        
        System.out.println("BIEN: ");
        for (String s : contrasenas){
            byte[] salt = saltBueno();
            System.out.print("salt: " + new String(Base64.getEncoder().encode(salt)));
            generaClave(s , salt);
            
     
        }
        
    }
   
    
 private static byte [] saltPredecible() {
     return "holahola".getBytes();
 }

 private static byte [] saltBueno(){
     
        SecureRandom random = new SecureRandom();
        byte [] salt = new byte [16];
        random.nextBytes(salt);
        return salt;
 }
    
private static void generaClave(String pw, byte [] salt){
    PBEKeySpec spec = new PBEKeySpec (pw.toCharArray(), salt, 10, 256);
    System.out.println ("\Contraseña: " +  new String (spec.getPassword()));
}
}


    
````





![Imagem](C:\Users\PERSONAL\OneDrive\Escritorio\CiberSeguridad\6 - Posta en produción segura\UD2\Tarea UD2\MachadodeLima_Erika\Captura\Captura1.JPG)











####   Explicación detallada - Escenario 1 - De un mal y buen almacenamiento de las contraseñas



#### **1 -  Ejemplo** :

####  

 A la hora de almacenar las contraseñas , además de guardarlas hasheadas , para no guardar los originales conviene añadir un salt , es decir unos bits aleatorios que dificultarán el descifrado de las contraseñas usando diccionarios .



- En el siguiente código en Java analizamos detalladamente  como haríamos un buen código y mal codigo con vulnerabilidad . Se utiliza la clase PBEKeySpec que es una clase del paquete javax.crypto que significa Password- Based Ecription , cifrado basado en contraseña  . Una contraseña que nos proporciona por ejemploe el usuario . Creamos un método que a partir de una contraseña y un salt nos genera una clave .

  Uno de los constructores de esta clase recibe la contraseña , el salt , el numero de iteraciones y el tamaño de la clave  . La contraseña es la semilla , el salt  nada mas es para dificultar el descifrado con diccionarios . El numero de iteraciones es la de veces que se hasheará aún mas el descifrado

  Finalmente el tamaño de la clave que indica de que tamaño quiero la clave resultante por ejemplo 256 

```java
    PBEKeySpec spec = new PBEKeySpec (pw.toCharArray(), salt, 10, 256);
    System.out.println ("\Contraseña: " +  new String (spec.getPassword()));

```



-  Ejemplo de un mal código  partiendo de algo fijo   , simplemente recuperando los bytes de un string en concreto como por ejemplo hola,hola 



``` java
 private static byte [] saltPredecible() {
     return "holahola".getBytes();
 }
```



- Se comprueba con un main que nos genera claves con tres contraseñas distintas  



```java
        
    public static void main(String[] args){
        
        String[] contrasenas = { "password123","mimamama","fsjjsjjs3444"};
        System.out.println("MAL: ");
        for (String s : contrasenas){
            byte[] salt = saltPredecible();
            System.out.print("salt: " + new String (Base64.getEncoder().encode(salt)));
            generaClave(s, salt);
            
              
```



- Se ejecutamos , se verifica como era previsible que el salt representando en base 64 es siempre el mismo  . 

  

![imagen](C:\Users\PERSONAL\OneDrive\Escritorio\CiberSeguridad\6 - Posta en produción segura\UD2\Tarea UD2\MachadodeLima_Erika\Captura\Captura2.JPG)



- Para evitar esta vulnerabilidad y realizar un buen código , se debería usar la clase SecureRandon de Java  y pedirle que nos genere un nuevo de churro de bytes aleatorios , comprobamos el salt bueno : 



```    java
        for (String s : contrasenas){
            byte[] salt = saltBueno();
            System.out.print("salt: " + new String(Base64.getEncoder().encode(salt)));
            generaClave(s , salt);
            
```



- Se ejecutamos y se verifica que los resultados son distintos , cada salt es distinto , por lo tanto mas seguro 



![imagem](C:\Users\PERSONAL\OneDrive\Escritorio\CiberSeguridad\6 - Posta en produción segura\UD2\Tarea UD2\MachadodeLima_Erika\Captura\Captura3.JPG)







#### 2 - Ejemplo :





####  Explicación detallada - Escenario 1  - De un mal y buen almacenamiento de las contraseñas



 JWT ,Json Tokens , es un estándar para la creación de tokens de acceso que va permitir transmitir la identidad y los privilegios de un usuario . Verificamos en el siguiente código cuadro métodos , dos de generación de Token , dos de validación . Uno de cada con firma y el otro de casa sin firma 

 

````JAVA

import com.auth0.jwt.JWT;
import com.auth0.jwt.algorithms.Algorithm;
import com.auth0.jwt.exceptions.JWTVerificationException;
import com.auth0.jwt.interfaces.DecodedJWT;
import com.auth0.jwt.interfaces.JWTVerifier;

public class Tokens {
	private static final String EMISOR = "Emisor";
	private static final String CLAVE_SECRETA = "shhhhshhhh";

	public static void main(String[] args) {
		System.out.println("INSEGURO");
		String tokenInseguro = generaTokenInseguro();
		System.out.println("Token: " + tokenInseguro);
		validaTokenInseguro(tokenInseguro);
		System.out.println();
		
		System.out.println("SEGURO");
		String token = generaTokenSeguro();
		System.out.println("Token: " + token);
		validaTokenSeguro(token);
		System.out.println();
		
		System.out.println("Verificar token inseguro con validaciÃ³n segura:");
		validaTokenSeguro(tokenInseguro);
	}

	private static String generaTokenInseguro() {
		return JWT.create().withIssuer(EMISOR)
				.withClaim("clave", "valor")
				.sign(Algorithm.none());
	}

	private static void validaTokenInseguro(String token) {
		try {
			JWTVerifier verifier = JWT.require(Algorithm.none()).withIssuer(EMISOR).build();

			DecodedJWT decodedJWT = verifier.verify(token);

			System.out.println("VerificaciÃ³n OK");
			System.out.println("Privilegios: " + decodedJWT.getClaims());
		} catch (JWTVerificationException ex) {
			System.out.println("VerificaciÃ³n KO: " + ex.getMessage());
		}
	}

	private static String generaTokenSeguro() {
		Algorithm algorithm = Algorithm.HMAC512(CLAVE_SECRETA);

		return JWT.create().withIssuer(EMISOR)
				.withClaim("clave", "valor")
				.sign(algorithm);
	}

	private static void validaTokenSeguro(String token) {
		Algorithm algorithm = Algorithm.HMAC512(CLAVE_SECRETA);

		try {
			JWTVerifier verifier = JWT.require(algorithm).withIssuer(EMISOR).build();

			DecodedJWT decodedJWT = verifier.verify(token);

			System.out.println("VerificaciÃ³n OK");
			System.out.println("Privilegios: " + decodedJWT.getClaims());
		} catch (JWTVerificationException ex) {
			System.out.println("VerificaciÃ³n KO: " + ex.getMessage());
		}
	}
}
````





Creamos un nuevo JWT en el siguiente codigo abajo con emisor , privilegio y algoritmo de firma .E los privilegios , se puede poner las claves valor que nos interesa , lo que no debería hacer NUNCA es usar el algoritmo none , es decir ninguno . Si no está firmado no se puede validar la firma . Así que el código de validación que genera un validador y luego lo valida deberá usar el mismo algoritmo , none  .

Un código sin vulnerabilidad , seguro y evitar fallos criptográficos  , entonces se debe usar un algoritmo 



```java
private static String generaTokenInseguro() {
		return JWT.create().withIssuer(EMISOR)
				.withClaim("clave", "valor")
				.sign(Algorithm.none());
	}

	private static void validaTokenInseguro(String token) {
		try {
			JWTVerifier verifier = JWT.require(Algorithm.none()).withIssuer(EMISOR).build();

			DecodedJWT decodedJWT = verifier.verify(token);

			System.out.println("VerificaciÃ³n OK");
			System.out.println("Privilegios: " + decodedJWT.getClaims());
		} catch (JWTVerificationException ex) {
			System.out.println("VerificaciÃ³n KO: " + ex.getMessage());
		}
	}
```

Un código sin vulnerabilidad , seguro y evitar fallos criptográficos  , entonces se debe usar un algoritmo  en este caso HMC512 con una clave , en este caso se firma , se valida y usando un algoritmo seguro



````java
private static String generaTokenSeguro() {
		Algorithm algorithm = Algorithm.HMAC512(CLAVE_SECRETA);

		return JWT.create().withIssuer(EMISOR)
				.withClaim("clave", "valor")
				.sign(algorithm);
	}
````



- Si ejecutamos  el programa se verifica que el Token inseguro se valida bien , pero de forma insegura . El token seguro es mas largo y también se valida bien . Si intentamos validar con firma un token sin firmar , no lograría . 

- La idea es utilizar JWT , pero siempre es importante que vayan firmados y al verificarlos comprobar la firma 























































 

