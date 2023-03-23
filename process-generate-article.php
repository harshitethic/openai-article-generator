<?php
session_start();

require_once 'vendor/autoload.php';
require_once 'config/config.php';
require_once 'openai-api.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$title = $_POST['title'];
$keywords = $_POST['keywords'];

$generated_keywords = generate_keywords($title, OPENAI_API_KEY);
$selected_keywords = array_slice($generated_keywords, 0, 5);

$generated_content = generate_article_content($title, $selected_keywords, OPENAI_API_KEY);

$_SESSION['generated_article'] = [
    'title' => $title,
    'content' => $generated_content
];

header('Location: display-article.php');
?>
