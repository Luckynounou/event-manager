<?php
require_once 'functions.php';
session_start(); // Start the session to access any flash messages

// Check if there is a search query; if yes, search the events, otherwise get upcoming events
if (!empty($_GET['search'])) {
    $events = searchEvents($_GET['search']);
} else {
    $events = getUpcomingEvents();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventManager Home</title>
    <link rel="stylesheet" href="style.css"> <!-- Ensure this path is correct -->
</head>
<body>
    <header>
        <h1>Welcome to EventMaster</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="admin.php">Manage Events</a>
            <a href="Login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </header>
    <main>
        <div class="hero">
            <img src="0.png" alt="Event Manager Background" class="hero-img">
            <div class="hero-text">
                <h2>Discover Your Next Experience</h2>
            </div>
        </div>
        <!-- Display the flash message if it exists -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); // Remove the message after displaying ?>
            </div>
        <?php endif; ?>

        <!-- Search Form -->
        <form action="index.php" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search events..." required>
            <button type="submit">Search</button>
        </form>
        <section class="upcoming-events">
            <div class="event-list">
                <?php if (!empty($events)): 
                    foreach ($events as $event): ?>
                        <div class="event" onclick="openModal('modal<?= $event['event_id'] ?>')">
                            <img src="<?= htmlspecialchars($event['image']) ?>" alt="Event Image" class="event-image">
                            <div class="event-details">
                                <h3><?= htmlspecialchars($event['title']) ?></h3>
                                <p>Date: <?= htmlspecialchars($event['event_date']) ?>, Time: <?= htmlspecialchars($event['event_time']) ?></p>
                                <p><?= nl2br(htmlspecialchars($event['description'])) ?></p>
                            </div>
                        </div>
                        <!-- Modal for subscribing to an event -->
                        <div id="modal<?= $event['event_id'] ?>" class="modal" style="display:none;">
                            <div class="modal-content">
                                <span class="close" onclick="closeModal('modal<?= $event['event_id'] ?>')">&times;</span>
                                <form action="subscribe_event.php" method="post">
                                    <input type="hidden" name="event_id" value="<?= $event['event_id'] ?>">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" required>
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach;
                else: ?>
                    <p>No upcoming events found.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <footer>
        <p>© <?= date("Y") ?> EventManager. All rights reserved.</p>
    </footer>
    <script src="event.js"></script>
</body>
</html>
