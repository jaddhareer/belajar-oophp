<?php
require_once "controller/inbound.php";
require_once "view/stockTable.php";
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

$barang = new Stock($conn);

// $in = new TransaksiIn($conn);
// $in->setKodeBarang(5);
// $in->setJumlah(1);
// $in->save();
// $in->proses($barang);

$Out = new TransaksiOut($conn);
$Out->setKodeBarang(5);
$Out->setJumlah(4);
$Out->save();
$Out->proses($barang);

$semuaBarang = $barang->getAll();

foreach ($semuaBarang as $barang) {
    echo 'Kode :' . $barang['kode_barang'] . '<br>';
    echo 'Nama :' . $barang['nama_barang'] . '<br>';
    echo 'Jumlah :' . $barang['jumlah'] . '<br>';
    echo '<hr>';
}