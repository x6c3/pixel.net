<!DOCTYPE html>
<html>
<head>
  <title>Review Page</title>
  <link rel="stylesheet" type="text/css" href="../styles/review.css">
  <style>
    

  
</style>
</head>
<body>
  <h1 style="font-family: monospace;">Review Page</h1>
  
  <div id="review-container">
    <?php 
    include('../php/connect.php');
    $sql = "SELECT * FROM review";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<div class="review">';
        echo '<h2 class="heading">' . $row["name"] . '</h2>';
        echo '<p class="message">Message: ' . $row["message"] . '</p>';
        echo '</div>';
      }
    } else {
      echo '<p>No reviews available.</p>';
    }
    $conn->close();
    ?>
  </div>

</body>
</html>
