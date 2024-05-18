<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (loginUser($username, $password)) {
        session_start();
        $_SESSION['username'] = $username; // Start a session
        header('Location: index.php'); // Redirect to the homepage
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>
