<?php
session_start();
include 'includes/conn.php';

// Your reCAPTCHA secret key
$recaptchaSecretKey = '6LdMGxwpAAAAAKobccN94OtWZ6o7nJOToADjqT7p';

if (isset($_POST['login'])) {
    // Validate reCAPTCHA
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $recaptchaSecretKey,
        'response' => $recaptchaResponse,
    ];

    $options = [
        'http' => [
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $recaptchaResult = json_decode($result, true);

    if ($recaptchaResult['success']) {
        // Continue with your existing login logic
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username = '$username'";
        $query = $conn->query($sql);

        if ($query->num_rows < 1) {
            $_SESSION['error'] = 'Cannot find account with the username';
        } else {
            $row = $query->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin'] = $row['id'];
            } else {
                $_SESSION['error'] = 'Incorrect password';
            }
        }
    } else {
        $_SESSION['error'] = 'reCAPTCHA verification failed';
    }
} else {
    $_SESSION['error'] = 'Input admin credentials first';
}

header('location: index.php');
?>
