<!DOCTYPE html>
<html>
<head>
  <title>Registration Result</title>
</head>
<body>
  <?php
    if (isset($_GET['error'])) {
      $errorMessage = $_GET['error'];
      echo '<p>Error: ' . htmlspecialchars($errorMessage) . '</p>';
    } 
  ?>
</body>
</html>
