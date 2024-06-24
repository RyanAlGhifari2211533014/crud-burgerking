<?php
include 'config.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = null;
}

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    if ($user_id) {
        mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    } else {
        unset($_SESSION['guest_cart'][$remove_id]);
        $_SESSION['guest_cart'] = array_values($_SESSION['guest_cart']);
    }
    header('location:order.php');
    exit;
}

if (isset($_GET['delete_all'])) {
    if ($user_id) {
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    } else {
        unset($_SESSION['guest_cart']);
    }
    header('location:order.php');
    exit;
}
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

    <script>
        let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}

function changeSlide(n) {
    slideIndex += n;
    if (slideIndex < 1) { slideIndex = slides.length; }
    if (slideIndex > slides.length) { slideIndex = 1; }
    showSlides();
}
    </script>

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
