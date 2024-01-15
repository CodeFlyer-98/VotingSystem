<?php
session_start();

echo '<pre>';
print_r($_POST);
echo '</pre>';

include 'includes/conn.php';

// Verify reCAPTCHA response
$recaptchaSecretKey = '6LdMGxwpAAAAAKobccN94OtWZ6o7nJOToADjqT7p';
$recaptchaResponse = $_POST['g-recaptcha-response'];

if (empty($recaptchaResponse)) {
    echo "<script>alert('reCAPTCHA response is missing. Please try again.');</script>";
    echo "<script>window.location.href='index.php';</script>";
    exit();
}

// Verify the reCAPTCHA response using the secret key
$recaptchaVerification = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}");
$recaptchaData = json_decode($recaptchaVerification);

if (!$recaptchaData->success) {
    echo "<script>alert('reCAPTCHA verification failed. Please try again.');</script>";
    echo "<script>window.location.href='index.php';</script>";
    exit();
}

if (isset($_POST['voter'])) {
    $voter = $_POST['voter'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
    $query = $conn->query($sql);

    if ($query->num_rows < 1) {
        echo "<script>alert('Cannot find voter with the ID');</script>";
    } else {
        $row = $query->fetch_assoc();
        if ($row['status'] == 1 && password_verify($password, $row['password'])) {
            $_SESSION['voter'] = $row['id'];
        } elseif ($row['status'] != 1) {
            echo "<script>alert('Your account is not yet verified. Please verify your account.');";
            echo "window.location.href='verify_otp.php?voter_id={$row['voters_id']}';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    }
} else {
    echo "<script>alert('Input voter credentials first');</script>";
}

echo "<script>window.location.href='index.php';</script>";
exit();
?>
