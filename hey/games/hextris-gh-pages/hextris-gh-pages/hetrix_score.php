<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and score from POST data
    $username = $_POST['username'];
    $score = $_POST['score'];

    // Validate the input (You should add more validation as needed)
    if (!empty($username) && is_numeric($score)) {
        // Connect to your MySQL database
        $mysqli = new mysqli("localhost", "root", "", "well");

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Insert the username and score into the table
        $sql = "INSERT INTO hetrix_scores (username, score) VALUES (?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("si", $username, $score);
            $stmt->execute();
            $stmt->close();
            echo "Score stored successfully!";
        } else {
            echo "Error preparing statement: " . $mysqli->error;
        }

        // Close the database connection
        $mysqli->close();
    } else {
        echo "Invalid username or score!";
    }
} else {
    echo "Invalid request method!";
}
?>
