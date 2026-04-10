<?php
$host = "localhost";
$username = "root";
$pass= "Dada@2005";
$dbname = "car_agency";
//Create connection-------------------
$conn = new mysqli($host,$username,$pass,$dbname);
$conn->set_charset("utf8mb4");
//Check connection
if($conn->connect_error)
{
    die("Connection failed" . $conn->connect_error);
    exit();
}