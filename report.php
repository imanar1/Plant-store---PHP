<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

setcookie('reported_problem', 'true', time() + (86400 * 30), "/");

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reported_problem = mysqli_real_escape_string($conn, $_POST['reported_problem']);
    // Get user_id from users table
    $sql_user_id = "SELECT user_id FROM users WHERE username = ?";
    $stmt_user_id = $conn->prepare($sql_user_id);
    $stmt_user_id->bind_param("s", $username);
    $stmt_user_id->execute();
    $result_user_id = $stmt_user_id->get_result();
    $row_user_id = $result_user_id->fetch_assoc();
    $user_id = $row_user_id['user_id'];
  
    // Save reported problem to the database
    $sql_insert_reported_problem = "INSERT INTO reported_problems (user_id, reported_problem) VALUES (?, ?)";
    $stmt_insert_reported_problem = $conn->prepare($sql_insert_reported_problem);
    $stmt_insert_reported_problem->bind_param("ss", $user_id, $reported_problem);

    if ($stmt_insert_reported_problem->execute()) {
        echo "<script>alert('Problem reported successfully!')</script>";
    } else {
        echo "Error: " . $sql_insert_reported_problem . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Problem</title>
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
                            <div class="col-sm-12">
                                <div class="card-block">
                                    <h5 class="card-title text-center mb-4">Report a Problem</h5>
                                    <form id="reportForm" method="post">
                                        <div class="form-group">
                                            <label for="reported_problem">Problem Description</label>
                                            <textarea class="form-control" id="reported_problem" name="reported_problem"
                                                rows="5" required></textarea>
                                        </div>
                                        <div class="button"> 
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </form>
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
            <span>Privacy Policy </span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        document.getElementById("reportForm").addEventListener("submit", function (event) {
            event.preventDefault();
            if (confirm("Are you sure you want to submit the report?")) {
                this.submit();
            }
        });
    </script>
</body>

</html>
