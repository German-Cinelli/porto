<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailing {

    public static function sendMail($mailEmail, $mailSubject, $mailBody){
        
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;          // = SMTP::DEBUG_SERVER            // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';         // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'contacto@sevencrows.uy';         // SMTP username
            $mail->Password   = '5ft7b01djui7';                         // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('contacto@sevencrows.uy', 'SevenParts']);
            $mail->addAddress($mailEmail);     // Add a recipient

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $mailSubject;
            $mail->Body    = $mailBody;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $sent = $mail->send();

            if($sent){

                return 'sent'; // Completed

            } else {

                return 'error';
            }

        } catch (Exception $e) {
            return 'error';
            //echo "Hubo un error al enviar: {$mail->ErrorInfo}";
        }  


    }

}