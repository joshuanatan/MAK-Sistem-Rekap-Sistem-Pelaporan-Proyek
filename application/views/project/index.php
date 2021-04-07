
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    
    <?php $this->load->view("includes/meta");?>
    
    <title>ITin Bisnis | Project</title>
    
    <?php $this->load->view("includes/core-head");?>
    
    <style>
      .scroll-detail-table-wrapper{
        overflow-y:scroll;
        height:460px;
      }
      .scroll-main-table-wrapper{
        overflow-y:scroll;
        height:400px;
      }
    </style>
  </head>
  <body class="animsition site-navbar-small dashboard">
    <?php $this->load->view("includes/navbar");?>

    
    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Master Project</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
          <li class="breadcrumb-item active">Project</li>
        </ol>
      </div>

      <div class="page-content container-fluid">
        <div class="row">
          <div class="col-xl-7 col-sm-12">
            <!-- Panel Kitchen Sink -->
            <div class="panel">
              <header class="panel-heading">
                <h3 class="panel-title">
                  Daftar Project 
                  <span class="panel-desc">
                  </span>
                </h3>
              </header>

              <div class="panel-body">
                <button type = "button" data-toggle = "modal" data-target = "#tambah-project" class = "btn btn-success btn-sm">Tambah Project</button>
                <div class = "scroll-main-table-wrapper">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID Project</th>
                        <th>Nama Client</th>
                        <th>Nama Project</th>
                        <th>Tipe Project</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for($a = 0; $a<10; $a++):?>
                      <tr>
                        <td>PRJ-WEB-001</td>
                        <td>Test</td>
                        <td>Nama Project 1234</td>
                        <td>Pengembangan Web</td>
                        <td>
                          <span data-plugin="peityPie" data-skin="red">6/13</span>
                        </td>
                        <td></td>
                      </tr>
                      <?php endfor;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- End Panel Kitchen Sink -->
          </div>
          <div class="col-lg-5 col-sm-12">
            <div class="panel">
              <header class="panel-heading">
                <h3 class="panel-title">
                  Detail Project
                  <span class="panel-desc">
                  </span>
                </h3>
              </header>

              <div class="panel-body scroll-detail-table-wrapper">
                <div class="nav-tabs-horizontal" data-plugin="tabs">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#detilProject">Detil Project</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#collaborative">User Kolaborasi</a></li>
                  </ul>
                  <div class="tab-content pt-20">
                    <div class="tab-pane active" id="detilProject" role="tabpanel">
                      <div class="alert alert-success" role="alert">
                        <a class="alert-link" href="javascript:void(0)">Project Done</a>.
                      </div>
                      <form autocomplete="off">
                        <div class="row">
                          <div class="form-group form-material col-md-12">
                            <label class="form-control-label" for="inputBasicFirstName">Nama Project</label>
                            <input type="text" class="form-control" disabled />
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group form-material col-md-12">
                            <label class="form-control-label" for="inputBasicFirstName">Tanggal Mulai</label>
                            <input type="text" class="form-control" disabled />
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group form-material col-md-12">
                            <label class="form-control-label" for="inputBasicFirstName">Tanggal Selesai</label>
                            <input type="text" class="form-control" disabled />
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group form-material col-md-12">
                            <label class="form-control-label" for="inputBasicFirstName">Deskripsi Project</label>
                            <textarea class="form-control" disabled /></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group form-material col-md-12">
                            <label class="form-control-label" for="inputBasicFirstName">Status Pekerjaan</label>
                            <div class="progress progress-lg">
                              <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 35%" role="progressbar">
                                <span class="sr-only">35% Complete (success)</span>
                              </div>
                              <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 20%"
                                role="progressbar">
                                <span class="sr-only">20% Complete (warning)</span>
                              </div>
                              <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 10%" role="progressbar">
                                <span class="sr-only">10% Complete (danger)</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-group">
                          <div class="card card-block p-0">
                            <div class="counter counter-lg counter-inverse bg-blue-600 vertical-align h-150">
                              <div class="vertical-align-middle">
                                <div class="counter-icon mb-5"><i class="icon md-check-all" aria-hidden="true"></i></div>
                                <span class="counter-number">1,286</span>
                              </div>
                            </div>
                          </div>
                          <div class="card card-block p-0">
                            <div class="counter counter-lg counter-inverse bg-pink-600 vertical-align h-150">
                              <div class="vertical-align-middle">
                                <div class="counter-icon mb-5"><i class="icon md-comment-list" aria-hidden="true"></i></div>
                                <span class="counter-number">620</span>
                              </div>
                            </div>
                          </div>
                          <div class="card card-block p-0">
                            <div class="counter counter-lg counter-inverse bg-red-600 vertical-align h-150">
                              <div class="vertical-align-middle">
                                <div class="counter-icon mb-5"><i class="icon md-edit" aria-hidden="true"></i></div>
                                <span class="counter-number">620</span>
                              </div>
                            </div>
                          </div>
                          <div class="card card-block p-0">
                            <div class="counter counter-lg counter-inverse bg-purple-600 vertical-align h-150">
                              <div class="vertical-align-middle">
                                <div class="counter-icon mb-5"><i class="icon md-close" aria-hidden="true"></i></div>
                                <span class="counter-number">2,860</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane" id="collaborative" role="tabpanel">
                        <table class = "table table-bordered table-hover table-stripped">
                          <thead>
                            <tr>
                              <th>User ID</th>
                              <th>Nama User</th>
                              <th>Pihak</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php for($a = 0; $a<15; $a++):?>
                              <tr>
                                <td>USR-001</td>
                                <td>Joshua</td>
                                <td>Client</td>
                                <td></td>
                              </tr>
                            <?php endfor;?>
                            <tr>
                              <td colspan = 4>
                                <button type = "button" class = "btn btn-primary btn-sm col-lg-12">Tambah User</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-6 col-sm-12">
            <!-- Panel Kitchen Sink -->
            <div class="panel">
              <header class="panel-heading">
                <h3 class="panel-title">
                  Daftar Requirement
                  <span class="panel-desc">
                  </span>
                </h3>
              </header>

              <div class="panel-body">
                <div class = "scroll-main-table-wrapper">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID Project</th>
                        <th>Nama Client</th>
                        <th>Nama Project</th>
                        <th>Tipe Project</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for($a = 0; $a<10; $a++):?>
                      <tr>
                        <td>PRJ-WEB-001</td>
                        <td>Test</td>
                        <td>Nama Project 1234</td>
                        <td>Pengembangan Web</td>
                        <td>
                          <span data-plugin="peityPie" data-skin="red">6/13</span>
                        </td>
                        <td></td>
                      </tr>
                      <?php endfor;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- End Panel Kitchen Sink -->
          </div>
          <div class="col-xl-6 col-sm-12">
            <!-- Panel Kitchen Sink -->
            <div class="panel">
              <header class="panel-heading">
                <h3 class="panel-title">
                  Requirement Discussion
                  <span class="panel-desc">
                  </span>
                </h3>
              </header>

              <div class="panel-body">
                <div class = "scroll-main-table-wrapper">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID Project</th>
                        <th>Nama Client</th>
                        <th>Nama Project</th>
                        <th>Tipe Project</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for($a = 0; $a<10; $a++):?>
                      <tr>
                        <td>PRJ-WEB-001</td>
                        <td>Test</td>
                        <td>Nama Project 1234</td>
                        <td>Pengembangan Web</td>
                        <td>
                          <span data-plugin="peityPie" data-skin="red">6/13</span>
                        </td>
                        <td></td>
                      </tr>
                      <?php endfor;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- End Panel Kitchen Sink -->
          </div>
        </div>
      </div>
      <?php $this->load->view("includes/footer");?>
    </div>
    <!-- End Page -->
    <!-- End Page -->
    <?php $this->load->view("includes/core-script");?>
        
  </body>
