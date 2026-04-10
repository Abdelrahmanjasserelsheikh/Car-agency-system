<?php
include "../config/database.php";
//------------------------------
//Checking if the request is coming form the login form
if(isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["pass"];
    // $password = password_hash($password,PASSWORD_DEFAULT); de karthga eb3d 3nha
//check if the user is already register 
    $checkEmail = "SELECT * FROM customers WHERE customer_email = '$email' ";//here extract from database the user abdelrahman
    $sqlcheck = $conn->query($checkEmail);
    if($sqlcheck->num_rows > 0) 
    {
        $row = $sqlcheck->fetch_assoc();//el line dah msh fahmo ---- bs fhmto
        if(password_verify($password,
        $row['customer_password']))
        {
            session_start();
            session_id();
            $_SESSION['email'] = $row['customer_email'];
            $_SESSION['fname'] = $row['customer_fname'];
            $_SESSION['role'] = $row['role'];
            header("location: ../dashboard/homepage.php ");
            exit();
        }else
        {
            echo "Incorrect email or password ";
        }
    }else
    {
        echo "Incorrect email or password";
    }
}else
{
    echo "Email not found!";
}
?>