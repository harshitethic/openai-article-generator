<?php
include('inc/header.php');
?>

<main>
    <h1>Verify OTP</h1>
    <form action="process-verify-otp.php" method="POST">
        <label for="otp">Enter the OTP sent to your email</label>
        <input type="text" name="otp" id="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</main>

<?php
include('inc/footer.php');
?>
