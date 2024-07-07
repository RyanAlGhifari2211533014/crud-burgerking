<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$message = '';

if (isset($_POST['rename'])) {
    $new_name = mysqli_real_escape_string($conn, $_POST['new_name']);
    $update_query = "UPDATE `user_form` SET name = '$new_name' WHERE id = '$user_id'";
    
    if (mysqli_query($conn, $update_query)) {
        $message = "Username updated successfully!";
    } else {
        $message = "Failed to update username.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger King - Profile</title>
    <link rel="stylesheet" href="css/shoping.css">
</head>
<body>
<?php
if (!empty($message)) {
    echo '<div class="message" onclick="this.remove();">' . htmlspecialchars($message) . '</div>';
}
?>
<div class="container">
    <div class="user-profile">
        <?php
        $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select_user) > 0) {
            $fetch_user = mysqli_fetch_assoc($select_user);
        }
        ?>
        <p>Username: <span><?php echo htmlspecialchars($fetch_user['name']); ?></span></p>
        <p>Email: <span><?php echo htmlspecialchars($fetch_user['email']); ?></span></p>

        <div class="flex">
            <a href="index.php" class="option-btn">Home</a>
            <a href="login.php" class="btn">Login</a>
            <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are you sure you want to logout?');" class="delete-btn">Logout</a>
        </div>

        <!-- Rename form -->
        <form action="" method="post" class="rename-form">
            <input type="text" name="new_name" placeholder="Enter new username" required>
            <input type="submit" name="rename" value="Rename" class="btn">
        </form>
    </div>
</div>
</body>
</html>
