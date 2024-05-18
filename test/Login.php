<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EventManager</title>
    <link rel="stylesheet" href="L.css">
</head>
<body>
    <header>
        <h1>Login to EventManager</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="admin.php">Manage Events</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </header>
    <main>
        <?php
        session_start();
        if (isset($_POST['submit'])) {
            require 'functions.php';
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (loginUser($username, $password)) {
                $_SESSION['user'] = $username;  // Start a session
                header('Location: index.php');  // Redirect to homepage
                exit;
            } else {
                echo '<p class="error">Invalid username or password.</p>';
            }
        }
        ?>

        <!-- Simplified login form -->
<form action="login_process.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Login</button>
</form>

    </main>
    <footer>
        <p>© <?= date("Y") ?> EventManager. All rights reserved.</p>
    </footer>
</body>
</html>
