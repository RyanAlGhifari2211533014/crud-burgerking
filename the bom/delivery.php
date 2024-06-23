<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delivery</title>
    <link rel="stylesheet" href="sdelivery.css">
    <link href="https://fonts.googleapis.com/css2?family=Flame+Sans&display=swap" rel="stylesheet">
<div class="kla"> <?php
    include 'navbar.php';
    ?></div> 
</head>

<body>
    <div  class="rute">
        div.s
        <span>Cart</span>
        <span>Delivery</span>
        <span>Payment</span>
    </div>
    
    <div class="kkla">
        <form class="kkkla" method="POST" action="delivconnect.php">
            <div class="left">
                <h2>GUEST DETAILS</h2>
                <div class="left1">
                    <input type="text" name="fullname" placeholder="Full Name" required id="id_name">
                </div>
                <div class="phone">
                    <input type="text" name="mobilenumber" placeholder="+62 Mobile Number" required id="id_mobile_number">
                </div>
            </div>
            <div class="right">
                <h1>Lokasi Pengantaran</h1>
                <h2>1. Set Lokasi Pengantaran di Peta</h2>
                <p class="note">Pastikan pin lokasi sudah sesuai dengan lokasi pengantaran</p>
                <div class="map-wrapper">
                    <div id="display-map" class="map"></div>
                    <div class="marker">
                        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
                    </div>
                </div>
                <h2>2. Berikan Alamat Lengkap</h2>
                <p class="note">Tambahkan catatan atau acuan jika perlu (contoh: "di sebelah salon")</p>
                <textarea name="alamat" cols="40" rows="4" placeholder="Mohon set lokasi pengantaran di peta sebelum mengisi alamat pengantaran" maxlength="300" required id="id_address"></textarea>
                <input type="hidden" id="id_latitude" name="latitude" value=""/>
                <input type="hidden" id="id_longitude" name="longitude" value=""/>
                <div class="clear"></div>
                <div> <a href="payment.php" class="button">Continue Shoping</a></div>
               
            </div>
        </form>
    </div>
</body>
</html>
