<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta"); ?>

  <title>MAK-CRM | Home</title>

  <?php $this->load->view("includes/core-head"); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist/chartist.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="animsition site-navbar-small dashboard">
  <?php $this->load->view("includes/navbar"); ?>
  <div class="page">
    <div class="page-content container-fluid">
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        Hi <strong><?php echo $this->session->nama_user; ?></strong>, Selamat datang di MAK - CRM
      </div>

      <hr />

      <div class="page-content container-fluid">
        <div class="row">
          <div class="col-xl-6 col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="card card-block p-25">
                  <div class="counter counter-lg">
                    <div class="font-size-30 counter-label text-uppercase"><b>Total Prospek</b></div>
                    <div class="font-size-20 text-center" style="height:calc(100% - 350px);">

                      <div class="dropdown vertical-align-bottom font-size-20">
                        <select id="prospek_jenis" onchange="total_prospek_filter()" class="btn btn-default dropdown-toggle">
                          <option class="dropdown-item" value="0" role="menuitem">Sendiri</option>
                          <option class="dropdown-item" value="1" role="menuitem">Sendiri dan Supervisee</option>
                        </select>
                      </div>
                      <div class="dropdown vertical-align-bottom font-size-20">
                        <select id="prospek_tahun" onchange="total_prospek_filter()" class="btn btn-default dropdown-toggle">
                          <option class="dropdown-item" value="total" role="menuitem">Total</option>
                          <option class="dropdown-item" value="<?php echo date("Y"); ?>" role="menuitem"><?php echo date("Y"); ?></option>
                          <option class="dropdown-item" value="<?php echo date("Y", strtotime('-1 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-1 year')); ?></option>
                          <option class="dropdown-item" value="<?php echo date("Y", strtotime('-2 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-2 year')); ?></option>
                          <option class="dropdown-item" value="<?php echo date("Y", strtotime('-3 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-3 year')); ?></option>
                        </select>
                      </div>
                    </div>
                    <span id="prospek_price" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="card card-block p-25 bg-blue-600">
                  <div class="counter counter-lg">
                    <div class="font-size-30 counter-label text-uppercase" style="color:white;"><b>Total SiRUP</b></div>
                    <div class="font-size-20 text-center" style="height:calc(100% - 350px);">
                      <div class="dropdown vertical-align-bottom font-size-20">
                        <select id="sirup_funnel" onchange="total_sirup_filter()" class="btn btn-default dropdown-toggle">
                          <option class="dropdown-item" value="0" role="menuitem">Semua Funnel</option>
                          <option class="dropdown-item" value="1" role="menuitem">Sudah Funnel Prospek</option>
                          <option class="dropdown-item" value="2" role="menuitem">Belum Funnel Prospek</option>
                        </select>
                      </div>
                      <div class="dropdown vertical-align-bottom font-size-20">
                        <select id="sirup_jenis" onchange="total_sirup_filter()" class="btn btn-default dropdown-toggle">
                          <option class="dropdown-item" value="0" role="menuitem">Sendiri</option>
                          <option class="dropdown-item" value="1" role="menuitem">Sendiri dan Supervisee</option>
                        </select>
                      </div>
                      <div class="dropdown vertical-align-bottom font-size-20">
                        <select id="sirup_tahun" onchange="total_sirup_filter()" class="btn btn-default dropdown-toggle">
                          <option class="dropdown-item" value="total" role="menuitem">Total</option>
                          <option class="dropdown-item" value="<?php echo date("Y"); ?>" role="menuitem"><?php echo date("Y"); ?></option>
                          <option class="dropdown-item" value="<?php echo date("Y", strtotime('-1 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-1 year')); ?></option>
                          <option class="dropdown-item" value="<?php echo date("Y", strtotime('-2 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-2 year')); ?></option>
                          <option class="dropdown-item" value="<?php echo date("Y", strtotime('-3 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-3 year')); ?></option>
                        </select>
                      </div>
                      <div class="dropdown vertical-align-bottom font-size-20">
                        <select id="keyword" onchange="total_sirup_filter()" class="btn btn-default dropdown-toggle">
                          <option value="0" selected hidden>-- Silahkan Pilih Keyword --</option>
                          <?php for ($a = 0; $a < count($keyword); $a++) : ?>
                            <option value="<?php echo $keyword[$a]["id_pk_pencarian_sirup"]; ?>"><?php echo $keyword[$a]["pencarian_sirup_frase"]; ?></option>
                          <?php endfor; ?>
                        </select>
                      </div>
                    </div>
                    <span id="sirup_total" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-xl-6 col-lg-12">
            <!-- Card -->
            <div class="card-group">
              <div class="col-lg-12">
                <div class="card card-block p-25">
                  <div class="counter counter-lg">
                    <div class="font-size-30 counter-label text-uppercase"><b>Total Prospek Jenis Outlet</b></div>
                    <div class="font-size-20 text-center" style="height:calc(100% - 350px);">

                      <div class="dropdown vertical-align-bottom font-size-20">
                        <select id="prospek_jenis_outlet" onchange="total_prospek_outlet()" class="btn btn-default dropdown-toggle">
                          <option class="dropdown-item" value="0" role="menuitem">Sendiri</option>
                          <option class="dropdown-item" value="1" role="menuitem">Sendiri dan Supervisee</option>
                        </select>
                      </div>
                      <div class="dropdown vertical-align-bottom font-size-20">
                        <select id="prospek_tahun_outlet" onchange="total_prospek_outlet()" class="btn btn-default dropdown-toggle">
                          <option class="dropdown-item" value="total" role="menuitem">Total</option>
                          <option class="dropdown-item" value="<?php echo date("Y"); ?>" role="menuitem"><?php echo date("Y"); ?></option>
                          <option class="dropdown-item" value="<?php echo date("Y", strtotime('-1 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-1 year')); ?></option>
                          <option class="dropdown-item" value="<?php echo date("Y", strtotime('-2 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-2 year')); ?></option>
                          <option class="dropdown-item" value="<?php echo date("Y", strtotime('-3 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-3 year')); ?></option>
                        </select>
                      </div>
                      <div class="dropdown vertical-align-bottom font-size-20">
                        <select id="prospek_pemerintah" onchange="total_prospek_outlet()" class="btn btn-default dropdown-toggle">
                          <option class="dropdown-item" value="0" role="menuitem">Semua</option>
                          <option class="dropdown-item" value="1" role="menuitem">Swasta</option>
                          <option class="dropdown-item" value="2" role="menuitem">Pemerintah</option>
                        </select>
                      </div>
                    </div>
                    <div class="dropdown vertical-align-bottom font-size-20">
                      <select id="kabupaten" onchange="total_prospek_outlet()" class="js-example-basic-single btn btn-default dropdown-toggle">
                        <option value="0" selected hidden>-- Silahkan Pilih Kabupaten --</option>
                        <?php for ($a = 0; $a < count($kabupaten); $a++) : ?>
                          <option value="<?php echo $kabupaten[$a]['id_pk_kabupaten']; ?>"><?php echo $kabupaten[$a]['kabupaten_nama']; ?></option>
                        <?php endfor; ?>
                      </select>
                    </div>
                    <br>
                    <span id="prospek_price_outlet" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <?php if ($this->session->user_role == "Administrator" || $this->session->user_role == "Sales Manager") : ?>
            <div class="col-xl-6 col-lg-12">
              <div class="card-group">
                <!-- Card -->
                <div class="col-lg-12">
                  <div class="card card-block p-25">
                    <div class="counter counter-lg">
                      <div class="font-size-30 counter-label text-uppercase"><b>Total E-Katalog</b></div>
                      <div class="font-size-20 text-center" style="height:calc(100% - 350px);">

                        <div class="dropdown vertical-align-bottom font-size-20">
                          <select id="ekatalog_tahun" onchange="total_ekatalog_filter()" class="btn btn-default dropdown-toggle">
                            <option class="dropdown-item" value="total" role="menuitem">Total</option>
                            <option class="dropdown-item" value="<?php echo date("Y"); ?>" role="menuitem"><?php echo date("Y"); ?></option>
                            <option class="dropdown-item" value="<?php echo date("Y", strtotime('-1 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-1 year')); ?></option>
                            <option class="dropdown-item" value="<?php echo date("Y", strtotime('-2 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-2 year')); ?></option>
                            <option class="dropdown-item" value="<?php echo date("Y", strtotime('-3 year')); ?>" role="menuitem"><?php echo date("Y", strtotime('-3 year')); ?></option>
                          </select>
                        </div>
                      </div>
                      <span id="ekatalog_price" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>
                      <br>
                      <span id="ekatalog_count" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>
                    </div>
                  </div>
                </div>
                <!-- End Card -->
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php $this->load->view("includes/footer"); ?>
      <?php $this->load->view("includes/core-script"); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
  var row = 0;
