<?php
    include("../config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Car agency</title>
        <link rel="stylesheet" href="../css/css/style.css">
    </head>
    <header>
        <nav class="navbar">
            <div class="left-nav">
                <!-- Profile with hover dropdown -->
                <div class="logo">
                    <img src="../css/images/modern-logo-design-sports-car-600nw-2345648999.png" alt="Logo">
                </div>
            <div class="profile-wrapper">
                <div class="profile-btn">
                    <div class="avatar">
                        <?php
                            $fname = $_SESSION['fname'] ?? '';
                            $lname = $_SESSION['lname'] ?? '';
                            echo strtoupper(substr($fname,0,1) . substr($lname,0,1));
                        ?>
                    </div>
                    <span class="profile-name"><?= htmlspecialchars($fname) ?></span>
                </div>
                <!-- Dropdown -->
                <div class="profile-dropdown">
                    <div class="dropdown-user">
                        👤 <?= htmlspecialchars($fname . ' ' . $lname) ?>
                    </div>
                    <a href="../auth/logout.php" class="dropdown-logout">
                        🚪 Logout
                    </a>
                </div>
            </div>
        </div>  
        <ul class="nav-links">
            <li><a href="../dashboard/homepage.php">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About us</a></li>
        </ul>
    </nav>
</header>
