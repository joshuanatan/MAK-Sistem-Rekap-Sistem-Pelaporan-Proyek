<?php
date_default_timezone_set("Asia/Jakarta");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Sirup_export_" . date("Y-m-d-H-i-s") . ".xls");

?>
<html>

<body>
    <h2>SiRUP Export</h2>
    <h3>Exported at: <?php echo date("Y-m-d-H-i-s") ?></h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID Sirup</th>
                <th>Keyword</th>
                <th>Paket</th>
                <th>Pagu</th>
                <th>Jenis Pekerjaan</th>
                <th>Satuan Kerja</th>
                <th>Volume Pekerjaan</th>
                <th>Uraian Pekerjaan</th>
                <th>Spesifikasi Pekerjaan</th>
                <th>KLPD</th>
                <th>Tahun Anggaran</th>
                <th>Produk Dalam Negri</th>
                <th>Usaha Kecil</th>
                <th>Aspek Ekonomi</th>
                <th>Aspek Sosial</th>
                <th>Aspek Lingkungan</th>
                <th>Pra DIPA</th>
                <th>Metode Pemilihan</th>
                <th>Jadwal Pemilihan</th>
                <th>Histori Paket</th>
                <th>Tanggal Perbarui Paket</th>
                <th>Status</th>
                <th>Tanggal Query</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($data); $i++) : ?>
                <tr>
                    <td><?php echo $data[$i]['sirup_rup'] ?></td>
                    <td><?php echo $data[$i]['pencarian_sirup_frase'] ?></td>
                    <td><?php echo $data[$i]['sirup_paket'] ?></td>
                    <td><?php echo $data[$i]['sirup_total'] ?></td>
                    <td><?php echo $data[$i]["sirup_jenis_pengadaan"] ?></td>
                    <td><?php echo $data[$i]["sirup_satuan_kerja"] ?></td>
                    <td><?php echo $data[$i]["sirup_volume_pekerjaan"] ?></td>
                    <td><?php echo $data[$i]["sirup_uraian_pekerjaan"] ?></td>
                    <td><?php echo $data[$i]["sirup_spesifikasi_pekerjaan"] ?></td>
                    <td><?php echo $data[$i]["sirup_klpd"] ?></td>
                    <td><?php echo $data[$i]["sirup_tahun_anggaran"] ?></td>
                    <td><?php echo $data[$i]["sirup_produk_dalam_negri"] ?></td>
                    <td><?php echo $data[$i]["sirup_usaha_kecil"] ?></td>
                    <td><?php echo $data[$i]["sirup_aspek_ekonomi"] ?></td>
                    <td><?php echo $data[$i]["sirup_aspek_sosial"] ?></td>
                    <td><?php echo $data[$i]["sirup_aspek_lingkungan"] ?></td>
                    <td><?php echo $data[$i]["sirup_pra_dipa"] ?></td>
                    <td><?php echo $data[$i]["sirup_metode_pemilihan"] ?></td>
                    <td><?php echo $data[$i]["sirup_jadwal_pemilihan"] ?></td>
                    <td><?php echo $data[$i]["sirup_histori_paket"] ?></td>
                    <td><?php echo $data[$i]["sirup_tgl_perbarui_paket"] ?></td>
                    <td><?php echo $data[$i]["sirup_status"] ?></td>
                    <td><?php echo $data[$i]["sirup_tgl_create"] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</body>

</html>