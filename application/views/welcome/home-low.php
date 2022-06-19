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
        <?php if ($this->session->user_role == "Supervisor" || $this->session->user_role == "Area Sales Manager") : ?>
          <div class="col-lg-6">
            <div class="card p-30 flex-row justify-content-between">
              <div class="white">
                <i class="icon icon-circle icon-2x wb-clipboard bg-yellow-600" aria-hidden="true"></i>
              </div>
              <div class="counter counter-md counter text-right">
                <div class="counter-number-group">
                  <span class="counter-number"><?php echo number_format($user_data["funnel"]+$user_data["not_funnel"])?></span>
                </div>
                <div class="counter-label text-capitalize font-size-16">Jumlah SiRUP</div>
              </div>
            </div>
          </div>
        <?php endif;?>
        <div class="col-lg-6">
          <!-- Card -->
          <div class="card p-30 flex-row justify-content-between">
            <div class="white">
              <i class="icon icon-circle icon-2x wb-clipboard bg-yellow-600" aria-hidden="true"></i>
            </div>
            <div class="counter counter-md counter text-right">
              <div class="counter-number-group">
                <span class="counter-number"><?php echo number_format($user_data["jumlah_prospek_sendiri"]);?></span>
              </div>
              <div class="counter-label text-capitalize font-size-16">Jumlah Prospek</div>
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
                <span class="counter-number">Rp. <?php echo number_format($user_data["total_prospek_sendiri"]);?></span>
              </div>
              <div class="counter-label text-capitalize font-size-16">Total Prospek</div>
            </div>
          </div>
          <!-- End Card -->
        </div>
      </div>
      <div class="row">
        <?php if ($this->session->user_role == "Supervisor" || $this->session->user_role == "Area Sales Manager") : ?>
          <div class="col-lg-6 col-xl-4">
          <!-- Example Pie -->
            <div class="example-wrap m-md-0">
              <h4 class="example-title">SiRUP</h4>
              <p>Status Funnel SiRUP</p>
              <div class="example text-center max-width">
                <canvas id="SirupPie" height="250"></canvas>
              </div>
            </div>
            <!-- End Example Pie -->
          </div>
        <?php endif;?>
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
            <h4 class="example-title">Prospek</h4>
            <p>Prospek Pemerintah dan Prospek Swasta</p>
            <div class="example text-center max-width">
              <canvas id="ProspekPemerintahSwastaPie" height="250"></canvas>
            </div>
          </div>
          <!-- End Example Pie -->
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
        labels: ["Pemerintah", "Swasta"],
        datasets: [{
          data: [
            <?php echo $user_data["total_prospek_pemerintah_sendiri"] ?>,
            <?php echo $user_data["total_prospek_swasta_sendiri"] ?>,
          ],
          backgroundColor: [
            Config.colors("green", 400),
            Config.colors("orange", 400)
          ],
          hoverBackgroundColor: [
            Config.colors("green", 600),
            Config.colors("orange", 600)
          ]
        }]
      };
      var myPie = new Chart(document.getElementById("ProspekPemerintahSwastaPie").getContext("2d"), {
        type: 'pie',
        data: pieData,
        options: {
          responsive: true
        }
      });
    })();

    <?php if ($this->session->user_role == "Supervisor" || $this->session->user_role == "Area Sales Manager") : ?>
      (function() {
        var pieData = {
          labels: ["Sudah Funnel", "Belum Funnel"],
          datasets: [{
            data: [
              <?php echo $user_data["funnel"]?>,
              <?php echo $user_data["not_funnel"]?>
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
        var myPie = new Chart(document.getElementById("SirupPie").getContext("2d"), {
          type: 'pie',
          data: pieData,
          options: {
            responsive: true
          }
        });
      })();
    <?php endif;?>
  });
</script>