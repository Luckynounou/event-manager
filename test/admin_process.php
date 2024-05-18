<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            // Gather input data
            $title = $_POST['title'];
            $description = $_POST['description'];
            $event_date = $_POST['event_date'];
            $event_time = $_POST['event_time'];
            $venue = $_POST['venue'] ?? '';
            $image = $_POST['image'] ?? '';

            // SQL to insert a new event
            $sql = "INSERT INTO events (title, description, event_date, event_time, venue, image) VALUES (?, ?, ?, ?, ?, ?)";
            $pdo = getPDO();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$title, $description, $event_date, $event_time, $venue, $image]);
            break;

        case 'edit':
            // Assume 'id' is also sent in the form for editing
            $event_id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $event_date = $_POST['event_date'];
            $event_time = $_POST['event_time'];
            $venue = $_POST['venue'] ?? '';
            $image = $_POST['image'] ?? '';

            // SQL to update an existing event
            $sql = "UPDATE events SET title = ?, description = ?, event_date = ?, event_time = ?, venue = ?, image = ? WHERE event_id = ?";
            $pdo = getPDO();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$title, $description, $event_date, $event_time, $venue, $image, $event_id]);
            break;
            


        case 'delete':
            // SQL to delete an event
            $event_id = $_POST['id'];
            $sql = "DELETE FROM events WHERE event_id = ?";
            $pdo = getPDO();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$event_id]);
            break;
    }

    // Redirect back to the admin page
    header("Location: admin.php");
    exit();
}
?>
