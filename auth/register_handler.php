<?php
//To save the data in the database
include("../config/database.php");
//Checking if the user came from signup
if(isset($_POST["signup"]))
{
    //Saving new registation
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
    //Checking if the user is already exists
    $checkEmail = "SELECT * FROM customers WHERE customer_email = '$email'";
    //Compare the email in database with the email exist in the form
    $sqlcheck = $conn->query($checkEmail);
    if($sqlcheck->num_rows > 0)
    {
        echo "Email is already exists";
        exit();
        //Till this point the user is already exist
    }else 
    //Here we have created new user connection
    //public\homepage.php
    {
        $sql = "INSERT INTO customers (customer_fname,customer_lname,customer_email,customer_password)
                VALUES ('$fname','$lname','$email','$hashedPassword')";
        if($conn->query($sql) == TRUE)
        {
            header("location: ../dash");
            echo "Signup succssefully";
            exit();
        }else
        {
            echo "Error: ".$conn->error;
        }
    }
}else
{
    echo "Please fill up all the forms" . "<br>";
    // exit();
}

?>