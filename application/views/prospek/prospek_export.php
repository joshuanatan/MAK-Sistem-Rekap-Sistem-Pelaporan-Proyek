<?php
date_default_timezone_set("Asia/Jakarta");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Prospek_export_" . date("Y-m-d-H-i-s") . ".xls");

?>
<html>

<body>
    <h2>MAK Prospek Export</h2>
    <h3>Exported at: <?php echo date("Y-m-d-H-i-s") ?></h3>
    <table border="1">
        <thead>
            <tr>
                <th>PRINCIPLE</th>
                <th>ID PROSPEK</th>
                <th>NAMA BARANG</th>
                <th>UNIT</th>
                <th>TOTAL</th>
                <th>KOMPETITOR</th>
                <th>SIRUP</th>
                <th>ID PAKET/PO</th>
                <th>FUNNEL</th>
                <th>EST LELANG</th>
                <th>LAST UPDATE</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($data); $i++) : ?>
                <tr valign=TOP>
                    <td><?php echo $data[$i]["prospek_principle"] ?></td>
                    <td><?php echo $data[$i]['prospek_kode']?></td> 
                    <td>
                        <?php for($j = 0; $j < count($produk[$i]); $j++):?>
                            <?php if($produk[$i][$j]['id_fk_prospek'] == $data[$i]['id_pk_prospek']):?>
                                <?php echo $produk[$i][$j]['nama_produk']?> <br>
                            <?php endif;?>
                        <?php endfor;?>
                    </td>
                    <td>
                        <?php for($j = 0; $j < count($produk[$i]); $j++):?>
                            <?php if($produk[$i][$j]['id_fk_prospek'] == $data[$i]['id_pk_prospek']):?>
                                <?php echo $produk[$i][$j]['detail_prospek_quantity']?><br>
                            <?php endif;?>
                        <?php endfor;?>
                    </td>
                    <td align="right"><?php echo number_format($data[$i]["total_price_prospek"]) ?></td>
                    <td><?php echo $data[$i]["notes_kompetitor"] ?></td>
                    <td><?php echo $data[$i]["no_sirup"] ?></td>
                    <td><?php echo $data[$i]["no_ekatalog"] ?></td>
                    <td><?php echo $data[$i]["funnel"] ?></td>
                    <td><?php echo $data[$i]["estimasi_pembelian"] ?></td>
                    <td><?php echo $data[$i]["user_username"] ?></td>
                    <td><?php echo $data[$i]["notes_prospek"] ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</body>

</html>