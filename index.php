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

$delete = new Stock($conn);
$delete->setKodeBarang(4);
$delete->setNamaBarang('kain kafan');
$delete->setJumlah(12);
$delete->update();

$semuaBarang = $delete->getAll();

foreach ($semuaBarang as $barang) {
    echo 'Kode :' . $barang['kode_barang'] . '<br>';
    echo 'Nama :' . $barang['nama_barang'] . '<br>';
    echo 'Jumlah :' . $barang['jumlah'] . '<br>';
    echo '<hr>';
}