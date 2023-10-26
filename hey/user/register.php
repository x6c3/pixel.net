<?php
$_username = $_POST['username'];
$_email = $_POST['email'];
$_password = $_POST['password'];


$conn = new mysqli('localhost', 'root', '', 'well');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
 
    $stmt = $conn->prepare("SELECT * FROM tryagain WHERE email = ?");
    $stmt->bind_param("s", $_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        echo "Email already exists. Please use a different email address.";
    } else {
       

        $stmt = $conn->prepare("INSERT INTO tryagain(username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_username, $_email, $_password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
       
            header('location: login.html');
        } else {
          
            echo "Registration failed. Please try again.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
