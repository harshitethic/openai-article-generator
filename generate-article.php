<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['generated_keywords'])) {
    header('Location: dashboard.php');
    exit();
}

$generated_keywords = $_SESSION['generated_keywords'];

include('inc/header.php');
?>

<main>
    <h1>Generate an Article</h1>
    <form action="process-generate-article.php" method="POST">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="keywords">Keywords</label>
            <select name="keywords[]" id="keywords" multiple required>
                <?php foreach ($generated_keywords as $index => $keyword): ?>
                    <option value="<?php echo htmlspecialchars($keyword); ?>">Keyword <?php echo $index + 1; ?>: <?php echo htmlspecialchars($keyword); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Generate">
        </div>
    </form>
</main>

<?php
include('inc/footer.php');
?>
