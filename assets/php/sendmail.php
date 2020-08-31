<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../libs/PHPMailer/src/PHPMailer.php';
    require '../libs/PHPMailer/src/SMTP.php';
    require '../libs/PHPMailer/src/Exception.php';

    // Personnal imports
    

    function sendMail($gender, $firstName, $lastName, $email, $subject, $bodymsg) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                        // Enable verbose debug output
            $mail->isSMTP();                                             // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
            $mail->SMTPAuth   = true;
            $mail->Username   = 'somethin@gmail.com';                     
            $mail->Password   = 'password here';                              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
            $mail->Port       = 465;                                      // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('support@hackerspoulette.com', 'SupportTeam');
            $mail->addAddress($email, $firstName . '' . $lastName);       // Add a recipient
            $mail->AddEmbeddedImage("../img/hackers-poulette-logo.png", "my-logo", "logo.png"); // Add the logo


            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Team Poulette - Your ' . $subject;
            $mail->Body    = "
                Dear {$gender} {$lastName} {$firstName},<br />
                <br />
                <br />
                This is a confirmation of your {$subject} problem !<br />
                <br />
                We will give you a feedback <strong>within 24 hours</strong>. <br />
                <br />
                Your message was the following:<br />
                <br /> <em>{$bodymsg}</em><br />
                Best regards <br />
                <br />
                <b>Support Team / Hackers Poulette Team</b><br />
                <img alt='PHPMailer' src='cid:my-logo' width='90' height='90'>
                ";
            $mail->AltBody = 'Hello, Thanks for your feedback. We\ll answer you within 24hours. Hackers Poulettes Team';

            $mail->send();
            return true;
            // echo ' Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
