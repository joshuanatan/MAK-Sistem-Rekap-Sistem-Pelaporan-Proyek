
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta");?>
    <?php $this->load->view("includes/core-head");?>
    <title>MAK-CRM | Master Rumah Sakit</title>
  </head>
  <body class="animsition site-navbar-small ">

    <?php $this->load->view("includes/navbar");?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/structure/pagination.css">
    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Data Rumah Sakit</h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
            <li class="breadcrumb-item active">Data Rumah Sakit</li>
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
                  <th>ID Rumah Sakit</th>
                  <th>Kode RS</th>
                  <th>Nama RS</th>
                  <th>Kelas</th>
                  <th>Direktur</th>
                  <th>Alamat</th>
                  <th>Kategori</th>
                  <th>Kabupaten</th>
                  <th>Kode Pos</th>
                  <th>Telepon</th>
                  <th>Fax</th>
                  <th>Jenis RS</th>
                  <th>Penyelenggara</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php for($a = 0; $a < count($datadb); $a++):?>
                  <tr>
                    <td><?php echo $datadb[$a]["id_pk_rs"];?></td>
                    <td><?php echo $datadb[$a]["rs_kode"];?></td>
                    <td><?php echo $datadb[$a]["rs_nama"];?></td>
                    <td><?php echo $datadb[$a]["rs_kelas"];?></td>
                    <td><?php echo $datadb[$a]["rs_direktur"];?></td>
                    <td><?php echo $datadb[$a]["rs_alamat"];?></td>
                    <td><?php echo $datadb[$a]["rs_kategori"];?></td>
                    <td><?php echo $datakabupaten[$a]["kabupaten_nama"];?></td>
                    <td><?php echo $datadb[$a]["rs_kode_pos"];?></td>
                    <td><?php echo $datadb[$a]["rs_telepon"];?></td>
                    <td><?php echo $datadb[$a]["rs_fax"];?></td>
                    <td><?php echo $datadb[$a]["id_fk_jenis_rs"];?></td>
                    <td><?php echo $datadb[$a]["id_fk_penyelenggara"];?></td>
                    <td>
                      <button type = "button" class = "btn btn-primary btn-sm" data-target="#editrs<?php echo $datadb[$a]["id_pk_rs"];?>" data-toggle="modal"><i class = "icon md-edit"></i></button>
                      <div class="modal fade" id="editrs<?php echo $datadb[$a]["id_pk_rs"];?>">
                        <div class="modal-dialog modal-simple modal-top">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="exampleModalTitle">Edit Rumah Sakit</h4>
                            </div>
                            <form action="<?php echo base_url();?>rumah_sakit/edit" autocomplete="off" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Kode Rumah Sakit</label>
                                  <input type="text" class="form-control" name="koderumahsakit" value="<?php echo $datadb[$a]["rs_kode"];?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Nama Rumah Sakit</label>
                                  <input type="text" class="form-control" name="namarumahsakit" value="<?php echo $datadb[$a]["rs_nama"];?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Kelas Rumah Sakit</label>
                                  <input type="text" class="form-control" name="kelasrumahsakit" value="<?php echo $datadb[$a]["rs_kelas"];?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Direktur</label>
                                  <input type="text" class="form-control" name="direktur" value="<?php echo $datadb[$a]["rs_direktur"];?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Alamat</label>
                                  <input type="text" class="form-control" name="alamat" value="<?php echo $datadb[$a]["rs_alamat"];?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Kategori</label>
                                  <input type="text" class="form-control" name="kategori" value="<?php echo $datadb[$a]["rs_kategori"];?>" autocomplete="off">
                                </div>
                                <!----------- ini belum bisa ------------>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Provinsi</label>
                                  <br>
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Kabupaten</label>
                                  <br>
                                </div>
                                <!----------- until here ------------>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Kode Pos</label>
                                  <input type="text" class="form-control" name="kodepos" value="<?php echo $datadb[$a]["rs_kode_pos"];?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Telepon</label>
                                  <input type="text" class="form-control" name="telepon" value="<?php echo $datadb[$a]["rs_telepon"];?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Fax</label>
                                  <input type="text" class="form-control" name="fax" value="<?php echo $datadb[$a]["rs_fax"];?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Jenis Rumah Sakit</label>
                                  <input type="text" class="form-control" name="jenisrumahsakit" value="<?php echo $datadb[$a]["id_fk_jenis_rs"];?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                  <label class="form-control-label" for="inputBasicFirstName">Penyelenggara</label>
                                  <input type="text" class="form-control" name="penyelenggara" value="<?php echo $datadb[$a]["id_fk_penyelenggara"];?>" autocomplete="off">
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

                      <button type = "button" class = "btn btn-danger btn-sm" "btn btn-primary" data-target="#examplePositionCenter<?php echo $datadb[$a]["id_pk_rs"];?>" data-toggle="modal"><i class = "icon md-delete"></i></button>

                      <div class="modal fade" id="examplePositionCenter<?php echo $datadb[$a]["id_pk_rs"];?>" aria-labelledby="examplePositionCenter" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
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
                              <a href="<?php echo base_url();?>produk/delete/<?php echo $datadb[$a]["id_pk_rs"];?>" class="btn btn-primary">Delete</a></button>
                            </div>
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

  </body>
  <script src="<?php echo base_url();?>asset_training/jquery-3.6.0.min.js"></script>
  <script>
  function function1(){
    var id_provinsi = $("#drop_provinsi").val();
      $.ajax({
          url:"<?php echo base_url();?>ws/rumah_sakit/data_kabupaten/"+id_provinsi,
          type:"GET",
          dataType:"JSON",
          success:function(respond){
              var html = "";
              for(var a = 0; a<respond.length; a++){
                  html += `<option value ="${respond[a]['id_pk_kabupaten']}">${respond[a]['kabupaten_nama']}</option>`;
              }
              $("#select1").html(html);
          }
      });

  }
  </script>
