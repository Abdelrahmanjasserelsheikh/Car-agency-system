<?php
    session_start();
    include("../includes/headerhomepage.php");
    include("../config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/css/style.css">
        <link rel="stylesheet" href="../css/css/homepage.css">
        <link rel="stylesheet" href="../css/css/headerhomepage.css">
    </head>
    <body>
        <div class="home" id="home">
            <h1>
                Hi,
                <?php 
                    if(isset($_SESSION['fname'])){
                        echo $_SESSION['fname'];
                    }
                ?>!
            </h1>
        </div>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <section class="admin-panel">
                <h2>⚙️ Admin Panel</h2>
                <!-- Stat Cards -->
                <div class="stats-grid">
                    <!-- Total Cars -->
                    <div class="stat-card blue">
                        <div class="stat-icon">🚗</div>
                        <div class="stat-info">
                            <p class="stat-label">Total Cars</p>
                            <p class="stat-number">
                                <?php
                                    $r1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM cars");
                                    echo mysqli_fetch_assoc($r1)['total'];
                                ?>
                            </p>
                        </div>
                    </div>
                    <!-- Total Customers -->
                    <div class="stat-card green">
                        <div class="stat-icon">👥</div>
                        <div class="stat-info">
                            <p class="stat-label">Total Customers</p>
                            <p class="stat-number">
                                <?php
                                    $r2 = mysqli_query($conn, "SELECT COUNT(*) as total FROM customers WHERE role='user'");
                                    echo mysqli_fetch_assoc($r2)['total'];
                                ?>
                            </p>
                        </div>
                    </div>
                    <!-- Total Car Models -->
                    <div class="stat-card yellow">
                        <div class="stat-icon">🏷️</div>
                        <div class="stat-info">
                            <p class="stat-label">Total Car Models</p>
                            <p class="stat-number">
                                <?php
                                    $r3 = mysqli_query($conn, "SELECT COUNT(DISTINCT car_model) as total FROM cars");
                                    echo mysqli_fetch_assoc($r3)['total'];
                                ?>
                            </p>
                        </div>
                    </div>
                    <!-- New Customers This Month -->
                    <div class="stat-card red">
                        <div class="stat-icon">🆕</div>
                        <div class="stat-info">
                            <p class="stat-label">New Customers This Month</p>
                            <p class="stat-number">
                                <?php
                                    $r4 = mysqli_query($conn, "SELECT COUNT(*) as total FROM customers 
                                        WHERE role='user' 
                                        AND MONTH(created_at) = MONTH(NOW()) 
                                        AND YEAR(created_at) = YEAR(NOW())");
                                    echo mysqli_fetch_assoc($r4)['total'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Chart -->
                <div class="chart-container">
                    <h3>Cars Added Per Month</h3>
                    <canvas id="carsChart"></canvas>
                </div>
                <!-- CRUD Buttons -->
                <div class="admin-buttons">
                    <a href="create_cars.php?action=create" class="btn-create">➕ Add Car</a>
                    <a href="read_cars.php?action=read"   class="btn-read">📋 View Cars</a>
                    <a href="update_cars.php?action=update" class="btn-update">✏️ Edit Car</a>
                    <a href="delete_cars.php?action=delete" class="btn-delete">🗑️ Delete Car</a>
                </div>
            </section>
                <!-- Chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                // Get chart data from PHP
                const labels = <?php
                    $months = [];
                    for($i = 5; $i >= 0; $i--){
                        $months[] = date('M Y', strtotime("-$i months"));
                    }
                    echo json_encode($months);
                ?>;
                const data = <?php
                    $counts = [];
                    for($i = 5; $i >= 0; $i--){
                        $res = mysqli_query($conn, "SELECT COUNT(*) as total FROM cars 
                                                    WHERE MONTH(car_date) = MONTH(NOW() - INTERVAL $i MONTH)
                                                    AND YEAR(car_date) = YEAR(NOW() - INTERVAL $i MONTH)");
                        $counts[] = (int)mysqli_fetch_assoc($res)['total'];
                    }
                    echo json_encode($counts);
                ?>;
                const ctx = document.getElementById('carsChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Cars Added',
                            data: data,
                            backgroundColor: 'rgba(99, 179, 237, 0.7)',
                            borderColor: '#63b3ed',
                            borderWidth: 2,
                            borderRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { labels: { color: '#fff' } }
                        },
                        scales: {
                            x: { ticks: { color: '#fff' }, grid: { color: 'rgba(255,255,255,0.1)' } },
                            y: { ticks: { color: '#fff', stepSize: 1 }, grid: { color: 'rgba(255,255,255,0.1)' } }
                        }
                    }
                });
            </script>
    
<?php endif; ?>

        <!--CARS CONTAINER-->
        <section class="cars">
            <div class="cars-container">
                <div class="car-card">
                    <img src="../css/images/image_of_car1.png" alt="A photo of a mercedes car">
                    <p>This is our best value for the least price</p>
                    <button class="btn">Browse</button>
                </div>
                <div class="car-card">
                    <img src="../css/images/images.png" alt="A photo of a bmw car">
                    <p>The most you get with this option</p>
                    <button class="btn">Browse</button>
                </div>
            </div>
        </section>
        <!-- About Us -->
            <section class="about" id="about">
                <h2>About Us</h2>
                <p>
                    We are a professional car agency providing the best cars with the best prices.
                    Our goal is to help you find your dream car with best quality and best price.
                </p>
            </section>
        <!-- Services -->
            <section class="services" id="services">
                <div class="container">
                    
                </div>
                <h2>Our Services</h2>
                <div class="services-container">
                    <div class="service-card">
                        <h3>Car Selling</h3>
                        <p>We offer a wide range of cars for all budgets.</p>
                    </div>
                    <div class="service-card">
                        <h3>Car Rental</h3>
                        <p>Rent luxury cars with the best prices.</p>
                    </div>
                    <div class="service-card">
                        <h3>Maintenance</h3>
                        <p>Professional maintenance for your car.</p>
                    </div>
                </div>
            </section>
            <!-- Contact -->
            <section class="contact-section" id="contact">
                <h2>Contact Us</h2>
                <form>
                    <input type="text" placeholder="Your Name">
                    <input type="email" placeholder="Your Email">
                    <textarea placeholder="Your Message"></textarea>
                    <button class="btn">Send Message</button>
                </form>
            </section>
        
    </body>
</html>
<?php 
    include("../includes/footer.php");
?>