<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta"); ?>

  <title>MAK-CRM | Home</title>

  <?php $this->load->view("includes/core-head"); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist/chartist.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
          <div class="col-xxl-6 col-lg-12">
            <!-- Example Panel With All -->
            <div class="panel panel-bordered">
              <div class="panel-heading">
                <h3 class="panel-title">Total Prospek</h3>
              </div>
              <div class="panel-body">
                <span id="prospek_price" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>

              </div>
              <div class="panel-footer">
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
            </div>
            <!-- End Example Panel With All -->
          </div>
          <div class="col-xxl-6 col-lg-12">
            <!-- Example Panel With All -->
            <div class="panel panel-bordered">
              <div class="panel-heading">
                <h3 class="panel-title">Total SiRUP</h3>
              </div>
              <div class="panel-body">
                <span id="sirup_total" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>

              </div>
              <div class="panel-footer">
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
                    <option value="0" selected>Semua Keyword</option>
                    <?php for ($a = 0; $a < count($keyword); $a++) : ?>
                      <option value="<?php echo $keyword[$a]["id_pk_pencarian_sirup"]; ?>"><?php echo $keyword[$a]["pencarian_sirup_frase"]; ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
            </div>
            <!-- End Example Panel With All -->
          </div>
          <div class="col-xxl-12 col-lg-12">
            <!-- Example Panel With All -->
            <div class="panel panel-bordered">
              <div class="panel-heading">
                <h3 class="panel-title">Total Prospek Jenis Outlet</h3>
              </div>
              <div class="panel-body">
                <span id="prospek_price_outlet" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>
              </div>
              <div class="panel-footer">
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
                <div class="vertical-align-bottom font-size-20">
                  <select id="kabupaten" onchange="total_prospek_outlet()" class="btn btn-default">
                    <option value="0" selected>Semua Kabupaten</option>
                    <?php for ($a = 0; $a < count($kabupaten); $a++) : ?>
                      <option value="<?php echo $kabupaten[$a]['id_pk_kabupaten']; ?>"><?php echo $kabupaten[$a]['kabupaten_nama']; ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
              <!-- End Example Panel With All -->
            </div>
          </div>


          <?php if ($this->session->user_role == "Administrator" || $this->session->user_role == "Sales Manager") : ?>
            <div class="col-xxl-12 col-lg-12">
              <!-- Example Panel With All -->
              <div class="panel panel-bordered">
                <div class="panel-heading">
                  <h3 class="panel-title">Total E-Katalog</h3>
                </div>
                <div class="panel-body">
                  <span id="ekatalog_price" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>
                  <br>
                  <span id="ekatalog_count" class="font-size-20 text-center counter-number" style="font-weight:bold;"></span>
                </div>
                <div class="panel-footer">
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
                <!-- End Example Panel With All -->
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php $this->load->view("includes/footer"); ?>
      <?php $this->load->view("includes/core-script"); ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script>
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