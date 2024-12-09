<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    // Jika belum login, redirect ke login.php
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Digital Wallet</title>
    <link rel="stylesheet" href="css/home-style.css"> <!-- CSS khusus untuk halaman home -->
</head>
<body>

    <div class="navbar" id="navbar">
        <button id="hideBtn" onclick="toggleNav()">Hide</button>
        <a href="home.php">Home</a>
        <a href="transaksi.php">Transactions</a>
        <a href="#">Wallet</a>
        <a href="#">Support</a>
        <a href="#">Apps</a>
    </div>
        
    <!-- Sambutan -->
    <div class="content">
        <h1>Welcome to Digital Wallet, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <p>Manage your transactions seamlessly.</p>
        <a href="logout.php" class="logout-btn">Click to logout</a>
    </div>

    <script src="js/wallet.js"></script>

</body>
</html>
