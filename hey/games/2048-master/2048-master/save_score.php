<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if both username and score are provided
    if (isset($_POST["username"]) && isset($_POST["score"])) {
        $username = $_POST["username"];
        $score = $_POST["score"];

        // Database connection settings
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "well";

        // Create a connection to the database
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the score is higher than the existing best score for the same username
        $checkScoreQuery = "SELECT score FROM 2048s_scores WHERE username = ? ORDER BY score DESC LIMIT 1";
        $stmtCheck = $conn->prepare($checkScoreQuery);
        $stmtCheck->bind_param("s", $username);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $bestScore = $row["score"];

            if ($score > $bestScore) {
                // Insert the new high score into the database
                $insertQuery = "INSERT INTO 2048s_scores (username, score) VALUES (?, ?)";
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("si", $username, $score);

                if ($stmt->execute()) {
                    echo "New high score and username stored successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }
            } else {
                echo "Score is not higher than the previous best score.";
            }
        } else {
            // No previous scores for this username, so insert the score
            $insertQuery = "INSERT INTO 2048s_scores (username, score) VALUES (?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("si", $username, $score);

            if ($stmt->execute()) {
                echo "Score and username stored successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Close the prepared statements and the database connection
        $stmtCheck->close();
        $stmt->close();
        $conn->close();
    } else {
        echo "Incomplete data provided";
    }
} else {
    echo "Invalid request method";
}
?>
