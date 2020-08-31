<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../libs/PHPMailer/src/PHPMailer.php';
    require '../libs/PHPMailer/src/SMTP.php';
    require '../libs/PHPMailer/src/Exception.php';

    // Personnal imports
    

    function sendMail($gender, $firstName, $lastName, $email, $subject, $message) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                   // Enable verbose debug output
            $mail->isSMTP();                                        // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                   // Set the SMTP server to send through
            $mail->SMTPAuth   = true;
            $mail->Username   = 'gamer2fun@gmail.com';                     
            $mail->Password   = '*********';                              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
            $mail->Port       = 465;                                // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('support@hackerspoulette.com', 'SupportTeam');
            $mail->addAddress($email, $firstName . '' . $lastName);     // Add a recipient


            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Team Poulette - Your ' . $subject;
            $mail->Body    = "
                Dear {$gender} {$lastName} {$firstname},</br>
                </br>
                </br>
                Thanks your sending us your {$subject} !</br>
                </br>
                The Poulette's team will answer you <strong>within 24 hours</strong>. </br>
                </br>
                Your message was the following: {$bodymsg}</br>
                </br>
                See you soon, </br>
                </br>
                </br>
                <b>Hackers Poulette Team</b></br>
                ";
            $mail->AltBody = 'Hello, Thanks for your feedback. We\ll answer you within 24hours. Hackers Poulettes Team';

            $mail->send();
            // echo ' Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }