<?php
$server = "localhost"; // Ganti dengan nama atau alamat server database Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda
$database = "sipirang"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = mysqli_connect($server, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
 die("Koneksi database gagal: " . mysqli_connect_error());
}
?>