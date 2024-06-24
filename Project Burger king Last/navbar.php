<?php
include 'config.php';

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
<body><header>
        <div class="header-container">
            <div id="bulog">
            <a href="index.php"> <img src="https://bkdelivery.co.id/static/website/img/logo_2022_x2.6bb6d972f0a5.png" class="logo"></a>    
           
            </div>
            <nav class="navigation">
                <div class="nav-left">
                    <a href="Landing.php" class="nav_link">
                        <span class="kun">Order</span><br>
                        <span class="put">Delivery</span>
                    </a>
                    <a href="" class="nav_link">
                        <span class="kun">Get Fresh</span><br>
                        <span class="put">Promotions</span>
                    </a>
                    <a href="elo.php" class="nav_link">
                    <span class="kun">Exclusive</span><br>
                    <span class="put">Large Order</span>
                    </a>
                </div>
                <div class="nav-right">
                    <?php if(isset($_SESSION['user_id'])): ?>
                <a href="profil.php" class="nav_link">Profile</a>
                    <?php else: ?>
                        <a href="login.php" class="nav_link">Login</a>
                    <?php endif; ?>
                    <a href="order.php" id="nav_link"><img src="https://bkdelivery.co.id/static/website/img/BK_TopCart2x.ab793c4833a3.png" alt="Cart" class="cart-icon"></a>
                </div>
            </nav>
        </div>
    </header>