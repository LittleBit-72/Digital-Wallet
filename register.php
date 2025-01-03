<!-- register.html -->
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Mengatur karakter set yang digunakan -->
    <meta charset="UTF-8">
    <!-- Kompatibilitas dengan Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mengatur viewport untuk responsivitas di perangkat mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul halaman yang tampil di tab browser -->
    <title>Register - Digital Wallet</title>
    <!-- Link ke file CSS eksternal -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Container utama yang menampung seluruh konten halaman -->
    <div class="container">
        <!-- Judul halaman Register -->
        <h1>Register</h1>
        
        <!-- Formulir untuk proses pendaftaran -->
        <form action="#" method="POST">
            <!-- Input untuk nama lengkap pengguna -->
            <input type="text" placeholder="Username" required>
            
            <!-- Input untuk email pengguna -->
            <input type="email" placeholder="Email" required>
            
            <!-- Input untuk password pengguna -->
            <input type="password" placeholder="Password" required>
            
            <!-- Tombol untuk submit form -->
            <button type="submit">Daftar</button>
        </form>
        
        <!-- Link untuk mengarahkan pengguna yang sudah memiliki akun ke halaman Login -->
        <a href="login.php">Sudah punya akun? Login di sini</a>
    </div>
</body>
</html>
