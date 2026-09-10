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