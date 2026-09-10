<?php

session_start(); // wajib, untuk bisa akses $_SESSION

if (!isset($_SESSION['user_id'])) {
    header("Location: view/login.php");
    exit;
}

require_once "model/Database.php";
require_once "model/Stock.php";
require_once "model/Transaksi.php";
require_once "model/TransaksiIn.php";
require_once "model/TransaksiOut.php";

$db = new Database();
$conn = $db->getConnection();

echo "Belajar OOP";
echo "<br>";
echo "di project ini, saya akan mempelajari OOP PHP agar bisa memahami konsep programming menggunakan metode OOP. targetnya adalah nanti saya bisa membuat aplikasi CRUD sederhana ke database. bentuknya adalah aplikasi pencatatan stok gudang yang memiliki sistem login. jadi nanti akan ada 3 tabel, tabel stok, tabel transaksi in dan out, dan user.";
echo "<br>";
echo "<hr>";

// object stock
$barang = new Stock($conn);
$semuaBarang = $barang->getAll();

// object transaksi
$semuatransaksi = new Transaksi($conn);
$transaksi = $semuatransaksi->getAll();

require_once 'view/dashboard.php'
?>