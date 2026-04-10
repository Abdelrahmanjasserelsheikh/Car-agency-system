<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header('Location: homepage.php');
    exit();
}
include '../config/database.php';
$cars = mysqli_query($conn, "SELECT * FROM cars ORDER BY car_date DESC");
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
    <h2>📋 All Cars</h2>
    <a href="create_cars.php" class="btn-create">➕ Add New Car</a>

    <table class="cars-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($car = mysqli_fetch_assoc($cars)): ?>
            <tr>
                <td><?= $car['car_id'] ?></td>
                <td><?= $car['car_model'] ?></td>
                <td><?= $car['car_date'] ?></td>
                <td>
                    <a href="update_cars.php?id=<?= $car['car_id'] ?>" class="btn-update">✏️ Edit</a>
                    <a href="delete_cars.php?id=<?= $car['car_id'] ?>" 
                    onclick="return confirm('Delete this car?')" 
                    class="btn-delete">🗑️ Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>

<?php include '../includes/footer.php'; ?>