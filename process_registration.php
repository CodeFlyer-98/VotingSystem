<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "votesystem";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $voter_id = $_POST['voter_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $raw_password = $_POST['password']; // Store the raw password for email confirmation, etc.
    $password = password_hash($raw_password, PASSWORD_DEFAULT); // Hash the password

    // Validate and upload image
    $image_folder = '';
    $image_path = $image_folder . basename($_FILES['photo']['name']);
    $image_extension = pathinfo($image_path, PATHINFO_EXTENSION);

    // Allow only certain image file types (you can modify this list)
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($image_extension, $allowed_extensions)) {
        die("Invalid image file type. Allowed types: jpg, jpeg, png, gif");
    }

    $otp = mt_rand(100000, 999999);
    $status=0;
        
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $image_path)) {
        $sql = "INSERT INTO voters (voters_id, password, firstname, lastname, photo, email, otp, status ) VALUES ('$voter_id', '$password', '$first_name', '$last_name', '$image_path', '$email', '$otp', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful! Now verify your registration by entering the OTP from admin .');";
            echo "window.location.href='verify_otp.php?voter_id=$voter_id';</script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the registration page if accessed directly
    header("Location: registration_form.php");
    exit();
}
?>
