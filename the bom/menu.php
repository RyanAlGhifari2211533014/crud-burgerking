<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];


if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};
if(isset($_POST['order'])){
    header('location:order.php');
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];
$product_quantity = $_POST['product_quantity'];

$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

if(mysqli_num_rows($select_cart) > 0){
   $message[] = 'product already added to cart!';
}else{
   mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
   $message[] = 'product added to cart!';
}

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="css/shoping.css"> 
</head>
<body>
<div class="container">
    <div class="products">

<div class="box-container">

<?php
   $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
   if(mysqli_num_rows($select_product) > 0){
      while($fetch_product = mysqli_fetch_assoc($select_product)){
?>
   <form method="post" class="box" action="">
     <div><img class="mimg" src="images/<?php echo $fetch_product['image']; ?>" alt=""></div> 
      <div class="name"><?php echo $fetch_product['name']; ?></div>
      <div class="price">Rp<?php echo $fetch_product['price']; ?>/-</div>
      <input class="fnumber" type="number" min="1" name="product_quantity" value="1">
      <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
      <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
      <input type="submit" value="order" name="order" class="btn">
   </form>
<?php
   };
};
?>
</div>
</div>
</div>
</body>
</html>
