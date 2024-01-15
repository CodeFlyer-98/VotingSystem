<?php
include 'includes/header.php';

$conn = new mysqli('localhost', 'root', '', 'votesystem');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_otp = $_POST['otp'];
    $voter_id = $_POST['voter_id'];

    // Retrieve stored OTP from the database
    $sql_get_otp = "SELECT otp FROM voters WHERE voters_id = '$voter_id'";
    $result = $conn->query($sql_get_otp);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_otp = $row['otp'];

        // Compare entered OTP with stored OTP
        if ($entered_otp == $stored_otp) {
            // OTP verification successful, update status and allow login
            $update_status_query = "UPDATE voters SET status = 1 WHERE voters_id = '$voter_id'";
            $conn->query($update_status_query);

            echo "<script>alert('Verification completed. Now you can able to login');</script>";
            echo "<script>window.location.href='home.php';</script>";
        } else {
            // Incorrect OTP, show alert and redirect
            echo "<script>alert('Incorrect OTP. Please try again');</script>";
            echo "<script>window.location.href='verify_otp.php?voter_id=$voter_id';</script>";
        }
    } else {
        echo "<p class='error'>Error retrieving OTP. Please try again later.</p>";
    }
} else {
    displayOTPForm($conn);
}

function displayOTPForm($conn) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify OTP</title>
        <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        h2 {
            color: #333;
        }

        p.success {
            color: #4caf50;
        }

        p.error {
            color: #f44336;
        }
    </style>
 </style>
    </head>
    <body>
        <div class="container">
            <h2>Enter OTP</h2>
            <form action="verify_otp.php" method="post">
                <input type="hidden" name="voter_id" value="<?= $_GET['voter_id'] ?>">
                <input type="text" name="otp" placeholder="Enter OTP" required>
                <button type="submit">Verify OTP</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>