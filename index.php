<?php
require_once "model/stockData.php";
require_once "controller/inbound.php";
require_once "view/stockTable.php";

echo "Belajar OOP";
echo "<br>";
echo "di project ini, saya akan mempelajari OOP PHP agar bisa memahami konsep programming menggunakan metode OOP. targetnya adalah nanti saya bisa membuat aplikasi CRUD sederhana ke database. bentuknya adalah aplikasi pencatatan stok gudang yang memiliki sistem login. jadi nanti akan ada 3 tabel, tabel stok, tabel transaksi in dan out, dan user.";
echo "<br>";
echo "<hr>";

$barang1 = new Stock();
$barang1->kode_barang = 1;
$barang1->nama_barang = "buku";
$barang1->jumlah = 10;

$barang2 = new Stock();
$barang2->kode_barang = 2;
$barang2->nama_barang = "pensil";
$barang2->jumlah = 15;

$barang1->tampilkanInfo();
$barang2->tampilkanInfo();