<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function send_mail($send_to_email, $send_to_fullname, $subject, $content)
{
    global $config;
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $config['email']['smtp_host'];  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $config['email']['smtp_user'];                 // SMTP username
        $mail->Password = $config['email']['smtp_pass'];                           // SMTP password
        $mail->SMTPSecure = $config['email']['smtp_secure'];                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $config['email']['smtp_port'];
        $mail->CharSet = 'UTF-8'; // TCP port to connect to
        //Recipients
        $mail->setFrom($config['email']['smtp_user'], $config['email']['smtp_fullname']);
        $mail->addAddress($send_to_email, $send_to_fullname);     // Add a recipient
        //    $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($config['email']['smtp_user'], $config['email']['smtp_fullname']);
        //    $mail->addCC('cc@example.com');
        //    $mail->addBCC('bcc@example.com');
        //Attachments
        // $mail->addAttachment($config_email['file']);         // Add attachments
        //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $content;
        //    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {

        return 'Không gửi được ' . $mail->ErrorInfo;
    }
}
