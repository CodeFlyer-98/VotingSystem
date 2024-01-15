<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous"> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"> 
    </script> 
  
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"> 
    </script> 
  
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"> 
    </script> 
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f0fff0; /* Light Green */
            color: #333;
            text-align: center;
            margin: 20px; /* Adjusted margin */
        }

        form {
            max-width: 400px; /* Adjusted width */
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #8fbc8f; /* Darker Green Border */
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #fff;
            background-color: #2e8b57; /* Sea Green */
            padding: 15px;
            border-radius: 8px 8px 0 0;
            margin-bottom: 20px;
            margin-top: 0;
            border: none;
            font-size: 24px;
        }

        label {
            display: block;
            margin-top: 8px; /* Reduced margin */
            color: #556b2f; /* Dark Olive Green */
            font-size: 16px;
            text-align: left; /* Align label to the left */
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 4px 0; /* Reduced margin */
            display: inline-block;
            border: 1px solid #8fbc8f; /* Darker Green Border */
            box-sizing: border-box;
            border-radius: 5px;
            font-size: 16px;
        }

        .password-container {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #556b2f; /* Dark Olive Green */
        }

        input[type="file"] {
            border: none;
            margin-top: 8px; /* Reduced margin */
        }

        input[type="button"] {
            background-color: #2e8b57; /* Sea Green */
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        input[type="button"]:hover {
            background-color: #228b22; /* Forest Green */
        }

        .otp-container input {
            margin-top: 10px;
        }
    </style>
</head>
<!-- ... (head section remains unchanged) ... -->

<body>
<div class="container">
    <form action="process_registration.php" method="post" enctype="multipart/form-data">
        <h2>User Registration</h2>

        <div class="form-group">
            <label for="voter_id">Voter ID:</label>
            <input type="text" class="form-control" name="voter_id" placeholder="Enter Voter ID" required>
        </div>

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                <span class="eye-icon" onclick="togglePasswordVisibility('password')">👁️</span>
            </div>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <div class="password-container">
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                <span class="eye-icon" onclick="togglePasswordVisibility('confirm_password')">👁️</span>
            </div>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control" name="photo" accept="image/*" required>
        </div>

        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>

<script>
    function togglePasswordVisibility(passwordFieldId) {
        var passwordField = document.getElementById(passwordFieldId);
        passwordField.type = passwordField.type === "password" ? "text" : "password";
    }
</script>

</body>
</html>
