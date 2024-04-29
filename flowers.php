<?php
include("connection.php");
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.php");
  exit;
}

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];

if (isset($_POST['submit'])) {

  // Get user_id from users table
  $sql_user_id = "SELECT user_id FROM users WHERE username = '$username'";
  $result_user_id = mysqli_query($conn, $sql_user_id);
  $row_user_id = mysqli_fetch_assoc($result_user_id);
  $user_id = $row_user_id['user_id'];

  $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
  $product_name = mysqli_real_escape_string($conn, $_POST['name']);
  $product_price = mysqli_real_escape_string($conn, $_POST['price']);
  $product_img = mysqli_real_escape_string($conn, $_POST['image']);

  // Create a unique cart ID for the user
  $cart_id = uniqid('cart_');

  $sql_insert = "INSERT INTO cart (cart_id, user_id, product_id, name, price, image) VALUES ('$cart_id', '$user_id', '$product_id', '$product_name', '$product_price', '$product_img')";
  $result_insert = mysqli_query($conn, $sql_insert);

  if ($result_insert) {
    header("Location: flowers.php");
    exit;
  } else {
    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
  }

}

include "navbar2.php";
?>


<!DOCTYPE html>
<html>

<head>
  <title>Flowers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/flowers.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<body>

  <h2 style="text-align: center; font-size: 70px; margin-top: 100px; color: white; ">Flowers</h2>

  <div class="container">
      <aside>
        <h2>Flower Designs</h2>
        <ul>
          <li><a href="#" class="category active">All</a></li>
          <li><a href="#" class="category">Chocolate</a></li>
          <li><a href="#" class="category">Balloons</a></li>
          <li><a href="#" class="category">Bouquets</a></li>
        </ul>
      </aside>

      <div class="product-box">
        <?php
        $sql = "SELECT * FROM flowers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="product ' . strtolower($row["type"]) . '">';
            echo '<form method="post">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '" name="image" id="image"/>';
            echo '<h2 name="name" id="name">' . $row["name"] . '</h2>';
            echo '<p>' . $row["description"] . '</p>';
            echo '<p name="price" id="price">' . $row["price"] . '$</p>';
            echo '<input type="hidden" name="product_id" id="product_id" value="' . $row["product_id"] . '">';
            echo '<input type="hidden" name="name" value="' . $row["name"] . '">';
            echo '<input type="hidden" name="price" value="' . $row["price"] . '">';
            echo '<input type="hidden" name="image" value="' . $row["image"] . '">';
            echo '<button type="submit" class="add-to-cart" name="submit">Add to cart</button>';
            echo '</form>';
            echo '</div>';
          }
        } else {
          echo "0 results";
        }
        ?>
      </div>
    </div>

    <div id="cart" class="cart">
      <p><a href="cart.php">View Cart</p></a>
    </div>

  </div>
  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="footer-container">
      <span class="text-muted">Privacy Policy | <a href="report.php">Report a Problem</a></span>
    </div>
  </footer>
</body>

<script>
  const categoryLinks = document.querySelectorAll('.category');
  const products = document.querySelectorAll('.product');

  // add a click event listener
  categoryLinks.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();

      // Remove the active class from all the category links
      categoryLinks.forEach(link => {
        link.classList.remove('active');
      });

      // Add the active class to the clicked category link
      link.classList.add('active');

      // Get the category name from the clicked link
      const category = link.textContent.toLowerCase().replace(' ', '');

      // Loop through the products and show or hide them depending on their category
      products.forEach(product => {
        if (category === 'all') {
          product.style.display = 'block';
        } else if (product.classList.contains(category)) {
          product.style.display = 'block';
        } else {
          product.style.display = 'none';
        }
      });
    });
  });

</script>

</html>
