<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Writer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('inc/header.php'); ?>

    <h1>Welcome to Content Writer!</h1>
    <p><a href="login.php">Login</a> or <a href="signup.php">Sign up</a> to get started.</p>

    <?php include('inc/footer.php'); ?>
</body>
</html>
