<?php

session_start(); // wajib, untuk bisa akses $_SESSION

if (!isset($_SESSION['user_id'])) {
    header("Location: view/login.php");
    exit;
}

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
$semuaBarang = $barang->getAll();

$semuatransaksi = new Transaksi($conn);
$transaksi = $semuatransaksi->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock dan Transaksi</title>
</head>
<body>
    <button style="position:fixed; right:50%; text-decoration:none"><a href="view/formTransaksi.php" style="color:blue; text-decoration:none" >lakukan transaksi</a></button> <br>
    <button style="position:fixed; right:5%; color:red; text-decoration:none"><a href="controller/logoutController.php" style="color:red; text-decoration:none">Logout</a></button> <br>
    <div style="display: flex; justify-content: space-around">
        <div>
            <h2>data stock</h2>
            <table>
                <thead>
                    <th style="padding: 0 10px;">no</th>
                    <th style="padding: 0 10px;">kode</th>
                    <th style="padding: 0 10px;">nama</th>
                    <th style="padding: 0 10px;">jumlah</th>
                </thead>
                <?php $no=1; foreach($semuaBarang as $s) { ?>
                <tbody>
                    <td style="padding: 0 10px;"><?= $no ?></td>
                    <td style="padding: 0 10px;"><?= $s['kode_barang'] ?></td>
                    <td style="padding: 0 10px;"><?= $s['nama_barang'] ?></td>
                    <td style="padding: 0 10px;"><?= $s['jumlah'] ?></td>
                </tbody>
                <?php $no++; } ?>
            </table>
        </div>
        <div>
            <h2>data transaksi</h2>
            <table>
                <thead>
                    <th style="padding: 0 10px;">No</th>
                    <th style="padding: 0 10px;">Barang</th>
                    <th style="padding: 0 10px;">Tipe</th>
                    <th style="padding: 0 10px;">Jumlah</th>
                    <th style="padding: 0 10px;">Waktu</th>
                    <th style="padding: 0 10px;">ID</th>
                </thead>
                <?php $no=1; foreach($transaksi as $t){ ?>
                <tbody>
                    <td style="padding: 0 10px;"><?= $no ?></td>
                    <td style="padding: 0 10px;"><?= $t['nama_barang'] ?></td>
                    <td style="padding: 0 10px;"><?= $t['tipe'] ?></td>
                    <td style="padding: 0 10px;"><?= $t['jumlah'] ?></td>
                    <td style="padding: 0 10px;"><?= $t['tanggal'] ?></td>
                    <td style="padding: 0 10px;"><?= $t['id_transaksi'] ?></td>
                </tbody>
                <?php $no++; } ?>
            </table>
        </div>
    </div>
</body>
</html>
