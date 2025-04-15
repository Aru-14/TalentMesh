<?php
$message=$_GET['message'];
$user_email=$_GET['user_email'];
$emp_email=$_GET['emp_email'];
$job_id = $_GET['job_id'];
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
    $mail->Username   = '';   // Your Gmail
    $mail->Password   = '';      // App password 
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
    $mail->setFrom('', 'Employer');
    $mail->addAddress($user_email);   // Recipient's email

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Job Confirmation';
    $mail->Body    = " <html>
            <head>
                <title>Job Confirmation</title>
            </head>
            <body>
                <p>Congratulation! You have been selected for job ID: $job_id $</p>
                <p>$message</p>
                <p>Regards,</p>
                <p>Team TalentMesh</p>
            </body>
            </html>
        ";

    $mail->send();
    echo 'Email sent successfully to applicant. ';
    echo "<meta http-equiv='refresh' content='0;url=user_applied.php?job_id=$job_id'>";
    
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
   
}

?>
