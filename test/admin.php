<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<header>
        
        <nav>
            <a href="index.php">Home</a>
            <a href="admin.php">Manage Events</a>
            <a href="Login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </header>
    <h1>Event Manager Admin Panel</h1>
    <h2>Add New Event</h2>
    <form action="admin_process.php" method="post">
        <input type="hidden" name="action" value="add">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="event_date" required><br>
        <label for="time">Time:</label>
        <input type="time" id="time" name="event_time" required><br>
        <label for="venue">Venue:</label>
        <input type="text" id="venue" name="venue"><br>
        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required><br>
        <button type="submit">Add Event</button>
    </form>


    <h2>Existing Events</h2>
    <!-- Events table -->
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Venue</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'list_events.php'; ?>
        </tbody>
    </table>
    <!-- Modal Structure -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <form id="editEventForm" action="admin_process.php" method="post">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" id="eventId">
            <label for="editTitle">Title:</label>
            <input type="text" id="editTitle" name="title" required><br>
            <label for="editDescription">Description:</label>
            <textarea id="editDescription" name="description" required></textarea><br>
            <label for="editDate">Date:</label>
            <input type="date" id="editDate" name="event_date" required><br>
            <label for="editTime">Time:</label>
            <input type="time" id="editTime" name="event_time" required><br>
            <label for="editVenue">Venue:</label>
            <input type="text" id="editVenue" name="venue"><br>
            <label for="editImage">Image URL:</label>
            <input type="text" id="editImage" name="image" required><br>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>
<script src="admin.js"></script>
</body>
</body>
</html>
