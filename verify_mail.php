<?php
$token =$_GET['token'];
$emp_mail=$_GET['email'];
#mail verification
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Use PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';         // Use Gmail's SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tt2825839@gmail.com';   // Your Gmail
    $mail->Password   = 'cuic mveq dekb qmxq';      // App password 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port       = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
    //Recipients
    $mail->setFrom('tt2825839@gmail.com', 'Your Name');
    $mail->addAddress($emp_mail);   // Recipient's email

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $mail->Body    = " <html>
            <head>
                <title>Email Verification</title>
            </head>
            <body>
                <p>Thank you for registering! Please click the link below to verify your email address:</p>
                <p><a href='http://localhost/Project/email_verification.php?token=$token'>Verify Email</a></p>
            </body>
            </html>
        ";

    $mail->send();
    echo 'Email sent successfully to your official mail. Check Gmail.';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo "<meta http-equiv='refresh' content='2;url='employer-registration.php'>";
}

?>