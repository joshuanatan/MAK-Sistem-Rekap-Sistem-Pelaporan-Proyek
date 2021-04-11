
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta");?>
    <?php $this->load->view("includes/core-head");?>
    <title>MAK-CRM | Master Produk</title>
  </head>
  <body class="animsition site-navbar-small ">
    
    <?php $this->load->view("includes/navbar");?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/structure/pagination.css">
    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">DataTables</h1>
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
        <div class="panel">
          <div class="panel-body">
            <div class = "row">
              <div class = "form-group col-lg-1">
                <h5>&nbsp;</h5>
                <button type = "button" class = "btn btn-primary btn-sm" data-target="#examplePositionTop" data-toggle="modal">Tambah Data</button>
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
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Deskripsi Barang</th>
                  <th>...</th>
                  <th>...</th>
                  <th>...</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <button type = "button" class = "btn btn-primary btn-sm"><i class = "icon md-edit"></i></button>
                    <button type = "button" class = "btn btn-danger btn-sm"><i class = "icon md-delete"></i></button>
                  </td>
                </tr>
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
    
  </body>
</html>

<div class="modal fade" id="examplePositionTop">
  <div class="modal-dialog modal-simple modal-top">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="exampleModalTitle">Modal Title</h4>
      </div>
      <form autocomplete="off">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">First Name</label>
            <input type="text" class="form-control" name="inputFirstName" placeholder="First Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">First Name</label>
            <input type="text" class="form-control" name="inputFirstName" placeholder="First Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">First Name</label>
            <input type="text" class="form-control" name="inputFirstName" placeholder="First Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">First Name</label>
            <textarea class="form-control" name="inputFirstName" placeholder="First Name" autocomplete="off"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>