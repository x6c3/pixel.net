<?php
if (!isset($_COOKIE['email'])) {
    header('Location: login.html');
    exit(); // Ensure the script stops execution after redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #8ECDDD;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">User Data</h1>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <?php
                include('../php/connect.php');

                if (isset($_COOKIE['email'])) {
                    $email = $_COOKIE['email'];
                    $sql = "SELECT * FROM tryagain WHERE email=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        echo '<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Username: ' . htmlspecialchars($row['username']) . '</h4>
                                <p class="card-text">Email: ' . htmlspecialchars($row['email']) . '</p>
                            </div>
                        </div>';
                        
                        echo '<form method="post" action="info.php" class="mt-3">
                            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                        </form>';
                    } else {
                        echo '<p class="text-danger">User not found.</p>';
                    }
                } else {
                    echo '<p class="text-danger">User not logged in.</p>';
                }

                if (isset($_POST['logout'])) {
                    setcookie("email", "", time() - 3600, "/");
                    header('Location: login.html');
                    exit(); // Ensure the script stops execution after redirect
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
