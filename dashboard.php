<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

require_once 'openai-api.php';
require_once 'config/config.php';

$title = isset($_POST['title']) ? $_POST['title'] : '';
$generated_keywords = [];

if (!empty($title)) {
    $generated_keywords = generate_keywords($title, OPENAI_API_KEY);
    $_SESSION['generated_keywords'] = $generated_keywords;
}

include('inc/header.php');
?>

<main>
    <h1>Dashboard</h1>
    <form action="dashboard.php" method="POST">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <input type="submit" value="Generate Keywords">
        </div>
    </form>
    <?php if (!empty($generated_keywords)): ?>
        <a href="generate-article.php">Proceed to select keywords and generate article</a>
    <?php endif; ?>
</main>

<?php
include('inc/footer.php');
?>
