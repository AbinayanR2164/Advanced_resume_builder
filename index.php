<?php
session_start();
include("registerdbcon.php"); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobilenumber = $_POST['mobilenumber']; // Get mobile number from form
    $password = $_POST['password'];

    // Prevent SQL Injection
    $name = mysqli_real_escape_string($conn, $name);
    $mobilenumber = mysqli_real_escape_string($conn, $mobilenumber);

    // Debugging: Print input values to check
    // echo "Entered Name: $name, Mobile: $mobilenumber, Password: $password";

    // Corrected SQL Query (Ensure correct column names!)
    $query = "SELECT * FROM register WHERE name='$name' AND mobilenumber='$mobilenumber' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Debugging: Print stored password to compare
        // echo "Stored Password: " . $user['password'];

        // Check if password is hashed
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name']; // Store session
            header("Location: searchquery.php"); // Redirect after login
            exit();
        } elseif ($password == $user['password']) { 
            // This check is only for plain text passwords (if stored unencrypted)
            $_SESSION['name'] = $user['name'];
            header("Location: searchquery.php");
            exit();
        } else {
            $error = "❌ Incorrect password!";
        }
    } else {
        $error = "❌ User not found or mobile number incorrect!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="education.css">
</head>
<body>

    <form class="register" action="" method="post">
        <div class="login">
            <div class="login-header">
                <h1>User Details</h1>
            </div>
            <div class="login-form">
                <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

                <h3>Username</h3>
                <input type="text" name="name" placeholder="Username" required /><br>

                <h3>Mobile Number</h3>
                <input type="text" name="mobilenumber" placeholder="Mobile Number" required /><br>

                <h3>Password</h3>
                <input type="password" name="password" placeholder="Password" required /><br>

                <button type="submit" class="form__input">Submit</button>
                <br>
            </div>
        </div>
    </form>

</body>
</html>
