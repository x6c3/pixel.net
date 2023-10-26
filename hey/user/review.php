<!DOCTYPE html>
<html>
<head>
  <title>Review Page</title>
  <link rel="stylesheet" type="text/css" href="../styles/review.css">
  <style>
    
    div.btnn {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin-top:1rem;
    position: absolute;
    top: 17rem;
    left: 50%;
    transform: translateX(-50%);
  }
  

  .form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 350px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    position: relative;
  }
  
  .message {
    color: rgba(88, 87, 87, 0.822);
    font-size: 14px;
  }

  #review-container {
    margin-top:20rem;
  }
  
  .flex {
    display: flex;
    width: 100%;
    gap: 6px;
  }
  
  .form label {
    position: relative;
  }
  
  .form label .input {
    width: 100%;
    padding: 10px 10px 20px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 5px;
  }
  
  .form label .input + span {
    position: absolute;
    left: 10px;
    top: 15px;
    color: grey;
    font-size: 0.9em;
    cursor: text;
    transition: 0.3s ease;
  }
  
  .form label .input:placeholder-shown + span {
    top: 15px;
    font-size: 0.9em;
  }
  
  .form label .input:focus + span,.form label .input:valid + span {
    top: 30px;
    font-size: 0.7em;
    font-weight: 600;
  }
  
  .form label .input:valid + span {
    color: green;
  }
  
  .input01 {
    width: 100%;
    padding: 10px 10px 20px 10px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 5px;
  }
  
  .form label .input01 + span {
    position: absolute;
    left: 10px;
    top: 50px;
    color: grey;
    font-size: 0.9em;
    cursor: text;
    transition: 0.3s ease;
  }
  
  .form label .input01:placeholder-shown + span {
    top: 40px;
    font-size: 0.9em;
  }
  
  .form label .input01:focus + span,.form label .input01:valid + span {
    top: 50px;
    font-size: 0.7em;
    font-weight: 600;
  }
  
  .form label .input01:valid + span {
    color: green;
  }
  
  .fancy {
    background-color: transparent;
    border: 2px solid #cacaca;
    border-radius: 0px;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-weight: 390;
    letter-spacing: 2px;
    margin: 0;
    outline: none;
    overflow: visible;
    padding: 8px 30px;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: none;
    transition: all 0.3s ease-in-out;
    user-select: none;
    font-size: 13px;
        margin-left: 1rem;
  }
  
  .fancy::before {
    content: " ";
    width: 1.7rem;
    height: 2px;
    background: #cacaca;
    top: 50%;
    left: 1.5em;
    position: absolute;
    transform: translateY(-50%);
    transform: translateX(230%);
    transform-origin: center;
    transition: background 0.3s linear, width 0.3s linear;
  }
  
  .fancy .text {
    font-size: 1.125em;
    line-height: 1.33333em;
    padding-left: 2em;
    display: block;
    text-align: left;
    transition: all 0.3s ease-in-out;
    text-transform: lowercase;
    text-decoration: none;
    color: #818181;
    transform: translateX(30%);
  }

  form.form {
    padding-right: 2.5rem;
    position: absolute;
    top:  2rem;
    left: 50%;
    transform: translateX(-50%);
    width: 50rem;

  }
  
  .fancy .top-key {
    height: 2px;
    width: 1.5625rem;
    top: -2px;
    left: 0.625rem;
    position: absolute;
    background: white;
    transition: width 0.5s ease-out, left 0.3s ease-out;
  }
  
  .fancy .bottom-key-1 {
    height: 2px;
    width: 1.5625rem;
    right: 1.875rem;
    bottom: -2px;
    position: absolute;
    background: white;
    transition: width 0.5s ease-out, right 0.3s ease-out;
  }
  
  .fancy .bottom-key-2 {
    height: 2px;
    width: 0.625rem;
    right: 0.625rem;
    bottom: -2px;
    position: absolute;
    background: white;
    transition: width 0.5s ease-out, right 0.3s ease-out;
  }
  
  .fancy:hover {
    color: white;
    background: #cacaca;
  }
  
  .fancy:hover::before {
    width: 1.5rem;
    background: white;
  }
  
  .fancy:hover .text {
    color: white;
    padding-left: 1.5em;
  }
  
  .fancy:hover .top-key {
    left: -2px;
    width: 0px;
  }
  
  .fancy:hover .bottom-key-1,
   .fancy:hover .bottom-key-2 {
    right: 0;
    width: 0;
  }
  .form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 350px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    position: relative;
    margin: 0 auto; /* Center the form horizontally */
    margin-top: 20px; /* Add some top margin */
}
button {
  margin: 0 auto;
}
.button {
 --color: #ffffff;
 padding: 0.8em 1.7em;
 border-color:#e08dd7;
 background-color: transparent;
 border-radius: .3em;
 position: relative;
 overflow: hidden;
 cursor: pointer;
 transition: .5s;
 font-weight: 400;
 font-size: 17px;
 border: 1px solid;
 font-family: inherit;
 text-transform: uppercase;
 color: var(--color);
 z-index: 1;
 margin: 0 auto;
}

.button::before, .button::after {
 content: '';
 display: block;
 width: 50px;
 height: 50px;
 transform: translate(-50%, -50%);
 position: absolute;
 border-radius: 50%;
 z-index: -1;
 background-color: var(--color);
 transition: 1s ease;
}

.button::before {
 top: -1em;
 left: -1em;
}

.button::after {
 left: calc(100% + 1em);
 top: calc(100% + 1em);
}

.button:hover::before, .button:hover::after {
 height: 410px;
 width: 410px;
}

.button:hover {
 color: rgb(10, 25, 30);
}

.button:active {
 filter: brightness(.8);
}
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
  <form action="feedback.php" method="post"class="form">
    <label>
        <input id="name" name ="name" required placeholder="" type="text" class="input">
        <span>Name</span>
    </label>
    
    <label>
        <textarea required name="message" id="comment"  placeholder="" class="input01"></textarea>
        <span>Message</span>
    </label>
    
    <button class="fancy" href="#">
        <span class="top-key"></span>
        <span class="text">Submit</span>
        <span class="bottom-key-1"></span>
        <span class="bottom-key-2"></span>
    </button>
</form>

    <div class="btnn">
    <a href="userinfo.html"><button  class="button">Return to home Page</button></a>

    </div>

</body>
</html>