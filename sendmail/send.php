<?php
require 'PHPMailer/PHPMailerAutoload.php';
function envoieMail( string $email, string $trackingNumber) {
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'f677433@gmail.com';                 // SMTP username
    $mail->Password = 'pbuidbazrlifbjxg';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    
    $mail->setFrom('f677433@gmail.com', 'yallawonders');
    $mail->addAddress($email , 'Mr/Miss');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Track Number';
    $mail->Body    = 'Merci pour votre commande. Votre numéro de suivi est : <b>' . $trackingNumber . '</b>';
    $mail->AltBody = 'Merci pour votre commande. Votre numéro de suivi est ' . $trackingNumber;
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}


function contactUs(string $userName, string $userEmail, string $userPhone, string $subject, string $message) {
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'f677433@gmail.com';
    $mail->Password = 'pbuidbazrlifbjxg';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    
    $mail->setFrom($userEmail, $userName);
    $mail->addAddress('f677433@gmail.com'); 

    $mail->isHTML(true);
    $mail->Subject = htmlspecialchars($subject);
    $mail->Body    = nl2br(htmlspecialchars("Name: $userName\nEmail: $userEmail\nPhone: $userPhone\n\nMessage:\n$message"));
    $mail->AltBody = htmlspecialchars("Name: $userName\nEmail: $userEmail\nPhone: $userPhone\n\nMessage:\n$message");

    if (!$mail->send()) {
        echo 'Le message n\'a pas pu être envoyé.';
        echo 'Erreur du Mailer: ' . $mail->ErrorInfo;
    } else {
        echo 'Le message a été envoyé avec succès.';
    }
}