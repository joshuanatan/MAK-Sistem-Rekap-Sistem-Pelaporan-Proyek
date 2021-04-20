
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta");?>
    <?php $this->load->view("includes/core-head");?>

    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/structure/pagination.css">
    <title>MAK-CRM | Master Penyelenggara</title>
  </head>
  <body class="animsition site-navbar-small ">

    <?php $this->load->view("includes/navbar");?>
    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Penyelenggara</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
          <li class="breadcrumb-item active">Penyelenggara</li>
        </ol>
      </div>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <div class = "row">
              <div class = "form-group col-lg-1">
                <h5>&nbsp;</h5>
                <button type = "button" class = "btn btn-primary btn-sm" data-target="#modalCreate" data-toggle="modal">Tambah Data</button>
              </div>
              <div class = "form-group col-lg-1"></div>
              <div class = "form-group col-lg-3">
                <h5>Kolom Pengurutan</h5>
                <select class = "form-control"></select>
              </div>
              <div class = "form-group col-lg-1">
                <h5>Urutan</h5>
                <select class = "form-control">
                  <option value = "ASC">A-Z</option>
                  <option value = "DESC">Z-A</option>
                </select>
              </div>
              <div class = "form-group col-lg-3">
                <h5>Pencarian</h5>
                <input type = "text" class = "form-control">
              </div>
              <div class = "form-group col-lg-2">
                <h5>Kolom Pencarian</h5>
                <select class = "form-control">
                  <option value = "ASC">Semua</option>
                </select>
              </div>
              <div class = "form-group col-lg-1">
                <h5>Jumlah Data</h5>
                <select class = "form-control">
                  <option value = "20">20</option>
                  <option value = "30">30</option>
                  <option value = "50">50</option>
                  <option value = "100">100</option>
                </select>
              </div>
            </div>
            <table class="table table-hover dataTable table-striped w-full">
              <thead>
                <tr>
                  <th>Nama Penyelenggara</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php for($a = 0; $a < count($datadb); $a++):?>
                <tr>
                  <td><?php echo strtoupper($datadb[$a]["penyelenggara_nama"]);?></td>
                  <td><?php if($datadb[$a]["penyelenggara_status"] == "aktif"):?>
                    <button type = "button" class = "btn btn-success btn-sm">AKTIF</button>
                    <?php else:?>
                    <button type = "button" class = "btn btn-danger btn-sm">NONAKTIF</button>
                    <?php endif;?>
                  </td>
                  <td>
                    <button type = "button" class = "btn btn-primary btn-sm" data-target="#editPenyelenggara<?php echo $datadb[$a]["id_pk_penyelenggara"];?>" data-toggle="modal"><i class = "icon md-edit"></i></button>

                    <div class="modal fade" id="editPenyelenggara<?php echo $datadb[$a]["id_pk_penyelenggara"];?>">
                      <div class="modal-dialog modal-simple modal-center">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalTitle">Edit Penyelenggara</h4>
                          </div>
                          <form action="<?php echo base_url();?>penyelenggara/edit" autocomplete="off" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="idpenyelenggara" value="<?php echo $datadb[$a]["id_pk_penyelenggara"];?>" autocomplete="off">
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Nama Penyelenggara</label>
                                <input type="text" class="form-control" name="namapenyelenggara" value="<?php echo $datadb[$a]["penyelenggara_nama"];?>" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Status</label>
                                <br>
                                <select class="form-control" name="statuspenyelenggara">
                                  <option value="aktif"  <?php if($datadb[$a]["penyelenggara_status"]=="aktif") echo 'selected="selected"'; ?> >Aktif</option>
                                  <option value="nonaktif" <?php if($datadb[$a]["penyelenggara_status"]=="nonaktif") echo 'selected="selected"'; ?> >Non Aktif</option>
                                </select>
                              </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    </td>
                </tr>
                <?php endfor;?>
              </tbody>
            </table>
            <nav class = "d-flex justify-content-center">
              <ul class="pagination">
                <li class="disabled page-item">
                  <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="active page-item"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page -->
    <?php $this->load->view("includes/footer");?>
    <!-- Core  -->
    <?php $this->load->view("includes/core-script");?>

    <script src="<?php echo base_url();?>global/js/Plugin/magnific-popup.js"></script>
    <script src="<?php echo base_url();?>global/vendor/magnific-popup/jquery.magnific-popup.js"></script>

  </body>
</html>

<div class="modal fade" id="modalCreate">
  <div class="modal-dialog modal-simple modal-top">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="exampleModalTitle">Tambah Penyelenggara</h4>
      </div>
      <form action="<?php echo base_url();?>penyelenggara/insert" autocomplete="off" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Nama Penyelenggara</label>
            <input type="text" class="form-control" name="namapenyelenggara" placeholder="Nama Penyelenggara" autocomplete="off">
          </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
