<?php
session_start();
?>

<?php
include('connection.php');
if (isset($_POST['submit'])) {
    $email = $_POST['user'];
    $password = $_POST['pass'];

    //check email 
    $sql_check_email = "SELECT * FROM users WHERE email='$email'";
    $result_check_email = mysqli_query($conn, $sql_check_email);
    $count_email = mysqli_num_rows($result_check_email);

    if ($count_email > 0) {
        // update if email ok
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql_update_password = "UPDATE users SET password='$hash' WHERE email='$email'";
        $result_update_password = mysqli_query($conn, $sql_update_password);

        if ($result_update_password) {
            echo '<script>alert("Password updated successfully. Please login again with your new password."); window.location.href = "login.php";</script>';
        } else {
            echo '<script>alert("Failed to update password."); window.location.href = "updatepass.php";</script>';
        }
    } else {
        echo '<script>alert("Email not found in the database."); window.location.href = "updatepass.php";</script>';
    }
}
?>

<?php
include("connection.php");
include("navbar1.php");
?>

<html>

<head>
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <br><br>
    <div id="form">
        <h1 id="heading">Change Password</h1>
        <form name="form" action="updatepass.php" method="POST" required>
            <label>Enter Email: </label>
            <input type="email" id="user" name="user"></br></br>
            <label>New Password: </label>
            <input type="password" id="pass" name="pass" required></br></br>
            <input type="submit" id="btn" value="Change Password" name="submit" />
        </form>
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
            if (user.length == "") {
                alert(" Enter email id!");
                return false;
            }
        }
    </script>
</body>

</html>