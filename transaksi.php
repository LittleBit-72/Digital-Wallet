<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit;
}

// Fungsi tambah data
if (isset($_POST['add'])) {
    $id_user = $_POST['id_user'];
    $id_transaksi = $_POST['id_transaksi'];
    $penerima = $_POST['penerima'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $tanggal_bayar = $_POST['tanggal_bayar'];

    $sql = "INSERT INTO tb_pembayaran (id_user, id_transaksi, penerima, jumlah_bayar, tanggal_bayar) 
            VALUES ('$id_user', '$id_transaksi', '$penerima', '$jumlah_bayar', '$tanggal_bayar')";
    $conn->query($sql);
}

// Fungsi edit data
if (isset($_POST['edit'])) {
    $id_pembayaran = $_POST['id_pembayaran'];
    $id_user = $_POST['id_user'];
    $id_transaksi = $_POST['id_transaksi'];
    $penerima = $_POST['penerima'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $tanggal_bayar = $_POST['tanggal_bayar'];

    $sql = "UPDATE tb_pembayaran 
            SET id_user='$id_user', id_transaksi='$id_transaksi', penerima='$penerima', jumlah_bayar='$jumlah_bayar', tanggal_bayar='$tanggal_bayar'
            WHERE id_pembayaran='$id_pembayaran'";
    $conn->query($sql);
}

// Fungsi hapus data
if (isset($_GET['delete'])) {
    $id_pembayaran = $_GET['delete'];
    $sql = "DELETE FROM tb_pembayaran WHERE id_pembayaran='$id_pembayaran'";
    $conn->query($sql);
}

// Ambil semua data untuk ditampilkan di tabel
$result = $conn->query("SELECT * FROM tb_pembayaran");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pembayaran</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin: 20px 0; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>Kelola Pembayaran</h1>

    <!-- Form Tambah/Edit -->
    <form method="post" action="">
        <input type="hidden" name="id_pembayaran" id="id_pembayaran">
        <label>ID User:</label>
        <input type="text" name="id_user" id="id_user" required>
        <label>ID Transaksi:</label>
        <input type="text" name="id_transaksi" id="id_transaksi" required>
        <label>Penerima:</label>
        <input type="text" name="penerima" id="penerima" required>
        <label>Jumlah Bayar:</label>
        <input type="number" name="jumlah_bayar" id="jumlah_bayar" required>
        <label>Tanggal Bayar:</label>
        <input type="date" name="tanggal_bayar" id="tanggal_bayar" required>
        <button type="submit" name="add">Tambah</button>
        <button type="submit" name="edit">Simpan Perubahan</button>
    </form>

    <!-- Tabel Data -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID User</th>
                <th>ID Transaksi</th>
                <th>Penerima</th>
                <th>Jumlah Bayar</th>
                <th>Tanggal Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_pembayaran'] ?></td>
                    <td><?= $row['id_user'] ?></td>
                    <td><?= $row['id_transaksi'] ?></td>
                    <td><?= $row['penerima'] ?></td>
                    <td><?= $row['jumlah_bayar'] ?></td>
                    <td><?= $row['tanggal_bayar'] ?></td>
                    <td>
                        <button onclick="editData(<?= htmlspecialchars(json_encode($row)) ?>)">Edit</button>
                        <a href="?delete=<?= $row['id_pembayaran'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
        function editData(data) {
            document.getElementById('id_pembayaran').value = data.id_pembayaran;
            document.getElementById('id_user').value = data.id_user;
            document.getElementById('id_transaksi').value = data.id_transaksi;
            document.getElementById('penerima').value = data.penerima;
            document.getElementById('jumlah_bayar').value = data.jumlah_bayar;
            document.getElementById('tanggal_bayar').value = data.tanggal_bayar;
        }
    </script>
</body>
</html>
