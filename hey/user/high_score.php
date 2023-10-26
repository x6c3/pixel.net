<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highest Scores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #2E4374;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .score-card {
            width: 300px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
            color: #333;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php
    // Database connection settings
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

    // Define an array of table names and their corresponding game names
    $gameTables = array(
        "towerblocks_scores" => "Tower Blocks",
        "2048s_scores" => "2048",
        "stickhero_scores" => "Stick Hero",
        "hetrix_scores" => "Hetrix"
    );

    // Iterate through the tables and display the highest score and corresponding username for each game
    foreach ($gameTables as $table => $gameName) {
        // Retrieve the corresponding username with the highest score for the current game
        $highestScoreQuery = "SELECT s.username, s.score FROM $table s
                              JOIN (SELECT MAX(score) AS highest_score FROM $table) t
                              ON s.score = t.highest_score";
        $result = $conn->query($highestScoreQuery);

        // Check if there are any results for the current game
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $username = $row['username'];
            $highestScore = $row['score'];

            // Output the game name, username, and highest score in a card
            echo "<div class='score-card'>";
            echo "<h2>Highest Score in $gameName</h2>";
            echo "<p>Username: $username</p>";
            echo "<p>Highest Score: $highestScore</p>";
            echo "</div>";
        } else {
            echo "<p>No highest score found for $gameName.</p>";
        }
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
