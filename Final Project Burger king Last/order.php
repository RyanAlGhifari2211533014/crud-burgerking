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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Burger King - Order Cart</title>
   <link rel="stylesheet" href="css/shoping.css">
</head>
<body>
<div><?php include 'navbar.php'; ?></div>
   
<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="message" onclick="this.remove();">'.$msg.'</div>';
    }
}
?>
<div class="rute">
    <div class="rutecontent">
        <div class="chart1"><strong>Cart</strong></div>
        <div class="chart2"><strong>Delivery Info</strong></div>
        <div class="chart3"><strong>Payment</strong></div>
    </div>
</div>

<div class="container">
<div class="shopping-cart">

   <table>
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>
      <tbody>
      <?php
         $grand_total = 0;
         if ($user_id) {
            $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($cart_query) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                    $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
                    $grand_total += $sub_total;
      ?>
         <tr>
            <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>Rp<?php echo $fetch_cart['price']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form>
            </td>
            <td>Rp<?php echo $sub_total; ?>/-</td>
            <td><a href="order.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
         </tr>
      <?php
                }
            } else {
                echo '<tr><td colspan="6">No items in cart</td></tr>';
            }
         } else {
            if (isset($_SESSION['guest_cart']) && count($_SESSION['guest_cart']) > 0) {
                foreach ($_SESSION['guest_cart'] as $index => $item) {
                    $sub_total = $item['price'] * $item['quantity'];
                    $grand_total += $sub_total;
      ?>
         <tr>
            <td><img src="images/<?php echo $item['image']; ?>" height="100" alt=""></td>
            <td><?php echo $item['name']; ?></td>
            <td>Rp<?php echo $item['price']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $index; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $item['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form>
            </td>
            <td>Rp<?php echo $sub_total; ?>/-</td>
            <td><a href="order.php?remove=<?php echo $index; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
         </tr>
      <?php
                }
            } else {
                echo '<tr><td colspan="6">No items in cart</td></tr>';
            }
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">grand total :</td>
         <td>Rp<?php echo $grand_total; ?>/-</td>
         <td><a href="order.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
      </tr>
   </tbody>
   </table>

   <div class="cart-btn">  
      <a href="index.php" class="btn">Continue Shopping</a>
      <a href="delivery.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Order</a>
       <?php if (!$user_id): ?>
        <a href="login.php" class="btn">Login</a>
    <?php endif; ?>
   </div>

</div>
</div>
</body>
</html>
