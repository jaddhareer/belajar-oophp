<?php
require_once "model/Stock.php";
require_once "controller/inbound.php";
require_once "view/stockTable.php";
require_once "model/Database.php";

$db = new Database();
$conn = $db->getConnection();

if ($conn) {
    echo "Koneksi Berhasil!";
}

echo "Belajar OOP";
echo "<br>";
echo "di project ini, saya akan mempelajari OOP PHP agar bisa memahami konsep programming menggunakan metode OOP. targetnya adalah nanti saya bisa membuat aplikasi CRUD sederhana ke database. bentuknya adalah aplikasi pencatatan stok gudang yang memiliki sistem login. jadi nanti akan ada 3 tabel, tabel stok, tabel transaksi in dan out, dan user.";
echo "<br>";
echo "<hr>";

$barang1 = new Stock(1, 'buku', 10);
$barang2 = new Stock(2, 'pensil', 10);
$barang3 = new Stock();

$barang1->tampilkanInfo();
echo "Qty :" . $barang1->getJumlah() . "<br>";

$barang2->tampilkanInfo();
$barang2->tambahJumlah(-15);
echo "Qty :" . $barang2->getJumlah() . "<br>";

$barang3->tampilkanInfo();
$barang3->setJumlah(14);
$barang3->tambahJumlah(4);
echo "Qty :" . $barang3->getJumlah() . "<br>";