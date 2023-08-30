<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php 
    //include header file
    include ('include/header.php');
  ?>
  
  <style>
    /* CSS styles for the form */
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      animation: slideIn 0.5s ease-in-out;
    }

    h2 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      transition: border-color 0.3s ease-in-out;
    }

    .form-group input:focus {
      outline: none;
      border-color: #4CAF50;
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
      background-color:brown;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .form-group button:hover {
      background-color: #45a049;
    }

    @keyframes slideIn {
      0% {
        transform: translateY(-20px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
  
  <title>Form Example</title>
</head>
<body>
  <div class="container">
    <h2>Enter Your ID</h2>
    <form method="post" action="edit_progress.php">
      <div class="form-group">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" placeholder="Enter your ID" required>
      </div>
      <div class="form-group">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Add animation to the form submission
    $('form').submit(function(e) {
      e.preventDefault(); // Prevent form submission
      $('.container').addClass('animate__animated animate__zoomOut'); // Add fade out animation
      setTimeout(function() {
        $('form').unbind('submit').submit(); // Proceed with form submission after the animation ends
      }, 500);
    });
  </script>
</body>
</html>
