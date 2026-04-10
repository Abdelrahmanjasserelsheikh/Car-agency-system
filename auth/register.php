<?php
    include("../config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Car Agency</title>
    <link rel="stylesheet" href="../css/css/signup.css">
    <link rel="stylesheet" href="../css/css/headerlogin.css">
</head>
<body>
    <section class="login-fb-style">
        <div class="login-left">
            <h1>Car Agency</h1>
            <p>Find your dream car quickly and easily.</p>
        </div>
        <div class="login-right">
            <div class="login-box">
                <h2>Sign Up</h2>
                <form action="register_handler.php" method="POST">
                    <input type="text"  name="fname" placeholder="First Name" required>
                    <input type="text" name="lname" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="pass"  placeholder="Password" required>
                    <input class="signup-btn" type="submit" name="signup" value="Signup" >
                </form>
                <p class="signup-link">
                    Already have an account? <a href="login.php">Login</a>
                </p>
            </div>
        </div>
    </section>
</body>
</html>