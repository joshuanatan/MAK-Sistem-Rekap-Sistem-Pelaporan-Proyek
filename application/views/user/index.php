
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
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php $this->load->view("includes/navbar")?>

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
          <a class="btn btn-sm btn-default btn-outline btn-round" href="http://datatables.net"
            target="_blank">
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
            <h3 class="panel-title">Basic</h3>
          </header>
          <div class="panel-body">
            <button type = "button" class = "btn btn-primary btn-sm" data-target="#examplePositionTop" data-toggle="modal">Tambah User</button>
            <br/><br/>
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>ID User Level</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>No. Handphone</th>
                  <th>Status</th>
                  <th>Tanggal Registrasi</th>
                  <th>Tanggal Update</th>
                  <th>Tanggal Hapus</th>
                  <th>ID Registrasi</th>
                  <th>ID Update</th>
                  <th>ID Hapus</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php for($a = 0; $a < count($data_user); $a++):?>
                  <tr>
                      <td><?php echo $data_user[$a]["id_pk_user"];?></td>
                      <td><?php echo $data_user[$a]["id_fk_atasan"];?></td>
                      <td><?php echo $data_user[$a]["user_username"];?></td>
                      <td><?php echo $data_user[$a]["user_password"];?></td>
                      <td><?php echo $data_user[$a]["user_email"];?></td>
                      <td><?php echo $data_user[$a]["user_telepon"];?></td>
                      <td><?php echo $data_user[$a]["user_status"];?></td>
                      <td><?php echo $data_user[$a]["user_tgl_create"];?></td>
                      <td><?php echo $data_user[$a]["user_tgl_update"];?></td>
                      <td><?php echo $data_user[$a]["user_tgl_delete"];?></td>
                      <td><?php echo $data_user[$a]["user_id_create"];?></td>
                      <td><?php echo $data_user[$a]["user_id_update"];?></td>
                      <td><?php echo $data_user[$a]["user_id_delete"];?></td>
                      <td>
                          <!-- Edit -->
                          <button type = "button" class = "btn btn-primary btn-sm" data-target="#edit_user<?php echo $data_user[$a]["id_pk_user"];?>" data-toggle="modal"><i class = "icon md-edit"></i></button>
                            <div class="modal fade" id="edit_user<?php echo $data_user[$a]["id_pk_user"];?>">
                                <div class="modal-dialog modal-simple modal-top">
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
                                                  <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                  <label class="form-control-label" for="inputBasicFirstName">Password</label>
                                                  <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                  <label class="form-control-label" for="inputBasicFirstName">Email</label>
                                                  <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                  <label class="form-control-label" for="inputBasicFirstName">Telepon</label>
                                                  <input type="text" class="form-control" name="telepon" placeholder="Telepon" autocomplete="off">
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
                          <button type = "button" class = "btn btn-danger btn-sm" "btn btn-primary" data-target="#delete_user<?php echo $data_user[$a]["id_pk_user"];?>" data-toggle="modal"><i class = "icon md-delete"></i></button>
                            <div class="modal fade" id="delete_user<?php echo $data_user[$a]["id_pk_user"];?>" aria-labelledby="examplePositionCenter" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
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
                                    <a href="<?php echo base_url();?>user/delete/<?php echo $data_user[$a]["id_pk_user"];?>" class="btn btn-primary">Delete</a></button>
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
        <!-- End Panel Basic -->
      </div>
    </div>
    <!-- End Page -->

    <!-- Tambah User -->
    <div class="modal fade" id="examplePositionTop">
      <div class="modal-dialog modal-simple modal-top">
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
                  <select onchange = "function1()" id = "select_access">
                      <option >Pilih</option>
                      <option value = 1>Sales Engineer</option>
                      <option value = 2>Supervisor</option>
                      <option value = 3>Area Sales Manager</option>
                      <option value = 4>Sales Manager</option>
                  </select>
                </div>
                <div id="div_kabupaten" style="display:none">
                  <label class="form-control-label" for="inputBasicFirstName">Kabupaten</label>
                  <table id="table_kabupaten" class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                    <thead>
                      <tr>
                        <th>Kabupaten</th>
                        <th>Checklist</th>
                      </tr>
                    </thead>
                    <tbody id="tbody_data">
                    </tbody>
                  </table>
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
    <script src = "<?php echo base_url();?>asset_training/jquery-3.6.0.min.js"></script>
    <script>
    function function1(){
        $.ajax({
            url:"<?php echo base_url();?>ws/user/get_data_sales_engineer",
            type:"GET",
            dataType:"JSON",
            success:function(respond){
                $("#div_kabupaten").removeAttr("style");
                var html = "";
                for(var a = 0; a<respond.length; a++){
                    html += `<tr>
                                <td>${respond[a]}</td>
                                <td><input type="checkbox" value="${respond[a]}"></td>
                             </tr>`;
                }
                $("#tbody_data").html(html);
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
