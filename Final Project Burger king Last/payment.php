<?php
include 'config.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger King - Payment</title>
    <link rel="stylesheet" href="payment.css">

</head>
<body>
    <div class="rutecontent">
        <div class="chart1">
          
           <strong>Cart</strong>
          
       </div>

       <div class="chart2">
          
           <strong>Delivery Info</strong>
          
       </div>

       <div class="chart3">
          
           <strong>Payment</strong>
           
          
       </div>
          
       </div>

    <div class="cart-content columns">
           
    <div id="item-section" class="two-column border-right">
        <table class="table">
            <thead>
                <tr class="header">
                    <th colspan="3">Order Summary</th>
                </tr>
                <tr>
                    <th class="name">Name</th>
                    <th class="quantity">Quantity</th>
                    <th class="total_price">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grand_total = 0;
                $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                if (mysqli_num_rows($cart_query) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                        $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
                        $grand_total += $sub_total;
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fetch_cart['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($fetch_cart['quantity']) . "</td>";
                        echo "<td class=\"text-align-right\">Rp" . htmlspecialchars($sub_total) . "/-</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan=\"3\">No items in cart</td></tr>";
                }
                ?>
                
        
                
        
              
            </tbody></table>
            <table class="table summary">
                <tbody><tr>
                    <td>Subtotal</td>
                    <td class="text-align-right">Rp<?php echo $grand_total; ?>/-</td>
                </tr>
                <tr>
                <td>Delivery fee (fixed)</td>
                    <td class="text-align-right">Rp10,000/-</td>
                </tr>
                <tr>
                    <td>Pajak 10%</td>
                    <td class="text-align-right">Rp<?php $tax = $grand_total * 0.1; echo $tax; ?>/-</td>
                </tr>
                <tr class="grandtotal">
                    <td><strong>TOTAL</strong></td>
                    <td class="text-align-right">Rp<?php echo $grand_total + 10000 + $tax; ?>/-</td>
                </tr>
            </tbody></table>
        
            
        </div>
        
                   <div class="two-column">
                        <h2>Deliver To</h2>
                        <p><?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $alamat = htmlspecialchars($_POST['alamat']);
        $latitude = htmlspecialchars($_POST['latitude']);
        $longitude = htmlspecialchars($_POST['longitude']);
        
        echo "<h2>Alamat Pengiriman</h2>";
        echo "<p>$alamat</p>";
    } else {
        echo "<p>Data alamat tidak ditemukan.</p>";
    }
    ?></p>
                        
                        <form id="submit-form" action="tes.php" method="POST" class="method">
                        <input type="hidden" name="csrfmiddlewaretoken" value="e7at9mSE6PTOt2MiWx34MRgNK4srjPKhmEDM0qvuHPNitNFhhydKScomvkMjXUct">
        
                        
        
                        <div class="amount payment_block">
                            <div class="promotion_code">
                                <div class="promo-code-applied hide">
                                    <img src="/static/website/img/PromoCode-icon.4c4aa1a0dd8e.svg">
                                    <span id="promo-code-applied"></span>
                                    <a href="#" id="remove-promotion-code" class="trash-icon">
                                        <img src="/static/website/img/cart-remove1x.2d89a8db571c.png" srcset="/static/website/img/cart-remove1x.2d89a8db571c.png,
                                                     /static/website/img/cart-remove2x.13ccd74dddd8.png 2x">
                                    </a>
                                </div>
                              
                            <div class="grandtotal_wrapper">
                                 <div id="final-price" class="grandtotal final">Rp.<?php echo $grand_total + 10000 + $tax; ?>/- <span class="number"></span></div>
                            </div>
                        </div>
                        <div class="promo-info"></div>
        
                        
                        <div class="amount" id="payment-method-layout">
    <h2>Pay With</h2>
    <div class="choices">
        <div class="list">
            <input type="radio" id="gopay" name="method" required>
            <label class="choice" for="gopay">
                <img src="pictures/gopay.png" class="gopay-payment-logo" width="40%" height="40%">
            </label>
        </div>

        <div class="list">
            <input type="radio" id="dana" name="method" required>
            <label class="choice" for="dana">
                <img src="pictures/dana.png" class="dana-payment-logo" width="40%" height="40%">
            </label>
        </div>

        <div class="list">
            <input type="radio" id="ovo" name="method" required>
            <label class="choice" for="ovo">
                <img src="pictures/ovo.png" class="ovo-payment-logo" width="40%" height="40%">
            </label>
        </div>

        <div class="list"> 
            <input type="radio" id="bca" name="method" required>
            <label class="choice" for="bca">
                <img src="pictures/bca.png" class="bca-payment-logo" width="40%" height="40%">
            </label>
        </div>
    </div>
</div>

<button type="submit" class="button button-submit order">
    Place My Order
</button>
                </div>
                        
                        </form>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="modal modal-coupon modal-coupon-index" id="modal-coupons">
                    <div class="modal-content">
                        <button class="modal-close">
                            <img src="/static/website/img/x-close-2x.a83e0b2ad3aa.png">
                        </button>
                        <h1 class="header">Use Coupon or Promo Code</h1>
                        <input id="promotion-code" type="text" placeholder="Masukkan Kode Promo" class="code-input">
                        
                        <div class="coupons">
                            
                        </div>
                    </div>
                </div>
               