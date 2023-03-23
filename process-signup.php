<?php
require_once('config/config.php');
require_once('PHPMailer/PHPMailerAutoload.php');

$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$users = json_decode(file_get_contents('users.json'), true);

// Check if the user already exists
foreach ($users as $user) {
    if ($user['email'] === $email) {
        header('Location: signup.php?error=1');
        exit();
    }
}

// Generate OTP
$otp = rand(100000, 999999);

// Send OTP using PHPMailer
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'your_smtp_host';
$mail->SMTPAuth = true;
$mail->Username = 'your_email_address';
$mail->Password = 'your_email_password';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('your_email_address', 'Your Name');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Your OTP for Content Writer Registration';
$mail->Body = "Your OTP is: <b>{$otp}</b>";

if (!$mail->send()) {
    header('Location: signup.php?error=2');
    exit();
}

// Store the user's information temporarily
$_SESSION['temp_user'] = [
    'email' => $email,
    'password' => $hashed_password,
    'otp' => $otp
];

// Redirect the user to the OTP verification page
header('Location: verify-otp.php');
?>