<?php
require_once "model/stockData.php";
require_once "controller/inbound.php";
require_once "view/stockTable.php";

echo "Belajar OOP";
echo "<br>";
echo "di project ini, saya akan mempelajari OOP PHP agar bisa memahami konsep programming menggunakan metode OOP. targetnya adalah nanti saya bisa membuat aplikasi CRUD sederhana ke database. bentuknya adalah aplikasi pencatatan stok gudang yang memiliki sistem login. jadi nanti akan ada 3 tabel, tabel stok, tabel transaksi in dan out, dan user.";
echo "<br>";
echo "<hr>";

$barang1 = new Stock(1, 'buku', 10);
$barang2 = new Stock(2, 'pensil', 10);

$barang1->tampilkanInfo();
echo $barang1->getJumlah() . "<br>";
$barang2->tampilkanInfo();