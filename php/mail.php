<?php

  // primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
  
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../lib/Exception.php';
include_once '../lib/PHPMailer.php';
include_once '../lib/SMTP.php';

$mail = new PHPMailer(true);

$info_contacto =  $_POST['email'];
$pregunta =  $_POST['name'];

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'phptutorial19@gmail.com';                     // SMTP username
    $mail->Password   = 'abc1234...';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('phptutorial19@gmail.com', 'Jose Luis Lopez Mosteiro');
    $mail->addAddress('phptutorial19@gmail.com');     // Add a recipient
    

    // Attachments   // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Pregunta Generica';
    $mail->Body    = 'info contacto: '. $info_contacto . '   pregunta: ' . $pregunta;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo("<script>alert('Correo enviado');</script>");
    header("Location: contactanos.html");
} catch (Exception $e) {
    echo "error: {$mail->ErrorInfo}";
}






  //instanciamos un objeto de la clase phpmailer al que llamamos 
  //por ejemplo mail
 /* $mail = new PHPMailer(true);

  //Definimos las propiedades y llamamos a los métodos 
  //correspondientes del objeto mail

  //Con PluginDir le indicamos a la clase phpmailer donde se 
  //encuentra la clase smtp que como he comentado al principio de 
  //este ejemplo va a estar en el subdirectorio includes
  $mail->PluginDir="includes/";

  //Con la propiedad Mailer le indicamos que vamos a usar un 
  //servidor smtp
  $mail->Mailer = "smtp";

  //Asignamos a Host el nombre de nuestro servidor smtp
  $mail->Host = "smtp.hotpop.com";

  //Le indicamos que el servidor smtp requiere autenticación
  $mail->SMTPAuth = true;

  //Le decimos cual es nuestro nombre de usuario y password
  $mail->Username = "micuenta@HotPOP.com"; 
  $mail->Password = "mipassword";

  //Indicamos cual es nuestra dirección de correo y el nombre que 
  //queremos que vea el usuario que lee nuestro correo
  $mail->From = "micuenta@HotPOP.com";
  $mail->FromName = "Eduardo Garcia";

  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
  //una cuenta gratuita, por tanto lo pongo a 30  
  $mail->Timeout=30;

  //Indicamos cual es la dirección de destino del correo
  $mail->AddAddress("joseluisjllm97@gmail.com");

  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
  //que se vea en negrita
  $mail->Subject = "Prueba de phpmailer";
  $mail->Body = "<b>Mensaje de prueba mandado con phpmailer en formato html</b>";

  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
  $mail->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";

  //se envia el mensaje, si no ha habido problemas 
  //la variable $exito tendra el valor true
  $exito = $mail->Send();

  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
  //del anterior, para ello se usa la funcion sleep	
  $intentos=1; 
  while ((!$exito) && ($intentos < 5)) {
	sleep(5);
     	//echo $mail->ErrorInfo;
     	$exito = $mail->Send();
     	$intentos=$intentos+1;	
	
   }
 
		
   if(!$exito)
   {
	echo "Problemas enviando correo electrónico a ".$valor;
	echo "<br/>".$mail->ErrorInfo;	
   }
   else
   {
	echo "Mensaje enviado correctamente";
   } 
*/
/*require "includes/class.phpmailer.php";

try {
    $mail = new PHPMailer(true); //New instance, with exceptions enabled

    $to = "joseluisjllm97@gmail.com";
	$mail->AddAddress($to);
	$mail->From = $_POST['email'];
    $mail->FromName   = $_POST['name'];
	$mail->Subject  = "Test Email using PHP";

	$body             = "<table>
	                         <tr>
							    <th colspan='2'>This Sample Mail</th>
							 </tr>

							 <tr>
							    <td style='font-weight:bold'>Name :</td>
								<td>".$_POST['name']."</td>
							 </tr>

							 <tr>
							  <td style='font-weight:bold'>E-mail : </td>
							  <td>".$_POST['email']."</td>
							</tr>

							<tr>
							  <td style='font-weight:bold'>Phone : </td>
							  <td>".$_POST['phone']."</td>
							</tr>

							<tr>
							  <td style='font-weight:bold'>Message : </td>
							  <td>".$_POST['message']."</td>
							</tr>
	                     <table>";
	$body             = preg_replace('/\\/','', $body); //Strip backslashes
	$mail->MsgHTML($body);

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	//$mail->Host       = "mail.yourdomain.com"; // SMTP server
	//$mail->Username   = "name@domain.com";     // SMTP server username
	//$mail->Password   = "password";            // SMTP server password

	$mail->IsSendmail();  // tell the class to use Sendmail
	$mail->AddReplyTo("info@programacion.net");
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->AddAttachment($_FILES['image']['tmp_name'],
                         $_FILES['image']['name']);
	$mail->IsHTML(true); // send as HTML
	$mail->Send();
	echo 'Message has been sent.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}*/

/*require "includes/class.phpmailer.php";



$to = "joseluisjllm97@gamil.com";//direccion de correo electronico
$mail->AddAddress($to);

$mail->From = $_POST['femail'];// de quien 
$mail->FromName = $_POST['name'];


$mail->Subject = "Test Email using PHP"; /// asunto del correo

$body             = "<table>
	                         <tr>
							    <th colspan='2'>This Sample Mail</th>
							 </tr>

							 <tr>
							    <td>Name :</td>
								<td>".$_POST['name']."</td>
							 </tr>

							 <tr>
							  <td>E-mail : </td>
							  <td>".$_POST['email']."</td>
							</tr>

							<tr>
							  <td>Phone : </td>
							  <td>".$_POST['phone']."</td>
							</tr>

							<tr>
							  <td>Message : </td>
							  <td>".$_POST['message']."</td>
							</tr>
	                     <table>";
	$body             = preg_replace('/\\/','', $body); //Strip backslashes
	$mail->MsgHTML($body);



    $mail->AddAttachment($_FILES['image']['tmp_name'], //obtener archivo adjunto
$_FILES['image']['name']);

$mail->IsHTML(true); // send as HTML

$mail->Send();
echo 'Message has been sent.';

*/
?>
