<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email =  $_POST['email'];


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'absolyutov71@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Y7m9O3d1'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('absolyutov71@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('https://digital-spectr.com/ac/academy.php');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment($_FILES['upload']['tmp_name'], $_FILES['upload']['name']);    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка от Григорьева И.А.';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. ' <br> Почта этого пользователя: ' .$email;
$mail->AltBody = ''; 

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>


