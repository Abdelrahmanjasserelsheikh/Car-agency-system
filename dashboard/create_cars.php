<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header('Location: homepage.php');
    exit();
}
include '../config/database.php';

$success = "";
$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $car_model = mysqli_real_escape_string($conn, trim($_POST['car_model']));
    $car_date  = mysqli_real_escape_string($conn, trim($_POST['car_date']));

    if(!empty($car_model) && !empty($car_date)){
        $sql = "INSERT INTO cars (car_model, car_date) VALUES ('$car_model', '$car_date')";
        if(mysqli_query($conn, $sql)){
            $success = "Car added successfully!";
        } else {
            $error = "Database error: " . mysqli_error($conn);
        }
    } else {
        $error = "Please fill all fields.";
    }
}
?>

<?php include '../includes/headerhomepage.php'; ?>
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

<section class="crud-section">
    <a href="read_cars.php" class="btn-back">← Back to Cars</a>
    <h2>➕ Add New Car</h2>

    <?php if($success): ?>
        <p class="msg success">✅ <?= $success ?></p>
    <?php endif; ?>
    <?php if($error): ?>
        <p class="msg error">❌ <?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="crud-form">

            <label>Car Model</label>
            <input 
                type="text" 
                name="car_model" 
                placeholder="e.g. Mercedes C200"
                value="<?= isset($_POST['car_model']) ? htmlspecialchars($_POST['car_model']) : '' ?>"
                required>

            <label>Car Date</label>
            <input 
                type="date" 
                name="car_date"
                value="<?= isset($_POST['car_date']) ? htmlspecialchars($_POST['car_date']) : '' ?>"
                required>

            <button type="submit" class="btn-submit-create">➕ Add Car</button>

        </div>
    </form>

</section>

<?php include '../includes/footer.php'; ?>