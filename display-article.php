<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['generated_article'])) {
    header('Location: dashboard.php');
    exit();
}

include('inc/header.php');
?>

<main>
    <h1><?php echo htmlspecialchars($_SESSION['generated_article']['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($_SESSION['generated_article']['content'])); ?></p>
    <a href="dashboard.php">Generate another article</a>
</main>

<?php
include('inc/footer.php');
?>
