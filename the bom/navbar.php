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
                <img src="https://bkdelivery.co.id/static/website/img/logo_2022_x2.6bb6d972f0a5.png" class="logo">
            </div>
            <nav class="navigation">
                <div class="nav-left">
                    <a href="#" class="nav_link">
                        <span class="kun">Order</span><br>
                        <span class="put">Delivery</span>
                    </a>
                    <a href="promotion.html" class="nav_link">
                        <span class="kun">Get Fresh</span><br>
                        <span class="put">Promotions</span>
                    </a>
                    <a href="#" class="nav_link">
                    <span class="kun">Exclusive</span><br>
                    <span class="put">Large Order</span>
                    </a>
                </div>
                <div class="nav-right">
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="login.php" class="nav_link">LOGIN</a> 
                    <?php else: ?>
                       <a href="profil.php" class="nav_link">Profile</a>
                    <?php endif; ?>
                    <a href="order.php" id="nav_link"><img src="https://bkdelivery.co.id/static/website/img/BK_TopCart2x.ab793c4833a3.png" alt="Cart" class="cart-icon"></a>
                </div>
            </nav>
        </div>
    </header>