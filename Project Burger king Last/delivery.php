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
    <title>Delivery</title>
    <link rel="stylesheet" href="sdelivery.css">
    <link href="https://fonts.googleapis.com/css2?family=Flame+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        /* CSS untuk tombol "Back" */
        .button-back {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #ccc;
            color: #333;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-back:hover {
            background-color: #999;
        }

        /* CSS untuk jarak antara tombol-tombol */
        .kkkla > .right > .clear {
            margin-top: 2%;
        }

        /* CSS untuk input pencarian */
        .search-container {
            margin-bottom: 10px;
        }

        .search-input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
        }

        .search-button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="kla"> 
        <?php include 'navbar.php'; ?>
    </div> 

    <div class="kkla">
        <form class="kkkla" method="POST" action="payment.php" onsubmit="return validateForm()">
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
                <div class="search-container">
                    <input type="text" id="search-input" class="search-input" placeholder="Cari nama lokasi">
                    <button type="button" onclick="searchLocation()" class="search-button">Cari</button>
                </div>
                <div class="map-wrapper" style="height: 400px; width: 100%;">
                    <div id="display-map" class="map" style="height: 100%;"></div>
                </div>
                <h2>2. Berikan Alamat Lengkap</h2>
                <p class="note">Tambahkan catatan atau acuan jika perlu (contoh: "di sebelah salon")</p>
                <textarea name="alamat" cols="40" rows="4" placeholder="Mohon set lokasi pengantaran di peta sebelum mengisi alamat pengantaran" maxlength="300" required id="id_address"></textarea>
                <input type="hidden" id="id_latitude" name="latitude" value=""/>
                <input type="hidden" id="id_longitude" name="longitude" value=""/>
                <div class="clear"></div>
                <div> 
                    <button type="submit" class="button">Continue Payment</button>
                    <a href="order.php" class="button-back">Back</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        var map = L.map('display-map').setView([-0.9516, 100.422], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([-0.9516, 100.422], { draggable: true }).addTo(map);

        marker.on('dragend', function (e) {
            var latLng = marker.getLatLng();
            document.getElementById('id_latitude').value = latLng.lat;
            document.getElementById('id_longitude').value = latLng.lng;

            // Melakukan reverse geocoding untuk mendapatkan nama tempat
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latLng.lat}&lon=${latLng.lng}`)
                .then(response => response.json())
                .then(data => {
                    var address = data.display_name;
                    document.getElementById('id_address').value = address;
                })
                .catch(error => {
                    console.error('Error fetching location:', error);
                });
        });

        function searchLocation() {
            var searchString = document.getElementById('search-input').value;
            if (searchString.trim() === '') {
                alert('Masukkan nama lokasi untuk pencarian.');
                return;
            }

            // Hapus marker yang ada jika sebelumnya sudah ada
            if (marker !== undefined) {
                map.removeLayer(marker);
            }

            // Gunakan Nominatim untuk mencari lokasi berdasarkan nama
            fetch(`https://nominatim.openstreetmap.org/search?q=${searchString}&format=json`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        var lat = data[0].lat;
                        var lon = data[0].lon;

                        // Tampilkan marker baru di lokasi yang ditemukan
                        marker = L.marker([lat, lon], { draggable: true }).addTo(map);
                        map.setView([lat, lon], 15); // Zoom ke lokasi yang ditemukan
                        document.getElementById('id_latitude').value = lat;
                        document.getElementById('id_longitude').value = lon;

                        // Tampilkan alamat lengkap dari lokasi yang ditemukan
                        var address = data[0].display_name;
                        document.getElementById('id_address').value = address;
                    } else {
                        alert('Lokasi tidak ditemukan.');
                    }
                })
                .catch(error => {
                    console.error('Error searching location:', error);
                    alert('Terjadi kesalahan saat mencari lokasi.');
                });
        }

        function validateForm() {
            var mobileNumber = document.getElementById('id_mobile_number').value.trim();
            if (mobileNumber === '') {
                alert('Mohon isi nomor telepon terlebih dahulu.');
                return false; // Menghentikan form submit jika nomor telepon kosong
            }
            return true; // Lanjutkan form submit jika nomor telepon terisi
        }
    </script>
</body>
</html>
