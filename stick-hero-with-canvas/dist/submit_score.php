<?php
// Define your database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "well";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data sent from the HTML page
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['username']) && isset($data['score'])) {
    // Sanitize the input to prevent SQL injection (you should use prepared statements for better security)
    $username = mysqli_real_escape_string($conn, $data['username']);
    $score = (int)$data['score'];

    // Insert the data into the "stickhero_scores" table
    $sql = "INSERT INTO stickhero_scores (username, score) VALUES ('$username', $score)";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid data";
}

// Close the database connection
$conn->close();
?>
