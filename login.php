<?php
session_start();

// Array of valid username and password combinations
$validCredentials = [
    ["username" => "alumni", "password" => "alumni", "userType" => "alumni"],
    ["username" => "student", "password" => "student", "userType" => "student"], // Student user
    ["username" => "admin", "password" => "admin", "userType" => "admin"]  // Admin user
];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Flag to check if the credentials are valid
    $isValid = false;

    // Loop through the valid credentials array and check if there is a match
    foreach ($validCredentials as $credential) {
        if ($username == $credential["username"] && $password == $credential["password"]) {
            // Set session variable for the username
            $_SESSION['username'] = $username;
            // Set a session variable for the user type (optional, if needed)
            $_SESSION['userType'] = $credential["userType"];
            $isValid = true;
            break;
        }
    }

    // If credentials are valid, store session variable and redirect
    if ($isValid) {
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Internal CSS for styling -->
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Centered login container */
        .login-container {
            width: 350px;
            margin: 100px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 20px;
            width: 100%;
            text-align: left;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #2575fc;
            box-shadow: 0 0 10px rgba(37, 117, 252, 0.5);
        }

        input[type="submit"] {
            background-color: #2575fc;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #6a11cb;
            transform: scale(1.05);
        }

        /* Error message styling */
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>

</head>
<body>

    <!-- Login Form -->
    <div class="login-container">
        <h2>Login</h2>

        <!-- Login Form Submission -->
        <form method="POST" id="loginForm">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
            </div>

            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
            </div>

            <input type="submit" value="Login">
        </form>

        <?php
        // Display error message if login failed
        if (isset($error)) {
            echo "<p class='error-message'>$error</p>";
        }
        ?>
    </div>

    <!-- Internal JavaScript -->
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission to allow validation

            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
            const errorMessage = document.querySelector(".error-message");

            // Predefined correct credentials (for simulation)
            const validCredentials = [
                { username: "alumni", password: "alumni" },
                { username: "student", password: "student" },
                { username: "admin", password: "admin" } // New user credentials
            ];

            // Flag to check if the entered credentials are valid
            let isValid = false;

            // Check if the entered credentials match any valid set
            validCredentials.forEach(credential => {
                if (username === credential.username && password === credential.password) {
                    isValid = true;
                }
            });

            if (isValid) {
                // Allow the form to submit if credentials are correct
                this.submit();
            } else {
                // Show error message if credentials don't match
                errorMessage.textContent = "Invalid username or password. Please try again.";
            }
        });
    </script>

</body>
</html>

