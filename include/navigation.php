<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
  <title>Donatetheblood</title>
</head>
<body>
  <!-- Navigation starts -->
  <nav id="mainNav" class="navbar fixed-top navbar-default navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./index.php">DONATETHEBLOOD</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <!-- Add any additional menu items on the left side -->
      </ul>
      
      <ul class="navbar-nav form-inline my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="donorsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Donors
          </a>
          <div class="dropdown-menu" aria-labelledby="donorsDropdown">
            <a class="dropdown-item" href="donor.php">View All</a>
            <a class="dropdown-item" href="edit.php">Edit</a>
            <a class="dropdown-item" href="delete.php">Delete</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="search.php">Donate</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Navigation ends -->

  <!-- Your content goes here -->

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
