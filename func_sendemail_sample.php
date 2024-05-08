<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__DIR__.'/PHPMailer/src/Exception.php');
require_once(__DIR__.'/PHPMailer/src/PHPMailer.php');
require_once(__DIR__.'/PHPMailer/src/SMTP.php');

// Curtis Lee
// Curtis@Curtis.tw
// May 8th, 2024

// SMTP Configs
$smtp_host     = 'student.nsysu.edu.tw';    // SMTP Server
$smtp_port     = 25;                        // SMTP Port
$smtp_username = '學號';                     // SMTP Username
$smtp_password = '中山信箱密碼';              // SMTP Password

function sendemail_sample($sender_email, $sender_name, $recipient_email, $recipient_name, $subject, $body) {

    // Sample for DBS 2024
    
    // SMTP Configs - Global Parameters
    global $smtp_host, $smtp_port, $smtp_username, $smtp_password;

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $smtp_host;                             //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $smtp_username;                         //SMTP username
        $mail->Password   = $smtp_password;                         //SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $smtp_port;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($recipient_email, $recipient_name);     //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return 'Message has been sent';
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>