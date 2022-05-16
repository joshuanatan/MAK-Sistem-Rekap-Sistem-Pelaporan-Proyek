<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta") ?>
  <title>MAK-CRM | Prospek</title>
  <?php $this->load->view("includes/core-head") ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/fonts/font-awesome/font-awesome.css">

  <style>
    .scroll-provinsi-table-wrapper {
      overflow-y: scroll;
      height: 400px;
    }
  </style>
</head>

<body class="animsition site-navbar-small">
  <?php $this->load->view("includes/navbar") ?>
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Prospek</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome/home">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Prospek">Prospek</a></li>
        <li class="breadcrumb-item active">Detail Prospek</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body">
          <h3>Detail Prospek</h3>
          <br>
          <table class="table table-hover table-striped w-full">
            <tr>
              <td style="border:none;">Kode Prospek</td>
              <td style="border:none;"><?php echo $detailprospek[0]["prospek_kode"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Provinsi</td>
              <td style="border:none;"><?php echo $detailprospek[0]["nama_provinsi"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Kabupaten</td>
              <td style="border:none;"><?php echo $detailprospek[0]["nama_kabupaten"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Nama Rumah Sakit</td>
              <td style="border:none;"><?php echo $detailprospek[0]["nama_rs"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Prospek Principle</td>
              <td style="border:none;"><?php echo $detailprospek[0]["prospek_principle"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Total Price Prospek</td>
              <td style="border:none;">Rp. <?php echo number_format($detailprospek[0]["total_price_prospek"], 0, ",", "."); ?></td>
            </tr>
            <tr>
              <td style="border:none;">Notes Kompetitor</td>
              <td style="border:none;"><?php echo $detailprospek[0]["notes_kompetitor"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Notes Prospek</td>
              <td style="border:none;"><?php echo $detailprospek[0]["notes_prospek"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">No Faktur</td>
              <td style="border:none;"><?php echo $detailprospek[0]["no_faktur"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">No Ekatalog</td>
              <td style="border:none;"><?php echo $detailprospek[0]["no_ekatalog"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Sumber Dana</td>
              <td style="border:none;"><?php echo $detailprospek[0]["sumber_dana"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Jenis Pengadaan</td>
              <td style="border:none;"><?php echo $detailprospek[0]["jenis_pengadaan"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Rating</td>
              <td style="border:none;"><?php
                                        switch ($detailprospek[0]["rating"]) {
                                          case "0":
                                            echo "[0] - Lose kompetitor";
                                            break;
                                          case "0,05":
                                            echo "[0,05] - Pindah anggaran";
                                            break;
                                          case "0,1":
                                            echo "[0,1] - Mapping";
                                            break;
                                          case "0,2":
                                            echo "[0,2] - Done SPH//Inhar";
                                            break;
                                          case "0,3":
                                            echo "[0,3] - Done detailing/presentasi/demo/FV";
                                            break;
                                          case "0,4":
                                            echo "[0,4] - Spesifikasi Produk & pagu angaran di ACC";
                                            break;
                                          case "0,5":
                                            echo "[0,5] - Proses Klik E Catalog/PL/Negosiasi Harga (Swasta)";
                                            break;
                                          case "0,6":
                                            echo "[0,6] - Sudah ada ID Paket/Sudah PO";
                                            break;
                                          case "0,7":
                                            echo "[0,7] - Proses kontrak/SPK/Sudah Pembayaran DP";
                                            break;
                                          case "0,8":
                                            echo "[0,8] - Barang sudah terkirim";
                                            break;
                                          case "0,9":
                                            echo "[0,9] - Barang sudah diterima";
                                            break;
                                          case "1":
                                            echo "[1] - Faktur/Pembayaran Lunas";
                                            break;
                                          default:
                                            echo "-";
                                        } ?></td>
            </tr>
            <tr>
              <td style="border:none;">Funnel</td>
              <td style="border:none;"><?php echo $detailprospek[0]["funnel"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Funnel Percentage</td>
              <td style="border:none;"><?php echo $detailprospek[0]["funnel_percentage"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Estimasi Pembelian</td>
              <td style="border:none;"><?php echo $detailprospek[0]["estimasi_pembelian"]; ?></td>
            </tr>
            <tr>
              <td style="border:none;">Note Loss</td>
              <td style="border:none;"><?php echo $detailprospek[0]["note_loss"]; ?></td>
            </tr>
          </table>
          <h3>Detail Produk</h3>
          <br>
          <table class="table table-hover table-striped w-full">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Harga Price List</th>
                <th>Diskon (%)</th>
                <th>Quantity</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($a = 0; $a < count($dataprospekproduk); $a++) : ?>
                <tr>
                  <td><?php echo $dataprospekproduk[$a]["nama_produk"] ?></td>
                  <!-- <td>
                      <table style="width:100%; border:none;">
                        <tr>
                          <td style="border:none;">Price List</td> -->
                  <td style="border:none; text-align:right;">Rp. <?php echo number_format($dataprospekproduk[$a]["produk_price_list"], 0, ",", "."); ?></td>
                  <!-- </tr>
                        <tr>
                          <td style="border:none;">Harga Ekatalog</td>
                          <td style="border:none; text-align:right;">Rp. <?php echo number_format($dataprospekproduk[$a]["produk_harga_ekat"], 0, ",", "."); ?></td>
                        </tr>
                      </table>
                    </td> -->
                  <td style="border:none; text-align:right;"><?php echo number_format($dataprospekproduk[$a]["prospek_produk_price"], 0, ",", "."); ?></td>
                  <td style="border:none; text-align:right;"><?php echo number_format($dataprospekproduk[$a]["detail_prospek_quantity"], 0, ",", "."); ?></td>
                  <td><?php echo $dataprospekproduk[$a]["detail_prospek_keterangan"]; ?></td>
                </tr>
              <?php endfor; ?>
            </tbody>
          </table>
          <a href="<?php echo base_url(); ?>prospek" class="btn btn-default">Back</a>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view("includes/footer") ?>
  <?php $this->load->view("includes/core-script") ?>
  <script src="<?php echo base_url(); ?>global/vendor/asrange/jquery-asRange.min.js"></script>
  <script src="<?php echo base_url(); ?>global/vendor/bootbox/bootbox.js"></script>
</body>

</html>