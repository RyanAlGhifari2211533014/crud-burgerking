<?php
include 'config.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = null;
}
?>

<?php
class MenuItem {
    public $name;
    public $description;
    public $price;

    public function __construct($name, $description, $price = 0) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}

class Menu {
    public $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function displayMenu() {
        echo "<h2>Pilih Paket (Minimum order 10 pax/Paket)</h2>";
        foreach ($this->items as $item) {
            echo "<div class='menu-item'>";
            echo "<span class='menu-name'>{$item->name}</span>";
            echo "<input type='number' name='quantity_" . htmlspecialchars($item->name, ENT_QUOTES) . "' min='0' class='menu-quantity' placeholder='Jumlah'>";
            echo "</div>";
        }
    }
}

$menu = new Menu();
$menu->addItem(new MenuItem('Cheeseburger + Fries + Coke', '', 0));
$menu->addItem(new MenuItem('Cheese Whopper Jr. + Fries + Coke', '', 0));
$menu->addItem(new MenuItem('2pcs Ayam Crispy/Spicy/Mix + Nasi + Sambal Terasi', '', 0));
$menu->addItem(new MenuItem('2pcs Ayam Crispy/Spicy/Mix + Nasi + Kremes + Sambal Terasi', '', 0));
$menu->addItem(new MenuItem('2pcs Ayam Kremes Sambal Terasi + Nasi + Mineral Water', '', 0));
$menu->addItem(new MenuItem('1pcs Ayam Kremes Sambal Terasi + Nasi + Mineral Water', '', 0));

// Add-ons
$menu->addItem(new MenuItem('Chicken Burger', 'Add On', 0));
$menu->addItem(new MenuItem('Beef Burger', 'Add On', 0));
$menu->addItem(new MenuItem('1pc Ayam', 'Add On', 0));
$menu->addItem(new MenuItem('Kurma Sundae', 'Add On', 0));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Burger King</title>
    <link rel="stylesheet" href="elo.css">

</head>
<?php include 'navbar.php'; ?></div>
<body style="background: url('latar.jpg') no-repeat center center fixed; background-size: cover;">
    
    <main>
        <div class="main-container">
            <div class="menu-section">
                <h1>Ramein Acaramu Bareng BK!</h1>
                <form action="" method="post">
                    <?php
                    // Ensure the $menu variable is defined
                    if (isset($menu)) {
                        $menu->displayMenu();
                    } else {
                        echo "<p>Menu is not available.</p>";
                    }
                    ?>
                    <input type="submit" value="Order">
                </form>
            </div>
            <div class="contact-section">
                <div class="contact-info">
                    <h2>Contact Us</h2>
                    <p>Kamu juga bisa hubungi kami di:</p>
                    <p>Email: guestservice@burgerking.co.id</p>
                    <p>Telepon: 15000 25</p>
                    <p>Harga sebelum 10% PB1. TM & C 2023 Burger King Company LLC. Used under license. All rights reserved.</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Burger King Corporation. Used Under License. All rights reserved.</p>
    </footer>
</body>
</html>
