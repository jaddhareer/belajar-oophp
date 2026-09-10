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