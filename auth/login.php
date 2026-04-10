<?php
    include("../config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Car Agency</title>
        <link rel="stylesheet" href="../css/css/login.css">
        <link rel="stylesheet" href="../css/css/headerlogin.css">
    </head>
    <body>
        <section class="login-fb-style">
            <!-- Left Panel -->
            <div class="login-left">
                <h1>Car Agency</h1>
                <p>Find your dream car quickly and easily.</p>
            </div>
            <!-- Right Panel -->
            <div class="login-right">
                <div class="login-box">
                    <h2>Login</h2>
                    <form action="login_handler.php" method="POST">
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="pass" placeholder="Password" required>
                        <input class="login-btn"  type="submit" name="login" value="Login" >
                    </form>
                    <p class="signup-link">
                        Don't have an account? <a href="register.php">Sign Up</a>
                    </p>
                    <p class="forgot-link"><a href="#">Forgot Password?</a></p>
                </div>
            </div>
        </section>
    </body>
    <?php
        // include("../includes/footer.php");
    ?>
</html>