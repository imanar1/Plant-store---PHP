<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  
  exit;
}
include "navbar2.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HomePage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="../css/homepage.css">

</head>

<body>
  <!-- Welcome message -->
  <div class="welcome">
    <h2>Welcome <?php echo $_COOKIE['username']; ?>! You can move to</h2>
  </div>

  <!-- Two separate columns with images and text -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="image-container">
          <img src="../image/flowershop.jpeg" alt="Image 3" class="img-fluid" width="269rem">
          <br>
          <a href="flowers.php"><button class="button">Flowers section</button></a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="image-container">
          <img src="../image/giftshop.jpeg" alt="Image 4" class="img-fluid" width="293rem">
          <br>
          <a href="gifts.php"><button class="button">Gifts section</button></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="container">
      <span class="text-muted">Privacy Policy | <a href="report.php">Report a Problem</a></span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>
