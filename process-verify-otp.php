<?php
session_start();

$otp = $_POST['otp'];

if (isset($_SESSION['temp_user']) && $otp == $_SESSION['temp_user']['otp']) {
    $users = json_decode(file_get_contents('users.json'), true);

    $new_user = [
        'email' => $_SESSION['temp_user']['email'],
        'password' => $_SESSION['temp_user']['password']
    ];

    $users[] = $new_user;
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    // Clear the temporary user data from the session
    unset($_SESSION['temp_user']);

    // Redirect to the login page with a success message
    header('Location: login.php?signup=success');
} else {
    // Redirect to the OTP verification page with an error message
    header('Location: verify-otp.php?error=1');
}
?>
