<?php
session_start();
//dana code 
include("connection.php");
include("navbar2.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

function is_valid_card_number($card_number)
{
    if (!preg_match('/^[0-9]{16}$/', $card_number)) {
        return false;
    }

    if (!isset($_POST['expiryMonth']) || !preg_match('/^[0-9]{2}$/', $_POST['expiryMonth'])) {
        return false;
    }

    if (!isset($_POST['expiryYear']) || !preg_match('/^[0-9]{2}$/', $_POST['expiryYear'])) {
        return false;
    }

    if (!isset($_POST['cvCode']) || !preg_match('/^[0-9]{3}$/', $_POST['cvCode'])) {
        return false;
    }

    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && is_valid_card_number($_POST['cardNumber'])) {
    $username = $_SESSION['username'];


    // Get user_id from users table
    $sql_user_id = "SELECT user_id FROM users WHERE username = ?";
    $stmt_user_id = $conn->prepare($sql_user_id);
    $stmt_user_id->bind_param("s", $username);
    $stmt_user_id->execute();
    $result_user_id = $stmt_user_id->get_result();
    $row_user_id = $result_user_id->fetch_assoc();
    $user_id = $row_user_id['user_id'];

    $cardNumber = mysqli_real_escape_string($conn, $_POST['cardNumber']);
    $expiryMonth = mysqli_real_escape_string($conn, $_POST['expiryMonth']);
    $expiryYear = mysqli_real_escape_string($conn, $_POST['expiryYear']);
    $cvCode = mysqli_real_escape_string($conn, $_POST['cvCode']);


    $sql_insert = "INSERT INTO payment (user_id, card_number, expiry_month, expiry_year, cv_code) VALUES ('$user_id', '$cardNumber', '$expiryMonth', '$expiryYear', '$cvCode')";

    if ($conn->query($sql_insert) === TRUE) {
        $confirmation_message = "Payment information saved successfully!";
    } else {
        $confirmation_message = "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../css/payment.css">


</head>

<body>
    <div class="payment-container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Payment </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card payment-form">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                    placeholder="Valid Card Number" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="expiryMonth" class="form-label">Expiry Month</label>
                                    <input type="text" class="form-control" id="expiryMonth" name="expiryMonth"
                                        placeholder="MM" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="expiryYear" class="form-label">Expiry Year</label>
                                    <input type="text" class="form-control" id="expiryYear" name="expiryYear"
                                        placeholder="YY" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cvCode" class="form-label">CV Code</label>
                                <input type="password" class="form-control" id="cvCode" name="cvCode" placeholder="CV"
                                    required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember</label>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" style="width: 370px;">Pay</button>
                        </form>
                        <?php if (isset($confirmation_message)): ?>
                            <div class="alert alert-success mt-3" role="alert">
                                <?php echo $confirmation_message; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="footer-container">
            <span class="text-muted">Privacy Policy | <a href="report.php">Report a Problem</a></span>
        </div>
    </footer>
</body>

</html>