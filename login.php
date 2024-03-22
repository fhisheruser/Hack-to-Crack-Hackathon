<?php
// Fixed username and password
$fixed_username = "abc@gmail.com";
$fixed_password = "123";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate login credentials
    if ($email === $fixed_username && $password === $fixed_password) {
        // Redirect to dashboard or home page upon successful login
        header("Location: phome.php");
        exit();
    } else {
        // Display error message for invalid credentials
        $error_message = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <style>
       
        .body {
            background-image: url('MedicalBackground.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            background-color: #77dd77;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            color: #333;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .signup-button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff; /* Blue color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .signup-button:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    
   </style>
</head>
<body class="body">
    <div class="form-container">
        <h1>Login</h1>
        <!-- Display error message if exists -->
        <?php if (isset($error_message)) { ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php } ?>
        <!-- Login form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
        <!-- Sign up button -->
        <button class="signup-button" onclick="window.location.href='plogin.php'">Sign Up</button>
    </div>
</body>
</html>
