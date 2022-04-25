<?php
date_default_timezone_set("Asia/Jakarta");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Sirup_export_".date("Y-m-d-H-i-s").".xls");

?>
<html>

<body>
    <h2>SiRUP Export</h2>
    <h3>Exported at: <?php echo date("Y-m-d-H-i-s")?></h3>
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
                <th>Tanggal Query</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i <= $_POST['count_data']; $i++) : ?>
                <tr>
                    <td><?php echo $_POST["sirup_rup$i"] ?></td>
                    <td><?php echo $_POST["pencarian_sirup_frase$i"] ?></td>
                    <td><?php echo $_POST["sirup_paket$i"] ?></td>
                    <td><?php echo $_POST["sirup_total$i"] ?></td>
                    <td><?php echo $_POST["sirup_jenis_pengadaan$i"] ?></td>
                    <td><?php echo $_POST["sirup_satuan_kerja$i"] ?></td>
                    <td><?php echo $_POST["sirup_volume_pekerjaan$i"] ?></td>
                    <td><?php echo $_POST["sirup_uraian_pekerjaan$i"] ?></td>
                    <td><?php echo $_POST["sirup_spesifikasi_pekerjaan$i"] ?></td>
                    <td><?php echo $_POST["sirup_tgl_create$i"] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</body>

</html>