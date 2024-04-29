<?php

session_start();
include("connection.php");

$username = $_SESSION['username'];
setcookie('username', $username, time() + (86400 * 30), "/");

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
} else {
    echo "User not found";
}

if (!isset($_SESSION['city']) || !isset($_SESSION['country'])) {
    header("Location: signup.php");
    exit;
}

$city = $_SESSION['city'];
$country = $_SESSION['country'];

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="..\css\profile.css" />

</head>

<body>
    <?php include "navbar2.php"; ?>
    <br><br><br>

    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <label for="profilePic" style="cursor: pointer;">
                                            <input type="file" id="profilePic" style="display: none;"
                                                onchange="previewImage(event)">
                                            <img src="https://img.icons8.com/bubbles/100/000000/user.png"
                                                class="img-radius" alt="User-Profile-Image" id="profileImg">
                                        </label>
                                        <p id="uploadMessage">Upload a profile picture</p>
                                    </div>
                                    <h6 class="f-w-600">
                                        <?php echo $username; ?>
                                    </h6>

                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">
                                                <?php echo $email; ?>
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Phone</p>
                                            <h6 class="text-muted f-w-400">98979989898</h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Address</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">City <?php echo $city; ?></p>
                                                <h6 class="text-muted f-w-400">Country <?php echo $country; ?> </h6>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center mt-5">
        <div class="container">
            <span class="text-muted">Privacy Policy | <a href="report.php">Report a Problem</a></span>
        </div>
    </footer>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('profileImg');
                output.src = reader.result;
                document.getElementById('uploadMessage').style.display = 'none'; // Hide the upload message
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>