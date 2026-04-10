<?php
    include("../config/database.php");
    include("../includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <section class="hero">
            <h2>Find your dream car</h2>
            <p>Let's test the vibes of being the king</p>
            <button class="btn">Browse</button>
        </section>
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
    <section class="about" id="about-us">
        <h2>About Us</h2>
        <p>
            We are a professional car agency providing the best cars with the best prices.
            Our goal is to help you find your dream car with best quality and best price.
        </p>
    </section>
    <!-- Services -->
    <section class="services">
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
    <section class="contact-section">
        <h2>Contact Us</h2>
        <form>
            <input type="text" placeholder="Your Name">
            <input type="email" placeholder="Your Email">
            <textarea placeholder="Your Message"></textarea>
            <button class="btn">Send Message</button>
        </form>
    </section>
</html>
    <!--Footer section-->
    <?php
        include ("../includes/footer.php")
    
    ?>