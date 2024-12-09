<?php
session_start();
// Contoh hardcoded username dan password (gunakan database di implementasi nyata)
$valid_username = "agung";
$valid_password = "admin1234";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        // Login sukses
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['username'] = $username;

        // Redirect ke halaman home
        header("Location: home.php");
        exit;
    } else {
        // Login gagal
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Digital Wallet</title>
    <!-- Menghubungkan dengan file CSS eksternal -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <h2>Login</h2>

        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <!-- Form login -->
        <form id="loginForm" action="login.php" method="POST">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit" class="login-btn">Login</button>
        </form>

        <!-- Link ke halaman register -->
        <p>Belum memiliki akun? <a href="register.php">Daftar di sini</a></p>
    </div>

    <!-- Toast Notif -->
    <div id="toast" class="toast">Kamu berhasil login!</div>

    <script>
        // Fungsi untuk menampilkan toast
        function showToast() {
            var toast = document.getElementById("toast");
            toast.className = "toast show"; // Tambahkan kelas 'show' untuk menampilkan toast

            // Setelah 3 detik, sembunyikan toast
            setTimeout(function(){ toast.className = toast.className.replace("show", ""); }, 3000);
        }

        // Cek apakah user sudah login sebelumnya
        // if (sessionStorage.getItem("isLoggedIn") === "true") {
        //     // Jika user sudah login, redirect langsung ke home
        //     window.location.href = "home.php";
        // }

        // Event listener untuk login form submit
        // document.getElementById("loginForm").addEventListener("submit", function(event) {
        //     event.preventDefault(); // Mencegah form di-submit

            // Validasi sederhana
            // var username = document.getElementById("username").value;
            // var password = document.getElementById("password").value;

            // if (username && password) {
            //     // Simpan status login ke sessionStorage
            //     sessionStorage.setItem("isLoggedIn", "true");
            //     sessionStorage.setItem("username", username);

            //     // Tampilkan toast
            //     showToast();

            //     // Redirect ke home.html setelah 3 detik (saat toast menghilang)
            //     setTimeout(function() {
            //         window.location.href = "home.php"; // Pindah ke halaman home.html
            //     }, 3000);
            // }
        });
    </script>

</body>
</html>
