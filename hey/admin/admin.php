<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>yey</title>
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="icon" type="image/jpg" href="styles/skull.jpg">
</head>
<body>
    <header>
        <h2 class="logo"><b>PIXEL</b></h2>
        <nav class="navigation">
            <a href="high_score.php">HIGHSCORE</a>
            <a href="delete.html">DELETE GAMES</a>
            <a href="#">ADD GAMES</a>
            <a href="review_first.php">REVIEWS</a>
        </nav>
    </header>
    <nav class="navig">
        <!-- User information will be displayed here -->
        <div id="user-info" style="display: none;">
            <h3>User Information</h3>
            <p><strong>Username:</strong> <span id="username"></span></p>
            <p><strong>Email:</strong> <span id="email"></span></p>
        </div>
        <p><b><h3>hey, welcome! Enjoy our website.</h3></b></p>
        <a href="hom1.html"><button class="btnSubmit-popup">Go to Full Website</button></a>
    </nav>

    <script>
        // Check if the user is an admin and display a pop-up message
        <?php if (isset($_SESSION['logged_in_user_email']) && $_SESSION['logged_in_user_email'] === 'admin@gmail.com') : ?>
            // Wrap the alert in a setTimeout to ensure it's displayed after the DOM is fully loaded
            window.addEventListener('DOMContentLoaded', function () {
                setTimeout(function () {
                    alert('Welcome, Admin!');
                }, 0);
            });
        <?php endif; ?>

        document.addEventListener("DOMContentLoaded", function () {
            const userIcon = document.getElementById("user-icon");
            const userInfo = document.getElementById("user-info");
            const usernameSpan = document.getElementById("username");
            const emailSpan = document.getElementById("email");

            userIcon.addEventListener("click", function () {
                // Make an AJAX request to fetch user information
                // Replace '1' with the actual user ID
                const userId = 1;
                const xhr = new XMLHttpRequest();
                xhr.open("GET", `user_info.php?userId=${userId}`, true);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const userData = JSON.parse(xhr.responseText);
                        usernameSpan.textContent = userData.username;
                        emailSpan.textContent = userData.email;
                        userInfo.style.display = "block";
                    }
                };

                xhr.send();
            });
        });
    </script>
</body>
</html>
