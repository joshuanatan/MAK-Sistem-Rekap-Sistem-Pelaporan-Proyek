<?php
date_default_timezone_set("Asia/Jakarta");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Ekatalog_export_" . date("Y-m-d-H-i-s") . ".xls");

?>
<html>

<body>
    <h2>Ekatalog Export</h2>
    <h3>Exported at: <?php echo date("Y-m-d-H-i-s") ?></h3>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Paket</th>
                <th>ID Paket</th>
                <th>ID Sirup</th>
                <th>Instansi</th>
                <th>Satuan Kerja</th>
                <th>NPWP Satuan Kerja</th>
                <th>Alamat Satuan Kerja</th>
                <th>Alamat Pengiriman</th>
                <th>Tahun Anggaran</th>
                <th>Total Produk</th>
                <th>Total Harga</th>
                <th>Status Paket</th>
                <th>Tanggal Buat Ekatalog</th>
                <th>Tanggal Perubahan</th>
                <th>Nama Produk</th>
                <th>Kuantitas</th>
                <th>Mata Uang</th>
                <th>Harga Satuan</th>
                <th>Ongkos Kirim</th>
                <th>Total Harga Produk</th>
                <th>Catatan Produk</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($data); $i++) : ?>
                <tr>
                    <td><?php echo $data[$i]["ekatalog_komoditas"];?></td>
                    <td><?php echo $data[$i]["ekatalog_id_paket"];?></td>
                    <td><?php echo $data[$i]["ekatalog_id_sirup"];?></td>
                    <td><?php echo $data[$i]["ekatalog_instansi"];?></td>
                    <td><?php echo $data[$i]["ekatalog_satuan_kerja"];?></td>
                    <td><?php echo $data[$i]["ekatalog_npwp_satuan_kerja"];?></td>
                    <td><?php echo $data[$i]["ekatalog_alamat_satuan_kerja"];?></td>
                    <td><?php echo $data[$i]["ekatalog_alamat_pengiriman"];?></td>
                    <td><?php echo $data[$i]["ekatalog_tahun_anggaran"];?></td>
                    <td><?php echo $data[$i]["ekatalog_total_produk"];?></td>
                    <td><?php echo $data[$i]["ekatalog_total_harga"];?></td>
                    <td><?php echo $data[$i]["ekatalog_status_paket"];?></td>
                    <td><?php echo $data[$i]["ekatalog_tgl_buat_online"];?></td>
                    <td><?php echo $data[$i]["ekatalog_tgl_ubah_online"];?></td>
                    <td><?php echo $data[$i]["ekatalog_produk_nama_produk"];?></td>
                    <td><?php echo $data[$i]["ekatalog_produk_kuantitas"];?></td>
                    <td><?php echo $data[$i]["ekatalog_produk_mata_uang"];?></td>
                    <td><?php echo $data[$i]["ekatalog_produk_harga_satuan"];?></td>
                    <td><?php echo $data[$i]["ekatalog_produk_perkiraan_ongkos_kirim"];?></td>
                    <td><?php echo $data[$i]["ekatalog_produk_total_harga"];?></td>
                    <td><?php echo $data[$i]["ekatalog_produk_catatan"];?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</body>

</html>