<?php

  // primero hay que incluir la clase phpmailer para poder instanciar
  //un objeto de la misma
  
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once 'lib/Exception.php';
include_once 'lib/PHPMailer.php';
include_once 'lib/SMTP.php';

$mail = new PHPMailer(true);
$info_contacto =  $_POST['email'];
$producto_nombre =  $_POST['productonombre'];
$id =  $_POST['idpro'];

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
    $mail->Subject = 'Peticion individual de producto';
    $mail->Body    = 'informacion de contacto: ' . $info_contacto . ' , para preteticion de producto;' . $producto_nombre;
    $mail->AltBody = '';

    $mail->send();
    header("Location: product.php?id=". $id);
} catch (Exception $e) {
    echo "error: {$mail->ErrorInfo}";
}

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
