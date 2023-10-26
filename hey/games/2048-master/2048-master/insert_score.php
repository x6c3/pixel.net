<?php
// Database configuration
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'well'; // Replace with your database name

// Receive the high score from the game
$highScore = isset($_POST['highScore']) ? $_POST['highScore'] : 0;

// Establish a database connection
$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the high score into the database
$insertQuery = "INSERT INTO 2048s_scores (score) VALUES (?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("i", $highScore); // Assuming 'score' is an integer column

if ($stmt->execute()) {
    echo "High score inserted successfully.";
} else {
    echo "Error inserting high score: " . $stmt->error;
}

$stmt->close();

// Close the database connection
$conn->close();
?>
