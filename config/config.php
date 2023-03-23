<?php
// Set your time zone
date_default_timezone_set('UTC');

// Load environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// OpenAI API key
define('OPENAI_API_KEY', getenv('OPENAI_API_KEY'));

// Session configuration
session_start();
session_set_cookie_params(0, '/', '', false, true);

// Set error reporting level
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
