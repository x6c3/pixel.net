

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Submitted</title>
    <style>
    body{
         text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:#176B87;
    }
    
    h1 {
            font-size: 24px; /* Adjust the font size as needed */
        }

        button {
            margin-top: 20px; /* Add some space between the message and the button */
        }
        #bottone1 {
            padding-left: 33px;
            padding-right: 33px;
            padding-bottom: 16px;
            padding-top: 16px;
            border-radius: 9px;
            background: #64CCC5;
            border: none;
            font-family: inherit;
            text-align: center;
            cursor: pointer;
            transition: 0.4s;
            }

        #bottone1:hover {
            box-shadow: 7px 5px 56px -14px #64CCC5;
            }

        #bottone1:active {
            transform: scale(0.97);
            box-shadow: 7px 5px 56px -10px #64CCC5;
            }
    </style>
</head>
<body>
    <h1>Feedback Submitted Successfully!</h1>

    <!-- Add a button to go back to first.html -->
    <a href="userinfo.html">
  <button id="bottone1"><strong>return to Home page</strong></button>
</a>

    

<?php
include('php/connect.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $message = $_POST['message'];

    // Use placeholders for binding parameters
    $stmt = $conn->prepare("INSERT INTO review (name, message) VALUES (?, ?)");
    
    // Bind parameters properly using "ss" for two string parameters
    $stmt->bind_param("ss", $name, $message);

    if ($stmt->execute() === TRUE) {
        // Redirect to a different location after successful insert
        header('Location: ../../ok/feedback.php');
        exit; // Exit to prevent further execution
    } else {
        echo "error: " . $stmt->error; // Use $stmt->error for statement errors
    }

    $stmt->close(); // Close the prepared statement
    $conn->close(); // Close the database connection
}
?>

</body>
</html>