</script>
<script>
  $(document).ready(function() {
    total_prospek_filter();
    total_sirup_filter();
    total_prospek_outlet();
    total_ekatalog_filter();
  });
</script>
<script>
  function total_prospek_filter() {
    var jenis = $('#prospek_jenis').val();
    var tahun = $('#prospek_tahun').val();

    $.ajax({
      url: "<?php echo base_url(); ?>ws/Home/get_prospek_tahun/" + jenis + "/" + tahun,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        document.getElementById('prospek_price').innerHTML = "Rp. " + new Intl.NumberFormat('de-DE').format(respond);
      }
    });
  }

  function total_sirup_filter() {
    var jenis = $('#sirup_jenis').val();
    var tahun = $('#sirup_tahun').val();
    var funnel = $('#sirup_funnel').val();
    var keyword = $('#keyword').val();

    $.ajax({
      url: "<?php echo base_url(); ?>ws/Home/get_sirup_total/" + jenis + "/" + tahun + "/" + funnel + "/" + keyword,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        document.getElementById('sirup_total').innerHTML = "Rp. " + new Intl.NumberFormat('de-DE').format(respond);
      }
    });
  }

  function total_prospek_outlet() {
    var jenis = $('#prospek_jenis_outlet').val();
    var tahun = $('#prospek_tahun_outlet').val();
    var pemerintah = $('#prospek_pemerintah').val();
    var kabupaten = $('#kabupaten').val();


    $.ajax({
      url: "<?php echo base_url(); ?>ws/Home/get_prospek_outlet/" + jenis + "/" + tahun + "/" + pemerintah + "/" + kabupaten,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        document.getElementById('prospek_price_outlet').innerHTML = "Rp. " + new Intl.NumberFormat('de-DE').format(respond);
      }
    });
  }

  function total_ekatalog_filter() {
    var tahun = $('#ekatalog_tahun').val();

    $.ajax({
      url: "<?php echo base_url(); ?>ws/Home/get_ekatalog_tahun/" + tahun,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        document.getElementById('ekatalog_price').innerHTML = "Total Harga: Rp. " + new Intl.NumberFormat('de-DE').format(respond.total_price);
        document.getElementById('ekatalog_count').innerHTML = "Total E-Katalog: " + respond.count;
      }
    });
  }
</script>

</html>