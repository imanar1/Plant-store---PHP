<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the signup form
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['country'] = $_POST['country'];
}

?>

<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

    $sql_user_check = "SELECT * FROM users WHERE username='$username'";
    $result_user_check = mysqli_query($conn, $sql_user_check);
    if (!$result_user_check) {
        die('Error: ' . mysqli_error($conn));
    }
    $count_user = mysqli_num_rows($result_user_check);

    $sql_email_check = "SELECT * FROM users WHERE email='$email'";
    $result_email_check = mysqli_query($conn, $sql_email_check);
    if (!$result_email_check) {
        die('Error: ' . mysqli_error($conn));
    }
    $count_email = mysqli_num_rows($result_email_check);

    if ($count_user == 0 && $count_email == 0) {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user_id = uniqid('user_');
            
            $sql_insert = "INSERT INTO users (user_id, username, email, password) VALUES ('$user_id', '$username', '$email', '$hash')";
            $result_insert = mysqli_query($conn, $sql_insert);
            if ($result_insert) {
                $_SESSION['username'] = $username;
                echo "User ID inserted successfully"; // Debug statement
                header("Location: login.php");
                exit;
            } else {
                echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
            }
        } else {
            echo '<script>
                    alert("Passwords do not match");
                    window.location.href = "signup.php";
                </script>';
            exit;
        }
    } else {
        if ($count_user > 0) {
            echo '<script>
                    window.location.href="index.php";
                    alert("Username already exists!!");
                </script>';
            exit;
        }
        if ($count_email > 0) {
            echo '<script>
                    window.location.href="index.php";
                    alert("Email already exists!!");
                </script>';
            exit;
        }
    }
}



?>

<?php
include("navbar1.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="..\css\signup.css">
</head>

<body>
    <div id="form">
        <img src="../image/logo blomm2.png" alt="Logo" width="340" height="100">
        <h1 id="heading">Sign Up </h1><br>
        <form name="form" action="signup.php" method="POST">
            <label>Enter Username: </label>
            <input type="text" id="user" name="user" required><br><br>
            <label>Enter Email: </label>
            <input type="email" id="email" name="email" required><br><br>
            <label>Create Password: </label>
            <input type="password" id="pass" name="pass" required><br><br>
            <label>Retype Password: </label>
            <input type="password" id="cpass" name="cpass" required><br><br>


            <!-- Dropdown for selecting country -->
            <label>Select Country: </label>
            <select id="country" name="country">
                <option value="saudi_arabia">Saudi Arabia</option>
                <option value="jordan">Jordan</option>
                <option value="uae">United Arab Emirates</option>
            </select><br><br>
            <!--  selecting city -->
            <label>Select City: </label>
            <select id="city" name="city">
                <option value="riyadh">Riyadh</option>
                <option value="jeddah">Jeddah</option>
                <option value="dammam">Dammam</option>
                <option value="amman">Amman</option>
            </select><br><br>
            <input type="submit" id="btn" value="Sign Up" name="submit" />
        </form>
        <p>If you already have an account, <a href="login.php">Log In</a> here.</p>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <span class="text-muted">Privacy Policy | <a href="report.php">Report a Problem</a></span>
        </div>
    </footer>
</body>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>
