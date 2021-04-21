
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta") ?>

    <title>MAK-CRM | Master User</title>

    <?php $this->load->view("includes/core-head") ?>
    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/tables/datatable.css">


    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url();?>global/fonts/font-awesome/font-awesome.css">


  </head>

  <body class="animsition site-navbar-small">
    <?php $this->load->view("includes/navbar")?>

    <div class="page">
      <div class="page-header">
        <h1 class="page-title">User</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </div>

      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <button type = "button" class = "btn btn-primary btn-sm" data-target="#modalTambahUser" data-toggle="modal">Tambah User</button>
            <br/><br/>
            <table class="table table-hover dataTable table-striped w-full">
              <thead>
                <tr>
                  <th>User Level</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>No. Handphone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php for($a = 0; $a < count($data_user); $a++):?>
                <tr>
                  <td><?php echo $data_user[$a]["user_role"];?></td>
                  <td><?php echo $data_user[$a]["user_username"];?></td>
                  <td><?php echo $data_user[$a]["user_email"];?></td>
                  <td><?php echo $data_user[$a]["user_telepon"];?></td>
                  <td>
                    <?php if($data_user[$a]["user_status"] == "aktif"):?>
                    <button type = "button" class = "btn btn-success btn-sm">AKTIF</button>
                    <?php else:?>
                    <button type = "button" class = "btn btn-danger btn-sm">NONAKTIF</button>
                    <?php endif;?>
                  </td>
                  <td>
                    <button type = "button" class = "btn btn-primary btn-sm" data-target="#edit_user<?php echo $data_user[$a]["id_pk_user"];?>" data-toggle="modal"><i class = "icon md-edit"></i></button>
                    <div class="modal fade" id="edit_user<?php echo $data_user[$a]["id_pk_user"];?>">
                      <div class="modal-dialog modal-simple modal-center">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalTitle">Edit User</h4>
                          </div>
                          <form action="<?php echo base_url();?>user/edit" autocomplete="off" method="post">
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="hidden" class="form-control" name="id_user" value="<?php echo $data_user[$a]["id_pk_user"];?>" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Username</label>
                                <input type="text" class="form-control" name="username" value = "<?php echo $data_user[$a]["user_username"];?>" placeholder="Username" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Email</label>
                                <input type="email" class="form-control" name="email" value = "<?php echo $data_user[$a]["user_email"];?>" placeholder="Email" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Telepon</label>
                                <input type="text" class="form-control" name="telepon" value = "<?php echo $data_user[$a]["user_telepon"];?>" placeholder="Telepon" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label" for="inputBasicFirstName">Jabatan</label>
                                <select onchange = "function1()" id = "select_access" class = "form-control" name = "role">
                                  <option >Pilih</option>
                                  <option value = "Administrator">Administrator</option>
                                  <option <?php if($data_user[$a]["user_status"] == "Sales Engineer") echo "selected";?>value = "Sales Engineer">Sales Engineer</option>
                                  <option <?php if($data_user[$a]["user_status"] == "Supervisor") echo "selected";?>value = "Supervisor">Supervisor</option>
                                  <option <?php if($data_user[$a]["user_status"] == "Area Sales manager") echo "selected";?>value = "Area Sales manager">Area Sales Manager</option>
                                  <option <?php if($data_user[$a]["user_status"] == "Sales Manager") echo "selected";?>value = "Sales Manager">Sales Manager</option>
                                </select>
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

                    <!-- Delete -->
                    <button type = "button" class = "btn btn-danger btn-sm" data-target="#delete_user<?php echo $data_user[$a]["id_pk_user"];?>" data-toggle="modal"><i class = "icon md-delete"></i></button>
                    <div class="modal fade" id="delete_user<?php echo $data_user[$a]["id_pk_user"];?>" aria-hidden="true">
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
                            <a href="<?php echo base_url();?>user/delete/<?php echo $data_user[$a]["id_pk_user"];?>" class="btn btn-primary">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
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

    <!-- Tambah User -->
    <div class="modal fade" id="modalTambahUser">
      <div class="modal-dialog modal-simple modal-center">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="exampleModalTitle">Tambah User</h4>
            </div>
            <form action="<?php echo base_url();?>user/insert" autocomplete="off" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Telepon</label>
                  <input type="text" class="form-control" name="telepon" placeholder="Telepon" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="inputBasicFirstName">Jabatan</label>
                  <br>
                  <select onchange = "function1()" id = "drop_access" name = "role">
                    <option >Pilih</option>
                    <option value = "Administrator">Administrator</option>
                    <option value = "Sales Engineer">Sales Engineer</option>
                    <option value = "Supervisor">Supervisor</option>
                    <option value = "Area Sales manager">Area Sales Manager</option>
                    <option value = "Sales Manager">Sales Manager</option>
                  </select>
                </div>
                <div id="div_sales_engineer" style="display:none;">
                  <div id="drop_provinsi">
                    <label class="form-control-label" for="inputBasicFirstName">Provinsi</label>
                    <br>
                    <select onchange = "function2()" id = "select_provinsi" name = "role">
                        <option>Pilih</option>
                      <?php for ($a = 0; $a < count($data_provinsi); $a++) : ?>
                        <option value = "<?php echo $data_provinsi[$a]["id_pk_provinsi"];?>"><?php echo $data_provinsi[$a]["provinsi_nama"];?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label class="form-control-label" for="inputBasicFirstName">Kabupaten</label>
                      <br>
                      <select onchange="function3()" name= "kabupaten" id = "select_kabupaten">
                      </select>
                  </div>
                  <div class="form-group">
                    <table class="table table-hover dataTable table-striped w-full">
                      <thead>
                        <tr>
                          <th>Rumah Sakit</th>
                          <th>Kelas</th>
                          <th>Alamat</th>
                          <th>Kategori</th>
                          <th>Checklist</th>
                        </tr>
                      </thead>
                      <tbody id="table_rs">

                      </tbody>
                    </table>
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

    <!-- Function -->
    <script>
    function function1(){
      var jabatan = $("#drop_access").val();
      if (jabatan == "Sales Engineer") {
        $.ajax({
            success:function(respond){
                $("#div_sales_engineer").removeAttr("style");
            }
        });
      } else {
        $("#div_sales_engineer").hide();
      }
    }

    function function2(){
      var id_provinsi = $("#select_provinsi").val();
        $.ajax({
            url:"<?php echo base_url();?>ws/user/data_kabupaten/"+id_provinsi,
            type:"GET",
            dataType:"JSON",
            success:function(respond){
                var html = "";
                for(var a = 0; a<respond.length; a++){
                    html += `<option value ="${respond[a]['id_pk_kabupaten']}">${respond[a]['kabupaten_nama']}</option>`;
                }
                $("#select_kabupaten").html(html);
            }
        });
    }

    function function3(){
      var id_kabupaten = $("#select_kabupaten").val();
        $.ajax({
            url:"<?php echo base_url();?>ws/user/data_rs/"+id_kabupaten,
            type:"GET",
            dataType:"JSON",
            success:function(respond){
                var html = "";
                for(var a = 0; a<respond.length; a++){
                    html += `<tr><td>${respond[a]['rs_nama']}</td>
                             <td>${respond[a]['rs_kelas']}</td>
                             <td>${respond[a]['rs_alamat']}</td>
                             <td>${respond[a]['rs_kategori']}</td>
                             <td><input type="checkbox" value="${respond[a]['rs_nama']}"></td></tr>`;
                }
                $("#table_rs").html(html);
            }
        });
    }
    </script>

    <!-- Footer -->
    <?php $this->load->view("includes/footer")?>
    <!-- Core  -->
    <?php $this->load->view("includes/core-script")?>

    <!-- Plugins -->
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

    <!-- Page -->

    <script src="<?php echo base_url();?>global/js/Plugin/datatables.js"></script>
    <script src="<?php echo base_url();?>assets/examples/js/tables/datatable.js"></script>

  </body>
</html>
