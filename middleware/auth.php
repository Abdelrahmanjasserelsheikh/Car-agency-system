<?php
//el file dah 3shan ashof el user 3aml login wla l2.
if(!isset($_SESSION['user_id'])){
    header("location: ../auth/login.php");
}
?>