</html>

<div class="modal fade" id="examplePositionTop">
  <div class="modal-dialog modal-simple modal-top">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="exampleModalTitle">Tambah Rumah Sakit</h4>
      </div>
      <form action="<?php echo base_url();?>rumah_sakit/insert" autocomplete="off" method="post">
          <div class="modal-body">
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Kode Rumah Sakit</label>
                  <input type="text" class="form-control" name="koderumahsakit" placeholder="Kode Rumah Sakit" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Nama Rumah Sakit</label>
                  <input type="text" class="form-control" name="namarumahsakit" placeholder="Nama Rumah Sakit" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Kelas Rumah Sakit</label>
                  <input type="text" class="form-control" name="kelasrumahsakit" placeholder="Kelas Rumah Sakit" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Direktur</label>
                  <input type="text" class="form-control" name="direktur" placeholder="Direktur" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Alamat</label>
                  <input type="text" class="form-control" name="alamat" placeholder="Alamat" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Kategori</label>
                  <input type="text" class="form-control" name="kategori" placeholder="Kategori" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Provinsi</label>
                  <br>
                  <select onchange = "function1()" id="drop_provinsi">
                    <?php for($a = 0; $a < count($dataprovinsi); $a++):?>
                      <option value = "<?php echo $dataprovinsi[$a]["id_pk_provinsi"];?>"><?php echo $dataprovinsi[$a]["provinsi_nama"];?></option>
                      <?php endfor;?>
                  </select>
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Kabupaten</label>
                  <br>
                  <select name= "kabupaten" id = "select1">
                  </select>
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Kode Pos</label>
                  <input type="text" class="form-control" name="kodepos" placeholder="Kode Pos" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Telepon</label>
                  <input type="text" class="form-control" name="telepon" placeholder="Telepon" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Fax</label>
                  <input type="text" class="form-control" name="fax" placeholder="Fax" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Jenis Rumah Sakit</label>
                  <input type="text" class="form-control" name="jenisrumahsakit" placeholder="Jenis Rumah Sakit" autocomplete="off">
              </div>
              <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Penyelenggara</label>
                  <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara" autocomplete="off">
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
