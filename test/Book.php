<?php
require_once 'functions.php'; // Ensure your database connection function is included

session_start(); // Start the session to hold flash message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];
    $email = $_POST['email'];

    // Function to add subscription
    if (addSubscription($email, $event_id)) {
        // Store a success message in session
        $_SESSION['message'] = "You have successfully subscribed!";
    } else {
        // Store a failure message in session
        $_SESSION['message'] = "Subscription failed. Please try again.";
    }

    // Redirect back to the homepage with a slight delay
    header("Refresh:5; url=index.php");
    echo $_SESSION['message'] . " Redirecting in 5 seconds...";
    exit();
}

function addSubscription($email, $event_id) {
    $pdo = getPDO();
    $sql = "INSERT INTO subscriptions (email, event_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$email, $event_id]);
}
?>

