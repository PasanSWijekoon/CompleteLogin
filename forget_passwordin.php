<?php

require './includes/config.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php'; 
require './vendor/phpmailer/phpmailer/src/Exception.php'; 
require './vendor/phpmailer/phpmailer/src/SMTP.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();


$response = new stdClass();

$jsonReqestText = $_POST["jsonreqesttext"];
$phpRequestObjest = json_decode($jsonReqestText);

$email = $phpRequestObjest->email;

if (empty($email)) {
    $response->msg = "Please Enter Email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response->msg = "Please Enter Valid email";
} else {


    $check = "SELECT * FROM users WHERE email = '$email'";
    $r = mysqli_query($conn, $check);

    if (mysqli_num_rows($r) == 1) {

        $check2 = "SELECT * FROM forgot_password WHERE email = '$email'";
        $r2 = mysqli_query($conn, $check2);

        if (mysqli_num_rows($r2) == 1) {

            $response->msg = 'Password Request Already Send check Email';
        } else {

            $token = uniqid(md5(time()));

            $query = "INSERT INTO forgot_password(email,token) VALUES ('$email','$token')";

            $res = mysqli_query($conn, $query);

            $resetLink = "http://localhost/Piratechat/resetpassword.php?token=$token";
            $emailSubject = "Password Reset";
            $emailBody = "Click the following link to reset your password: $resetLink";

            $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Replace with your SMTP server
        $mail->SMTPAuth   = true;                // Enable SMTP authentication
        $mail->Username   = 'anandawijekoon533@gmail.com';     // Replace with your SMTP username
        $mail->Password   = 'dknmofgemudyxnnq';     // Replace with your SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption (or use PHPMailer::ENCRYPTION_SMTPS for SSL)
        $mail->Port       = 465;                 // Replace with your SMTP port (587 for TLS, 465 for SSL)

        // Sender information
        $mail->setFrom('passwordreset@system.com', 'Password_Reset'); // Replace with your name and email address

        // Recipient
        $mail->addAddress($email); // Replace with support team's email and name

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $emailSubject;
        $mail->Body    = $emailBody ;
        
        // Send email
        $mail->send();

        $response->msg = "Password reset Link Send To your email check email";
    
    } catch (Exception $e) {
        $response->msg = "Error sending email. Please try again later. Error: {$mail->ErrorInfo}";
    }
}
            

           // $response->msg = "Click <a href='resetpassword.php?token=$token'>here</a> To Reset Password";
        
    } else {

        $response->msg = "Entered Email Not Exist";
    }
}



$response_json = json_encode($response);
echo ($response_json);


?>
