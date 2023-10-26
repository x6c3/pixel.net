<?php
// Check if the user is an admin
session_start();
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('location: login.php'); // Redirect to login page if not an admin
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <!-- Add admin dashboard content here -->
    <p>This is the admin dashboard. You can manage admin-specific tasks here.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
