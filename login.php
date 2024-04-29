<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $result->num_rows;

    if ($count > 0 && password_verify($password, $row["password"])) {
        $_SESSION['user_id'] = $row['user_id']; // Save the user ID in the session
        $_SESSION['username'] = $row['username'];
        $_SESSION['loggedin'] = true;

        // Check if the user already has a cart ID
        if (!isset($_SESSION['cart_id'])) {
            // Create a unique cart ID for the user
            $cart_id = uniqid('cart_');
            $_SESSION['cart_id'] = $cart_id;
        }

        setcookie("username", $username, time() + (86400 * 30), "/");
        header("Location: homepage.php");
        exit;
    } else {
        echo '<script>
                    alert("Login failed. Invalid username or password!!");
                    window.location.href = "login.php";
                </script>';
    }
}
?>
<?php
include("navbar1.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">


<body>
    <div id="form">
        <h1>Login Form</h1>
        <form name="form" action="login.php" method="POST" onsubmit="return isvalid()">
            <label for="user">Enter Username/Email:</label>
            <input type="text" id="user" name="user" required><br><br>
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <input type="submit" id="btn" value="Login" name="submit">
        </form>
        <p>Forget password? <a href="updatepass.php">Change your password</a> here.</p>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <span class="text-muted">Privacy Policy | <a href="report.php">Report a Problem</a></span>
        </div>
    </footer>

    <script>
        function isvalid() {
            var user = document.form.user.value;
            if (user.length == 0) {
                alert("Enter username or email id!");
                return false;
            }
        }
    </script>
</body>

</html>