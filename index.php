<?php
require_once "model/Stock.php";
require_once "controller/inbound.php";
require_once "view/stockTable.php";
require_once "model/Database.php";

$db = new Database();
$conn = $db->getConnection();

echo "Belajar OOP";
echo "<br>";
echo "di project ini, saya akan mempelajari OOP PHP agar bisa memahami konsep programming menggunakan metode OOP. targetnya adalah nanti saya bisa membuat aplikasi CRUD sederhana ke database. bentuknya adalah aplikasi pencatatan stok gudang yang memiliki sistem login. jadi nanti akan ada 3 tabel, tabel stok, tabel transaksi in dan out, dan user.";
echo "<br>";
echo "<hr>";

$barang1 = new Stock($conn);
$barang1->setNamaBarang("kopiah");
$barang1->setJumlah(10);
$barang1->save();

$stock = new Stock($conn);
$semuaBarang = $stock->getAll();

foreach ($semuaBarang as $barang) {
    echo 'Kode :' . $barang['kode_barang'] . '<br>';
    echo 'Nama :' . $barang['nama_barang'] . '<br>';
    echo 'Jumlah :' . $barang['jumlah'] . '<br>';
    echo '<hr>';
}