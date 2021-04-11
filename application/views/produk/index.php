
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta");?>
    <?php $this->load->view("includes/core-head");?>
    <title>MAK-CRM | Master Produk</title>

        <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">

  </head>
  <body class="animsition site-navbar-small ">

    <?php $this->load->view("includes/navbar");?>
    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Produk</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
                <div class="page-header-actions">
                    <a class="btn btn-sm btn-default btn-outline btn-round" href="http://datatables.net" target="_blank">
                    <i class="icon wb-link" aria-hidden="true"></i>
                    <span class="hidden-sm-down">Official Website</span>
                </a>
            </div>
        </div>

        <div class="page-content">
            <!-- Panel Basic -->
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">List Produk</h3>
                </header>
                <div class="panel-body">
                    <button type = "button" class = "btn btn-primary btn-sm" data-target="#examplePositionTop" data-toggle="modal">Tambah Produk</button>
                    <br/><br/>
                    <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                        <thead>
                            <tr>
                                <th>No. Katalog Produk</th>
                                <th>Principal</th>
                                <th>No. SAP</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Price List</th>
                                <th>Harga Ekat</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php for($a = 0; $a < count($datadb); $a++):?>
                            <tr>
                                <td><?php echo $datadb[$a]["produk_no_katalog"];?></td>
                                <td><?php echo $datadb[$a]["produk_principal"];?></td>
                                <td><?php echo $datadb[$a]["produk_no_sap"];?></td>
                                <td><?php echo $datadb[$a]["produk_nama"];?></td>
                                <td><?php echo $datadb[$a]["produk_kategori"];?></td>
                                <td><?php echo $datadb[$a]["produk_price_list"];?></td>
                                <td><?php echo $datadb[$a]["produk_harga_ekat"];?></td>
                                <td><?php echo $datadb[$a]["produk_deskripsi"];?></td>
                                <td>
                                    <button type = "button" class = "btn btn-primary btn-sm"><i class = "icon md-edit"></i></button>
                                    <button type = "button" class = "btn btn-danger btn-sm"><i class = "icon md-delete"></i></button>
                                </td>
                            </tr>
                          <?php endfor;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page -->
    <?php $this->load->view("includes/footer");?>
    <!-- Core  -->
    <?php $this->load->view("includes/core-script");?>
    <script src="<?php echo base_url();?>global/vendor/datatables.net/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-buttons/dataTables.buttons.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-buttons/buttons.html5.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-buttons/buttons.flash.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-buttons/buttons.print.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-buttons/buttons.colVis.js"></script>
    <script src="<?php echo base_url();?>global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js"></script>
    <script src="<?php echo base_url();?>global/vendor/asrange/jquery-asRange.min.js"></script>
    <script src="<?php echo base_url();?>global/vendor/bootbox/bootbox.js"></script>


    <script src="<?php echo base_url();?>global/js/Plugin/datatables.js"></script>

  </body>
</html>

<div class="modal fade" id="examplePositionTop">
    <div class="modal-dialog modal-simple modal-top">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="exampleModalTitle">Tambah Produk</h4>
            </div>
            <form action="<?php echo base_url();?>produk/insert" autocomplete="off" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label" for="inputBasicFirstName">No. Katalog</label>
                        <input type="text" class="form-control" name="nokatalogproduk" placeholder="No. Katalog" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputBasicFirstName">Principal</label>
                        <input type="text" class="form-control" name="principalproduk" placeholder="Produk Principal" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputBasicFirstName">No. SAP</label>
                        <input type="text" class="form-control" name="nosapproduk" placeholder="No. SAP Produk" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputBasicFirstName">Nama Produk</label>
                        <input type="text" class="form-control" name="namaproduk" placeholder="Nama Produk" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputBasicFirstName">Kategori</label>
                        <input type="text" class="form-control" name="kategoriproduk" placeholder="Kategori" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputBasicFirstName">Price List</label>
                        <input type="text" class="form-control" name="pricelistproduk" placeholder="Price List" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputBasicFirstName">Harga Ekat</label>
                        <input type="text" class="form-control" name="hargaekatproduk" placeholder="Harga Ekat" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="inputBasicFirstName">Deskripsi</label>
                        <textarea class="form-control" name="deskripsiproduk" placeholder="Deskripsi" autocomplete="off"></textarea>
                    </div>
                    <div class="example-wrap">
                      <h4 class="example-title">Upload Foto Produk</h4>
                      <div class="form-group">
                        <div class="input-group input-group-file" data-plugin="inputGroupFile">
                          <input type="text" class="form-control" readonly="">
                          <div class="input-group-append">
                            <span class="btn btn-outline btn-file">
                              <i class="icon wb-upload" aria-hidden="true"></i>
                              <input type="file" name="foto" multiple="">
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
