<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header('Location: homepage.php');
    exit();
}
include '../config/database.php';

$id = (int)$_GET['id'];
mysqli_query($conn, "DELETE FROM cars WHERE car_id=$id");
header('Location: read_cars.php');
exit();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/css/homepage.css">
        <link rel="stylesheet" href="../css/css/headerhomepage.css">
    </head>
    <body>
        
    </body>
</html>