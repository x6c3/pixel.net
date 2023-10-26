<?php

$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$con = new mysqli('localhost', 'root', '', 'well');
if ($con->connect_error) {
    die('Connection Failed: ' . $con->connect_error);
} else {
   
    $stmt = $con->prepare("SELECT * FROM tryagain WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    
    if ($stmt_result->num_rows > 0) {
        
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password) {
            
            if ($email === 'admin@gmail.com' && $password === 'admin123') {
                
                header('location: admin.php');
                exit;
            }
            setcookie("email", $email, time() + 3600, "/");
            
            echo "<h2>LOGIN SUCCESSFULLY</h2>";
            header('location: userinfo.php');
        } else {
            echo "<h2>LOGIN FAILED OR INVALID PASSWORD</h2>";
        }
    } else {
        echo "<h2>LOGIN FAILED OR INVALID EMAIL</h2>";
    }
    
    $stmt->close();
    $con->close();
}
?>
