<?php
// Database configuration settings
$host = 'localhost';  // Database host
$dbname = 'EventManager';  // Database name
$username = 'root';  // Database username
$password = '';  // Database password, adjust as necessary

// Function to create and return a new PDO connection
function getPDO() {
    global $host, $dbname, $username, $password;
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Make the default fetch be an associative array
        PDO::ATTR_EMULATE_PREPARES => false, // Turn off emulation mode for "real" prepared statements
    ];

    try {
        $pdo = new PDO($dsn, $username, $password, $options);
        return $pdo;
    } catch (PDOException $e) {
        die("PDO Connection Error: " . $e->getMessage());
    }
}

// Function to fetch upcoming events
function getUpcomingEvents() {
    $pdo = getPDO();
    $sql = "SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Failed to fetch upcoming events: " . $e->getMessage());
        return [];
    }
}

function searchEvents($searchTerm) {
    $pdo = getPDO();
    $sql = "SELECT * FROM events WHERE title LIKE ? AND event_date >= CURDATE() ORDER BY event_date ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['%' . $searchTerm . '%']);
    return $stmt->fetchAll();
}


function loginUser($username, $password) {
    $pdo = getPDO();
    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return true;
    }
    return false;
}





?>

