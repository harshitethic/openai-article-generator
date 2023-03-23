<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$users = json_decode(file_get_contents('users.json'), true);

$authenticated = false;

foreach ($users as $user) {
    if ($user['email'] === $email && password_verify($password, $user['password'])) {
        $authenticated = true;
        break;
    }
}

if ($authenticated) {
    $_SESSION['user'] = $email;
    header('Location: dashboard.php');
} else {
    header('Location: login.php?error=1');
}
?>
