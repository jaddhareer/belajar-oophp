<?php

require_once "../model/Database.php";
require_once "../model/Stock.php";
require_once "../model/Transaksi.php";
require_once "../model/TransaksiIn.php";
require_once "../model/TransaksiOut.php";

$db = new Database();
$conn = $db->getConnection();

$nama_barang = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];
$tipe = $_POST['tipe'];

$stock = new Stock($conn);
$barangDitemukan = $stock->findByNama($nama_barang);

if ($barangDitemukan) {
    // barang sudah ada, ambil kode_barang yang sudah ada
    $kode_barang = $barangDitemukan['kode_barang'];
} else {
    if ($tipe === "out") {
        // tidak masuk akal: barang belum pernah ada, tapi mau dikeluarkan
        echo "Barang belum terdaftar, tidak bisa transaksi keluar.<br>";
        exit; // hentikan eksekusi, jangan lanjut
    }
    // barang baru, daftarkan dulu ke tabel stock
    $stock->setNamaBarang($nama_barang);
    $stock->setJumlah(0); // stok awal 0, nanti ditambah lewat TransaksiIn
    $kode_barang = $stock->save(); // dapat kode_barang baru dari lastInsertId()
}

// sekarang proses transaksinya, pakai polymorphism dari Modul 5
if ($tipe === "in") {
    $transaksi = new TransaksiIn($conn);
} else {
    $transaksi = new TransaksiOut($conn);
}

$transaksi->setKodeBarang($kode_barang);
$transaksi->setJumlah($jumlah);
$transaksi->save();
$transaksi->proses($stock);

header("Location: ../index.php"); // PRG pattern: redirect setelah POST
exit;