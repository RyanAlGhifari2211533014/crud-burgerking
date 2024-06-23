<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Burger King</title>
    <link rel="stylesheet" href="cssfile.css"> </link>
</head>
<body>

    <!-- memanggil navbar -->
    <?php
    include 'navbar.php'
    ?>

    <div class="slider">
        <div class="slide fade">
            <img src="pictures/promo1.jpg" alt="Promo 1" class="slide-image">
        </div>
        <div class="slide fade">
            <img src="pictures/promo2.jpg" alt="Promo 2" class="slide-image">
        </div>
        <div class="slide fade">
            <img src="pictures/promo3.jpg" alt="Promo 3" class="slide-image">
        </div>
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>

    <script src="jsfile.js"></script>

    <section class="menu-section">
        <h2 class="menu-title">Our Menus</h2>
    </section>

<!-- memanggil menu a.k.a kotak kotak-->
    <div class="imgmenu"> <?php include 'menu.php' ?></div>
    <footer>
        <p>&copy; 2024 Burger King Corporation. Used Under License. All rights reserved.</p>
    </footer> 

    <script src="js/scripts.js"></script>
</body>
</html>
