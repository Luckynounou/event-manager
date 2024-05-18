<?php
require_once 'functions.php';

$pdo = getPDO();
$sql = "SELECT * FROM events";
$stmt = $pdo->query($sql);
$events = $stmt->fetchAll();

foreach ($events as $event) {
    // Ensure you escape quotes in the attribute strings to avoid breaking HTML
    $titleEscaped = htmlspecialchars($event['title'], ENT_QUOTES);
    $descriptionEscaped = htmlspecialchars($event['description'], ENT_QUOTES);
    $venueEscaped = htmlspecialchars($event['venue'], ENT_QUOTES);
    $imageEscaped = htmlspecialchars($event['image'], ENT_QUOTES);

    echo "<tr>";
    echo "<td>" . $titleEscaped . "</td>";
    echo "<td>" . htmlspecialchars($event['event_date']) . "</td>";
    echo "<td>" . htmlspecialchars($event['event_time']) . "</td>";
    echo "<td>" . $venueEscaped . "</td>";
    echo "<td><img src='" . $imageEscaped . "' alt='Event Image' style='width:100px;'></td>";
    echo "<td>";
    echo "<button onclick=\"openModal('{$event['event_id']}', '$titleEscaped', '$descriptionEscaped', '{$event['event_date']}', '{$event['event_time']}', '$venueEscaped', '$imageEscaped')\">Edit</button>";
    echo "<form action='admin_process.php' method='post' style='display:inline;'>";
    echo "<input type='hidden' name='id' value='" . $event['event_id'] . "'>";
    echo "<input type='hidden' name='action' value='delete'>";
    echo "<button type='submit'>Delete</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
}
?>
