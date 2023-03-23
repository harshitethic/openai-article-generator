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
    <title>Sign Up - Content Writer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('inc/header.php'); ?>

    <h1>Sign Up</h1>
    <form action="process-signup.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Sign Up</button>
    </form>

    <?php include('inc/footer.php'); ?>
</body>
</html>
