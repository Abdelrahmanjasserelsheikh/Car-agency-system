<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header('Location: homepage.php');
    exit();
}
include '../config/database.php';
if(!isset($_GET['id']) || !is_numeric($_GET['id']))
{
    header("location: read_cars.php");
    exit();
}
$id = (int)$_GET['id'];
$car = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cars WHERE car_id=$id"));

$success = ""; $error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $car_model = mysqli_real_escape_string($conn, $_POST['car_model']);
    $car_date  = mysqli_real_escape_string($conn, $_POST['car_date']);

    $sql = "UPDATE cars SET car_model='$car_model', car_date='$car_date' WHERE car_id=$id";
    if(mysqli_query($conn, $sql)){
        $success = "Car updated successfully!";
        $car = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cars WHERE car_id=$id"));
    } else {
        $error = "Something went wrong.";
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
    <h2>✏️ Edit Car #<?= $id ?></h2>

    <?php if($success): ?><p class="msg success"><?= $success ?></p><?php endif; ?>
    <?php if($error): ?><p class="msg error"><?= $error ?></p><?php endif; ?>

    <div class="crud-form">
        <input type="text" id="car_model" value="<?= $car['car_model'] ?>" placeholder="Car Model">
        <input type="date" id="car_date"  value="<?= $car['car_date'] ?>">
        <button onclick="submitUpdate()">Update Car</button>
    </div>
</section>

<script>
function submitUpdate(){
    const form = document.createElement('form');
    form.method = 'POST'; form.action = '';
    const f1 = document.createElement('input');
    f1.name = 'car_model'; f1.value = document.getElementById('car_model').value;
    const f2 = document.createElement('input');
    f2.name = 'car_date'; f2.value = document.getElementById('car_date').value;
    form.appendChild(f1); form.appendChild(f2);
    document.body.appendChild(form); form.submit();
}
</script>

<?php include '../includes/footer.php'; ?>