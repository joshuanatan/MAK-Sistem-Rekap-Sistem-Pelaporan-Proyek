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
      <div class="row">
        <div class="col-lg-6">
          <!-- Card -->
          <div class="card p-30 flex-row justify-content-between">
            <div class="white">
              <i class="icon icon-circle icon-2x wb-clipboard bg-yellow-600" aria-hidden="true"></i>
            </div>
            <div class="counter counter-md counter text-right">
              <div class="counter-number-group">
                <span class="counter-number">Rp <?php echo number_format($prospek_pie_chart["total"][0]["jmlh"]); ?></span>
              </div>
              <div class="counter-label text-capitalize font-size-16">Total Funnel</div>
            </div>
          </div>
          <!-- End Card -->
        </div>
        <div class="col-lg-6">
          <!-- Card -->
          <div class="card p-30 flex-row justify-content-between">
            <div class="white">
              <i class="icon icon-circle icon-2x wb-clipboard bg-green-600" aria-hidden="true"></i>
            </div>
            <div class="counter counter-md counter text-right">
              <div class="counter-number-group">
                <span class="counter-number">Rp <?php echo number_format($prospek_pie_chart["win"][0]["jmlh"]); ?></span>
              </div>
              <div class="counter-label text-capitalize font-size-16">Funnel Win</div>
            </div>
          </div>
          <!-- End Card -->
        </div>
        <div class="col-lg-6">
          <!-- Card -->
          <div class="card p-30 flex-row justify-content-between">
            <div class="white">
              <i class="icon icon-circle icon-2x wb-clipboard bg-blue-600" aria-hidden="true"></i>
            </div>
            <div class="counter counter-md counter text-right">
              <div class="counter-number-group">
                <span class="counter-number">Rp <?php echo number_format($prospek_pie_chart["lead"][0]["jmlh"] + $prospek_pie_chart["prospek"][0]["jmlh"] + $prospek_pie_chart["hot_prospek"][0]["jmlh"] + $prospek_pie_chart["belum"][0]["jmlh"] + $prospek_pie_chart["na"][0]["jmlh"]); ?></span>
              </div>
              <div class="counter-label text-capitalize font-size-16">Funnel In Progress</div>
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-lg-6">
          <!-- Card -->
          <div class="card p-30 flex-row justify-content-between">
            <div class="white">
              <i class="icon icon-circle icon-2x wb-clipboard bg-red-600" aria-hidden="true"></i>
            </div>
            <div class="counter counter-md counter text-right">
              <div class="counter-number-group">
                <span class="counter-number">Rp <?php echo number_format($prospek_pie_chart["lose"][0]["jmlh"]); ?></span>
              </div>
              <div class="counter-label text-capitalize font-size-16">Funnel Loss</div>
            </div>
          </div>
          <!-- End Card -->
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-xl-4">
          <!-- Example Pie -->
          <div class="example-wrap m-md-0">
            <h4 class="example-title">Prospek</h4>
            <p>Status Prospek</p>
            <div class="example text-center max-width">
              <canvas id="ProspekPie" height="250"></canvas>
            </div>
          </div>
          <!-- End Example Pie -->
        </div>
        <div class="col-lg-6 col-xl-4">
          <!-- Example Pie -->
          <div class="example-wrap m-md-0">
            <h4 class="example-title">E-Katalog</h4>
            <p>Status Klik E-Katalog</p>
            <div class="example text-center max-width">
              <canvas id="EkatalogPie" height="250"></canvas>
            </div>
          </div>
          <!-- End Example Pie -->
        </div>
        <div class="col-lg-6 col-xl-4">
          <!-- Example Pie -->
          <div class="example-wrap m-md-0">
            <h4 class="example-title">E-Katalog</h4>
            <p>Hubungan E-Katalog dan SiRUP</p>
            <div class="example text-center max-width">
              <canvas id="EkatalogSirupPie" height="250"></canvas>
            </div>
          </div>
          <!-- End Example Pie -->
        </div>
        <div class="col-lg-12 col-xl-12">
          <!-- Example Bar -->
          <div class="example-wrap">
            <h4 class="example-title">SiRUP</h4>
            <p>Jumlah SiRUP Per Kata Kunci</p>
            <div class="example text-center">
              <canvas id="SirupBar" height="150" width="450"></canvas>
            </div>
          </div>
          <!-- End Example Bar -->
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("includes/footer"); ?>
  <?php $this->load->view("includes/core-script"); ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<script src="<?php echo base_url(); ?>/global/vendor/chart-js/Chart.js"></script>
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

