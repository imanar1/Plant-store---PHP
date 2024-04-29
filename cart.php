<?php
include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["product_id"])) {
    $productId = mysqli_real_escape_string($conn, $_POST["product_id"]);
    $userId = $_SESSION["user_id"];

    // Delete the product from the cart table for the current user
    $sql = "DELETE FROM cart WHERE user_id = '$userId' AND id = $productId";
    if ($conn->query($sql) === TRUE) {
        // If the deletion was successful, redirect back to the cart page
        header("Location: cart.php");
        exit;
    } else {
        // If there was an error, display an error message
        echo "Error deleting product: " . $conn->error;
    }
}

include "navbar2.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\myCart.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>

<body>

    <h1>Shopping Cart</h1>
    <br><br>
    <form id="removeForm" method="post">
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Remove</th>
            </tr>
            <?php
            // Retrieve cart items for the current user from the database
            $userId = $_SESSION["user_id"];
            $sql = "SELECT * FROM cart WHERE user_id = '$userId'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>';
                    echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '" style="width: 100px; height: auto;">';
                    echo '<span class="productName" >' . $row["name"] . '</span>';
                    echo '</td>';
                    echo '<td>$' . $row["price"] . '</td>';
                    echo '<td><input type="number" min="1" value="1"></td>';
                    echo '<td>$' . $row["price"] . '</td>';
                    echo '<td><button class="r" data-product-id="' . $row["user_id"] . '">Remove</button></td>';
                    echo '</tr>';
                }
            } else {
                echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
            }

            // Close database connection
            $conn->close();
            ?>
            <tr>
                <td colspan="3">Total</td>
                <td></td>
            </tr>

        </table>
        <input type="hidden" id="productId" name="product_id" value="">
    </form>

    <div class="checkout" style=" display: flex; justify-content: center;">
        <a href="payment.php">
            <button>Checkout</button>
        </a>
    </div>


    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <span class="text-muted">Privacy Policy | <a href="report.php">Report a Problem</a></span>
        </div>
    </footer>


</body>

<script>
    // Get all the "Remove" buttons
    const removeButtons = document.querySelectorAll(".r");

    removeButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            const productId = button.getAttribute("data-product-id");
            document.getElementById("productId").value = productId;
            document.getElementById("removeForm").submit();
        });
    });


    // Calculate and display the total price of all items in the cart
    function calculateTotal() {
        let total = 0;
        const subtotalCells = document.querySelectorAll("td:nth-of-type(4)");
        subtotalCells.forEach(function (cell) {
            total += parseFloat(cell.textContent.replace("$", ""));
        });
        document.querySelector("td[colspan='3']").nextElementSibling.textContent = "$" + total.toFixed(2);
    }

    // Call calculateTotal initially to set the total
    calculateTotal();

    // Get all the quantity input fields and attach a change event listener to each one
    const quantityInputs = document.querySelectorAll("input[type='number']");
    quantityInputs.forEach(function (input) {
        input.addEventListener("change", function () {
            const price = parseFloat(input.parentNode.previousElementSibling.textContent.replace("$", ""));
            const quantity = parseInt(input.value);
            const subtotal = price * quantity;
            input.parentNode.nextElementSibling.textContent = "$" + subtotal.toFixed(2);

            // Calculate and display the total price of all items in the cart
            calculateTotal();
        });
    });
</script>

</html>
