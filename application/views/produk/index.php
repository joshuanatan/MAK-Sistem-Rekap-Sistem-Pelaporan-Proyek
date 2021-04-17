
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta");?>
    <?php $this->load->view("includes/core-head");?>
    
    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/structure/pagination.css">
    <title>MAK-CRM | Master Produk</title>
  </head>
  <body class="animsition site-navbar-small ">

    <?php $this->load->view("includes/navbar");?>
    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Produk</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
          <li class="breadcrumb-item active">Produk</li>
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
              <!--
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
              -->
            </div>
            <table class="table table-hover dataTable table-striped w-full">
              <thead>
                <tr>
                  <th style = "width:20%">Image Produk</th>
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
                  <td>
                    <a class="inline-block" href="<?php echo base_url();?>docs/upload/image/produk/<?php echo $datadb[$a]["produk_foto"];?>" data-plugin="magnificPopup" data-close-btn-inside="false" data-fixed-contentPos="true" data-main-class="mfp-margin-0s mfp-with-zoom" data-zoom='{"enabled": "true","duration":"300"}'>
                      <img class="img-fluid" src="<?php echo base_url();?>docs/upload/image/produk/<?php echo $datadb[$a]["produk_foto"];?>" alt="..." width="220"/>
                    </a>
                  </td>
                  <td><?php echo strtoupper($datadb[$a]["produk_no_katalog"]);?></td>
                  <td><?php echo strtoupper($datadb[$a]["produk_principal"]);?></td>
                  <td><?php echo strtoupper($datadb[$a]["produk_no_sap"]);?></td>
                  <td><?php echo nl2br(ucwords($datadb[$a]["produk_nama"]));?></td>
                  <td><?php echo strtoupper($datadb[$a]["produk_kategori"]);?></td>
                  <td><?php echo number_format($datadb[$a]["produk_price_list"]);?></td>
                  <td><?php echo number_format($datadb[$a]["produk_harga_ekat"]);?></td>
                  <td><?php echo nl2br($datadb[$a]["produk_deskripsi"]);?></td>
                  <td>
                    <button type = "button" class = "btn btn-primary btn-sm" data-target="#editProduk<?php echo $datadb[$a]["id_pk_produk"];?>" data-toggle="modal"><i class = "icon md-edit"></i></button>

                    <div class="modal fade" id="editProduk<?php echo $datadb[$a]["id_pk_produk"];?>">
                      <div class="modal-dialog modal-simple modal-center">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalTitle">Edit Produk</h4>
                          </div>
                          <form action="<?php echo base_url();?>produk/edit" autocomplete="off" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="idproduk" value="<?php echo $datadb[$a]["id_pk_produk"];?>" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">No. Katalog</label>
                                <input type="text" class="form-control" name="nokatalogproduk" value="<?php echo $datadb[$a]["produk_no_katalog"];?>" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Principal</label>
                                <input type="text" class="form-control" name="principalproduk" value="<?php echo $datadb[$a]["produk_principal"];?>" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">No. SAP</label>
                                <input type="text" class="form-control" name="nosapproduk" value="<?php echo $datadb[$a]["produk_no_sap"];?>" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Nama Produk</label>
                                <textarea class="form-control" name="namaproduk"><?php echo $datadb[$a]["produk_nama"];?></textarea>
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Kategori</label>
                                <input type="text" class="form-control" name="kategoriproduk" value="<?php echo $datadb[$a]["produk_kategori"];?>" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Price List</label>
                                <input type="text" class="form-control" name="pricelistproduk" value="<?php echo $datadb[$a]["produk_price_list"];?>" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Harga Ekat</label>
                                <input type="text" class="form-control" name="hargaekatproduk" value="<?php echo $datadb[$a]["produk_harga_ekat"];?>" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Deskripsi</label>
                                <textarea class="form-control" name="deskripsiproduk" autocomplete="off"><?php echo $datadb[$a]["produk_deskripsi"];?></textarea>
                              </div>
                              <div class = "form-group">
                                <label>Foto Produk Saat Ini </label>
                                <br/>
                                <a class="inline-block" href="<?php echo base_url();?>docs/upload/image/produk/<?php echo $datadb[$a]["produk_foto"];?>" data-plugin="magnificPopup" data-close-btn-inside="false" data-fixed-contentPos="true" data-main-class="mfp-margin-0s mfp-with-zoom" data-zoom='{"enabled": "true","duration":"300"}'>
                                  <img class="img-fluid col-lg-6 col-sm-12" src="<?php echo base_url();?>docs/upload/image/produk/<?php echo $datadb[$a]["produk_foto"];?>" alt="..."/>
                                </a>
                                <br/>
                                <br/>
                                <label>Foto Produk Baru </label><br/>
                                <input type = "file" name = "foto_produk">
                                <input type = "hidden" name = "foto_produk_current" value = "<?php echo $datadb[$a]["produk_foto"];?>">
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

                    <button type = "button" class = "btn btn-danger btn-sm" data-target="#examplePositionCenter<?php echo $datadb[$a]["id_pk_produk"];?>" data-toggle="modal"><i class = "icon md-delete"></i></button>

                    <div class="modal fade" id="examplePositionCenter<?php echo $datadb[$a]["id_pk_produk"];?>" aria-labelledby="examplePositionCenter" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-simple modal-center">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">Confirmation Delete</h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you want to delete?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a href="<?php echo base_url();?>produk/delete/<?php echo $datadb[$a]["id_pk_produk"];?>" class="btn btn-primary">Delete</a></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endfor;?>
              </tbody>
            </table>
            <!--
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
            -->
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
        <h4 class="modal-title" id="exampleModalTitle">Tambah Produk</h4>
      </div>
      <form action="<?php echo base_url();?>produk/insert" autocomplete="off" method="post" enctype="multipart/form-data">
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
            <textarea class="form-control" name="namaproduk" placeholder="Nama Produk" rows = 4></textarea>
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
          <div class="form-group">
            <label class="form-control-label">Foto Produk</label><br/>
            <input type = "file" name = "foto_produk">
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
