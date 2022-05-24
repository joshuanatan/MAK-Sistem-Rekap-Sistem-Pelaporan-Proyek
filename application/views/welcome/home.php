<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta"); ?>

  <title>MAK-CRM | Home</title>

  <?php $this->load->view("includes/core-head"); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist/chartist.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
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

              <div class="col-lg-6">
                <div class="card card-block p-25 bg-blue-600">
                  <div class="counter counter-lg counter-inverse">
                    <div class="counter-label text-uppercase">score</div>
                    <span class="counter-number">220</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card card-block p-25 bg-purple-600">
                  <div class="counter counter-lg counter-inverse">
                    <div class="counter-label text-uppercase">earn</div>
                    <div class="counter-number-group">
                      <span class="counter-number-related">-</span>
                      <span class="counter-number">90</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6 col-lg-12">
            <!-- Card -->
            <div class="card-group">
              <div class="card card-block p-0">
                <div class="counter counter-md vertical-align bg-white h-300">
                  <div class="counter-icon p-30 green-600" style="position:absolute;top:0;left:0;">
                    <i class="icon wb-stats-bars" aria-hidden="true"></i>
                  </div>
                  <div class="counter-number-group font-size-30 vertical-align-middle">
                    <span class="counter-icon green-600 mr-10"><i class="wb-graph-up"></i></span>
                    <span class="counter-number">9</span>
                    <span class="counter-number-related">%</span>
                    <div class="font-size-20 mt-3">More sales</div>
                  </div>
                </div>
              </div>
              <div class="card card-block p-0">
                <div class="vertical-align text-center bg-red-700 white p-30 h-300">
                  <div class="vertical-align-middle font-size-40">
                    <p>AS</p>
                    <p>Tshirt</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-xl-6 col-lg-12">
            <!-- Card -->
            <div class="card-group">
              <div class="card card-block p-30">
                <div class="counter counter-lg text-left pl-20">
                  <span class="counter-number">286</span>
                  <div class="counter-label text-uppercase">Online Players</div>
                </div>
              </div>
              <div class="card card-block p-30">
                <div class="counter counter-lg text-left pl-20">
                  <span class="counter-number">286</span>
                  <div class="counter-label text-uppercase">Online Players</div>
                </div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <!-- Card -->
            <div class="card card-block p-30">
              <div class="counter counter-lg">
                <div class="counter-label text-uppercase">bounce rate</div>
                <div class="counter-number-group">
                  <span class="counter-icon mr-10 green-600">
                    <i class="wb-stats-bars"></i>
                  </span>
                  <span class="counter-number">2.8</span>
                  <span class="counter-number-related">%</span>
                </div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <!-- Card -->
            <div class="card card-block p-30">
              <div class="counter counter-lg">
                <div class="counter-label text-uppercase">bounce rate</div>
                <div class="counter-number-group">
                  <span class="counter-number">4.5</span>
                  <span class="counter-number-related">%</span>
                </div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-xl-6 col-lg-12">
            <!-- Card -->
            <div class="card-group">
              <div class="card card-block p-0">
                <div class="counter counter-lg counter-inverse bg-blue-600 vertical-align h-150">
                  <div class="vertical-align-middle">
                    <div class="counter-icon mb-5"><i class="icon wb-image" aria-hidden="true"></i></div>
                    <span class="counter-number">1,286</span>
                  </div>
                </div>
              </div>
              <div class="card card-block p-0">
                <div class="counter counter-lg counter-inverse bg-red-600 vertical-align h-150">
                  <div class="vertical-align-middle">
                    <div class="counter-icon mb-5"><i class="icon wb-video" aria-hidden="true"></i></div>
                    <span class="counter-number">620</span>
                  </div>
                </div>
              </div>
              <div class="card card-block p-0">
                <div class="counter counter-lg counter-inverse bg-purple-600 vertical-align h-150">
                  <div class="vertical-align-middle">
                    <div class="counter-icon mb-5"><i class="icon wb-envelope" aria-hidden="true"></i></div>
                    <span class="counter-number">2,860</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <!-- Card -->
            <div class="card card-block">
              <div class="counter counter-lg">
                <div class="counter-label text-uppercase font-size-16">we have</div>
                <div class="counter-number-group">
                  <span class="counter-number">300</span>
                  <span class="counter-number-related">+</span>
                </div>
                <div class="counter-label text-uppercase font-size-16">followers</div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-xl-3 col-lg-6">
            <!-- Card -->
            <div class="card card-block p-20 bg-blue-600">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label text-uppercase font-size-16">we have</div>
                <div class="counter-number-group">
                  <span class="counter-number">365</span>
                  <span class="counter-icon ml-10"><i class="icon wb-image" aria-hidden="true"></i></span>
                </div>
                <div class="counter-label text-uppercase font-size-16">pictures</div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-xl-8 col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <!-- Card -->
                <div class="card p-30 flex-row justify-content-between">
                  <div class="white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-red-600" aria-hidden="true"></i>
                  </div>
                  <div class="counter counter-md counter text-right">
                    <div class="counter-number-group">
                      <span class="counter-number">25</span>
                      <span class="counter-number-related text-capitalize">projects</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">in design</div>
                  </div>
                </div>
                <!-- End Card -->
              </div>

              <div class="col-lg-6">
                <!-- Card -->
                <div class="card p-30 flex-row justify-content-between">
                  <div class="counter counter-md text-left">
                    <div class="counter-number-group">
                      <span class="counter-number">42</span>
                      <span class="counter-number-related text-capitalize">people</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">in room</div>
                  </div>
                  <div class="white">
                    <i class="icon icon-circle icon-2x wb-users bg-blue-600" aria-hidden="true"></i>
                  </div>
                </div>
                <!-- End Card -->
              </div>

              <div class="col-lg-6">
                <!-- Card -->
                <div class="card card-block p-30">
                  <div class="counter counter-md text-left">
                    <div class="counter-label text-uppercase mb-5">New Visitors</div>
                    <div class="counter-number-group mb-10">
                      <span class="counter-number">12,657</span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs mb-10">
                        <div class="progress-bar progress-bar-info bg-blue-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 70.3%" role="progressbar">
                          <span class="sr-only">70.3%</span>
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-icon blue-600 mr-5"><i class="wb-graph-up"></i></span>
                          <span class="counter-number">38%</span>
                          <span class="counter-number-related">more than last month</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Card -->
              </div>

              <div class="col-lg-6">
                <!-- Card -->
                <div class="card card-block p-30">
                  <div class="counter counter-md text-left">
                    <div class="counter-label text-uppercase mb-5">New Orders</div>
                    <div class="counter-number-group mb-10">
                      <span class="counter-number">2,381</span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs mb-5">
                        <div class="progress-bar progress-bar-info bg-red-600" aria-valuenow="20.3" aria-valuemin="0" aria-valuemax="100" style="width: 20.3%" role="progressbar">
                          <span class="sr-only">20.3%</span>
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-icon red-600 mr-5"><i class="wb-graph-down"></i></span>
                          <span class="counter-number">14%</span>
                          <span class="counter-number-related">less than last month</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Card -->
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-md-6">
            <!-- Card -->
            <div class="card card-block p-30 bg-green-600 h-350">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label">
                  <div class="font-size-30">2017</div>
                  <div class="font-size-14">Total Expenses</div>
                </div>
                <div class="counter-number-group text-center" style="width:100%;position:absolute;bottom:30px;left:0;">
                  <span class="counter-number">356</span>
                  <span class="counter-number-related font-size-30">$</span>
                </div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-xl-2 col-md-6">
            <!-- Card -->
            <div class="card card-block p-30 bg-orange-600 text-center vertical-align h-350">
              <div class="counter counter-lg counter-inverse vertical-align-middle">
                <span class="counter-number">7.3</span>
                <div class="counter-label text-capitalize">IMDB Rating</div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-md-6">
            <!-- Card -->
            <div class="card card-block p-30 bg-blue-600">
              <div class="card-watermark darker font-size-80 m-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
                  <span class="counter-number">25</span>
                  <span class="counter-number-related text-capitalize">projects</span>
                </div>
                <div class="counter-label text-capitalize">in design</div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-md-6">
            <!-- Card -->
            <div class="card card-block p-30 bg-red-600">
              <div class="card-watermark darker font-size-80 m-15"><i class="icon wb-users" aria-hidden="true"></i></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
                  <span class="counter-number">42</span>
                  <span class="counter-number-related text-capitalize">pepele</span>
                </div>
                <div class="counter-label text-capitalize">in room</div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-md-6">
            <!-- Card -->
            <div class="card card-block p-30 bg-green-600">
              <div class="card-watermark darker font-size-60 m-15"><i class="icon wb-musical" aria-hidden="true"></i></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
                  <span class="counter-number">661</span>
                  <span class="counter-number-related text-capitalize">songs</span>
                </div>
                <div class="counter-label text-capitalize">in album</div>
              </div>
            </div>
            <!-- End Card -->
          </div>

          <div class="col-md-6">
            <!-- Card  -->
            <div class="card card-block p-30 bg-purple-600">
              <div class="card-watermark lighter font-size-60 m-15"><i class="icon wb-image" aria-hidden="true"></i></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-wrap font-size-30">
                  <span class="counter-number">1025</span>
                  <span class="counter-number-related text-capitalize">photos</span>
                </div>
                <div class="counter-label text-capitalize">in family</div>
              </div>
            </div>
            <!-- End Card -->
          </div>
        </div>
      </div>

      <table>
        <tr>
          <th>Role</th>
          <th>:</th>
          <td style="padding-left:20px"><?php echo ucwords($this->session->user_role) ?></td>
        </tr>
        <tr>
          <th>Total Prospek</th>
          <th>:</th>
          <td align="right">Rp. <?php echo number_format($user_data['total_price']); ?></td>
        </tr>
        <tr>
          <th>Sirup Funnel
          <th>
          <th>:</th>
          <td><?php echo $user_data['funnel']; ?></td>
        </tr>
        <tr>
          <th>Sirup Not Funnel
          <th>
          <th>:</th>
          <td><?php echo $user_data['not_funnel']; ?></td>
        </tr>
        <tr>
          <th>Total Prospek Pemerintah
          <th>
          <th>:</th>
          <td align="right">Rp. <?php echo number_format($user_data['total_prospek_pemerintah']); ?></td>
        </tr>
        <tr>
          <th>Total Prospek Swasta
          <th>
          <th>:</th>
          <td align="right">Rp. <?php echo number_format($user_data['total_prospek_swasta']); ?></td>
        </tr>
      </table>
    </div>
  </div>
  <?php $this->load->view("includes/footer"); ?>
  <?php $this->load->view("includes/core-script"); ?>
</body>
<script>
  $(document).ready(function() {
    total_prospek_filter();
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
</script>

</html>