<script>
  (function(global, factory) {
    if (typeof define === "function" && define.amd) {
      define("/charts/chartjs", ["jquery", "Site"], factory);
    } else if (typeof exports !== "undefined") {
      factory(require("jquery"), require("Site"));
    } else {
      var mod = {
        exports: {}
      };
      factory(global.jQuery, global.Site);
      global.chartsChartjs = mod.exports;
    }
  })(this, function(_jquery, _Site) {
    "use strict";

    _jquery = babelHelpers.interopRequireDefault(_jquery);
    (0, _jquery.default)(document).ready(function($$$1) {
      (0, _Site.run)();
    });
    Chart.defaults.global.responsive = true;

    (function() {
      var barChartData = {
        labels: [<?php echo $sirup_bar_chart["label"] ?>],
        datasets: [{
          label: "Jumlah Sirup",
          backgroundColor: "rgba(204, 213, 219, .2)",
          borderColor: Config.colors("blue-grey", 300),
          hoverBackgroundColor: "rgba(204, 213, 219, .3)",
          borderWidth: 2,
          data: [<?php echo $sirup_bar_chart["content"] ?>]
        }]
      };
      var myBar = new Chart(document.getElementById("SirupBar").getContext("2d"), {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          scales: {
            xAxes: [{
              display: true
            }],
            yAxes: [{
              display: true
            }]
          }
        }
      });
    })();

    (function() {
      var pieData = {
        labels: ["Win", "Lose", "Lead", "Prospek", "Hot Prospek"],
        datasets: [{
          data: [
            <?php echo $prospek_pie_chart["win"][0]["jmlh"] ?>,
            <?php echo $prospek_pie_chart["lose"][0]["jmlh"] ?>,
            <?php echo $prospek_pie_chart["lead"][0]["jmlh"] ?>,
            <?php echo $prospek_pie_chart["prospek"][0]["jmlh"] ?>,
            <?php echo $prospek_pie_chart["hot_prospek"][0]["jmlh"] ?>,
          ],
          backgroundColor: [
            Config.colors("green", 400),
            Config.colors("gray", 400),
            Config.colors("blue", 400),
            Config.colors("yellow", 400),
            Config.colors("orange", 400)
          ],
          hoverBackgroundColor: [
            Config.colors("green", 600),
            Config.colors("gray", 600),
            Config.colors("blue", 600),
            Config.colors("yellow", 600),
            Config.colors("orange", 600)
          ]
        }]
      };
      var myPie = new Chart(document.getElementById("ProspekPie").getContext("2d"), {
        type: 'pie',
        data: pieData,
        options: {
          responsive: true
        }
      });
    })();

    (function() {
      var pieData = {
        labels: ["Batal", "Proses Kirim", "Proses Kontrak", "Proses Nego", "Selesai"],
        datasets: [{
          data: [
            <?php echo $ekatalog_pie_chart["batal"][0]["jmlh"] ?>,
            <?php echo $ekatalog_pie_chart["kirim"][0]["jmlh"] ?>,
            <?php echo $ekatalog_pie_chart["kontrak"][0]["jmlh"] ?>,
            <?php echo $ekatalog_pie_chart["nego"][0]["jmlh"] ?>,
            <?php echo $ekatalog_pie_chart["selesai"][0]["jmlh"] ?>,
          ],
          backgroundColor: [
            Config.colors("red", 400),
            Config.colors("blue", 400),
            Config.colors("yellow", 400),
            Config.colors("orange", 400),
            Config.colors("green", 400),
          ],
          hoverBackgroundColor: [
            Config.colors("red", 600),
            Config.colors("blue", 600),
            Config.colors("yellow", 600),
            Config.colors("orange", 600),
            Config.colors("green", 600),
          ]
        }]
      };
      var myPie = new Chart(document.getElementById("EkatalogPie").getContext("2d"), {
        type: 'pie',
        data: pieData,
        options: {
          responsive: true
        }
      });
    })();

    (function() {
      var pieData = {
        labels: ["Terdaftar di SiRUP", "Tidak Terdapat di SiRUP"],
        datasets: [{
          data: [
            <?php echo count($ekatalog_sirup) ?>,
            <?php echo count($ekatalog_tidak_sirup) ?>,
          ],
          backgroundColor: [
            Config.colors("green", 400),
            Config.colors("red", 400),
          ],
          hoverBackgroundColor: [
            Config.colors("green", 600),
            Config.colors("red", 600),
          ]
        }]
      };
      var myPie = new Chart(document.getElementById("EkatalogSirupPie").getContext("2d"), {
        type: 'pie',
        data: pieData,
        options: {
          responsive: true
        }
      });
    })();

  });
</script>