</html>


<script src="<?php echo base_url();?>global/vendor/bootstrap-table/bootstrap-table.min.js"></script>
<script src="<?php echo base_url();?>global/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js"></script>

<script src="<?php echo base_url();?>global/vendor/peity/jquery.peity.min.js"></script>
<script src="<?php echo base_url();?>global/js/Plugin/peity.js"></script>

<script src="<?php echo base_url();?>global/js/Plugin/asprogress.js"></script>
<script src="<?php echo base_url();?>global/vendor/asprogress/jquery-asProgress.js"></script>

<div class="modal fade modal-fill-in" id="tambah-project" aria-hidden="false" aria-labelledby="exampleFillIn" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="exampleFillInModalTitle">Tambah Project</h4>
      </div>
      <div class="modal-body">
      <form autocomplete="off">
        <div class="row">
          <div class="form-group form-material col-md-12">
            <label class="form-control-label" for="inputBasicFirstName">Nama Project</label>
            <input type="text" class="form-control" disabled />
          </div>
        </div>
        <div class="row">
          <div class="form-group form-material col-md-12">
            <label class="form-control-label" for="inputBasicFirstName">Tanggal Mulai</label>
            <input type="text" class="form-control" disabled />
          </div>
        </div>
        <div class="row">
          <div class="form-group form-material col-md-12">
            <label class="form-control-label" for="inputBasicFirstName">Tanggal Selesai</label>
            <input type="text" class="form-control" disabled />
          </div>
        </div>
        <div class="row">
          <div class="form-group form-material col-md-12">
            <label class="form-control-label" for="inputBasicFirstName">Deskripsi Project</label>
            <textarea class="form-control" disabled /></textarea>
          </div>
        </div>
        <div class="row">
          <div class="form-group form-material col-md-12">
            <label class="form-control-label" for="inputBasicFirstName">Status Pekerjaan</label>
            <div class="progress progress-lg">
              <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 35%" role="progressbar">
                <span class="sr-only">35% Complete (success)</span>
              </div>
              <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 20%"
                role="progressbar">
                <span class="sr-only">20% Complete (warning)</span>
              </div>
              <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 10%" role="progressbar">
                <span class="sr-only">10% Complete (danger)</span>
              </div>
            </div>
          </div>
        </div>
        <div class="card-group">
          <div class="card card-block p-0">
            <div class="counter counter-lg counter-inverse bg-blue-600 vertical-align h-150">
              <div class="vertical-align-middle">
                <div class="counter-icon mb-5"><i class="icon md-check-all" aria-hidden="true"></i></div>
                <span class="counter-number">1,286</span>
              </div>
            </div>
          </div>
          <div class="card card-block p-0">
            <div class="counter counter-lg counter-inverse bg-pink-600 vertical-align h-150">
              <div class="vertical-align-middle">
                <div class="counter-icon mb-5"><i class="icon md-comment-list" aria-hidden="true"></i></div>
                <span class="counter-number">620</span>
              </div>
            </div>
          </div>
          <div class="card card-block p-0">
            <div class="counter counter-lg counter-inverse bg-red-600 vertical-align h-150">
              <div class="vertical-align-middle">
                <div class="counter-icon mb-5"><i class="icon md-edit" aria-hidden="true"></i></div>
                <span class="counter-number">620</span>
              </div>
            </div>
          </div>
          <div class="card card-block p-0">
            <div class="counter counter-lg counter-inverse bg-purple-600 vertical-align h-150">
              <div class="vertical-align-middle">
                <div class="counter-icon mb-5"><i class="icon md-close" aria-hidden="true"></i></div>
                <span class="counter-number">2,860</span>
              </div>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>