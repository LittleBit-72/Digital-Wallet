<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_digitalwallet";

// Koneksi ke database
$conn = new mysqli($hostname, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>