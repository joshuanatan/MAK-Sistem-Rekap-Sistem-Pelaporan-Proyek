
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
                                <label class="form-control-label">Username</label>
                                <input type="text" class="form-control" name="username" value = "<?php echo $data_user[$a]["user_username"];?>" placeholder="Username" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="email" class="form-control" name="email" value = "<?php echo $data_user[$a]["user_email"];?>" placeholder="Email" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label">Telepon</label>
                                <input type="text" class="form-control" name="telepon" value = "<?php echo $data_user[$a]["user_telepon"];?>" placeholder="Telepon" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label class="form-control-label">Jabatan</label>
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
            <h4 class="modal-title">Tambah User</h4>
          </div>
          <form id = "insert_form">
            <div class="modal-body">
              <div class="form-group">
                <label class="form-control-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label class="form-control-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label class="form-control-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label class="form-control-label">Telepon</label>
                <input type="text" class="form-control" name="telepon" placeholder="Telepon" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label class="form-control-label">Jabatan</label>
                <br>
                <select onchange = "change_access()" id = "drop_access" class = "form-control" name = "role">
                  <option >Pilih</option>
                  <option value = "Administrator">Administrator</option>
                  <option value = "Sales Engineer">Sales Engineer</option>
                  <option value = "Supervisor">Supervisor</option>
                  <option value = "Area Sales Manager">Area Sales Manager</option>
                  <option value = "Sales Manager">Sales Manager</option>
                </select>
              </div>
              <div id="div_sales_engineer">
                <div class = "form-group">
                  <label class="form-control-label">Provinsi</label>
                  <br>
                  <select onchange = "sales_engineer_change_provinsi()" class = "form-control" id = "select_provinsi1">
                      <option>Pilih</option>
                      <?php for ($a = 0; $a < count($data_provinsi); $a++) : ?>
                      <option value = "<?php echo $data_provinsi[$a]["id_pk_provinsi"];?>"><?php echo $data_provinsi[$a]["provinsi_nama"];?></option>
                      <?php endfor; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Kabupaten</label>
                  <br>
                  <select onchange="sales_engineer_change_kabupaten()" class = "form-control" name= "kabupaten" id = "select_kabupaten">
                  </select>
                </div>
                <div class="form-group">
                  <h5>Daftar Rumah Sakit</h5>
                  <table class="table table-hover dataTable table-striped w-full">
                    <thead>
                      <tr>
                        <th>Checklist</th>
                        <th>Rumah Sakit</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Kategori</th>
                      </tr>
                    </thead>
                    <tbody id="table_rs">
                    </tbody>
                  </table>
                </div>
              </div>
              <div id="div_supervisor_asm">
                <div id="drop_provinsi">
                  <label class="form-control-label">Provinsi</label>
                  <br>
                  <select onchange = "function4()" id = "select_provinsi2">
                      <option>Pilih</option>
                    <?php for ($a = 0; $a < count($data_provinsi); $a++) : ?>
                      <option value = "<?php echo $data_provinsi[$a]["id_pk_provinsi"];?>"><?php echo $data_provinsi[$a]["provinsi_nama"];?></option>
                    <?php endfor; ?>
                  </select>
                </div>
                <div class="form-group">
                  <table class="table table-hover dataTable table-striped w-full">
                    <thead>
                      <tr>
                        <th>Checklist</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                      </tr>
                    </thead>
                    <tbody id="table_kabupaten">
                      <tr id = "tambah_kabupaten_supervisor_row_button_container">
                        <td colspan = "3"><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "tambah_kabupaten_supervisor_row()">Tambah Kabupaten</button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" onclick = "insert_row()" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php $this->load->view("includes/footer")?>
    <?php $this->load->view("includes/core-script")?>

    <script src="<?php echo base_url();?>global/vendor/asrange/jquery-asRange.min.js"></script>
    <script src="<?php echo base_url();?>global/vendor/bootbox/bootbox.js"></script>
  </body>
</html>

<script>
  $("#div_sales_engineer").hide();
  $("#div_supervisor_asm").hide();
  function change_access(){
    var jabatan = $("#drop_access").val();
    if (jabatan == "Sales Engineer") {
      $("#div_supervisor_asm").hide();
      $("#div_sales_engineer").show();
    }
    else if (jabatan == "Supervisor" || jabatan == "Area Sales Manager") {
      $("#div_sales_engineer").hide();
      $("#div_supervisor_asm").show();
    } 
    else {
      $("#div_sales_engineer").hide();
      $("#div_supervisor_asm").hide();
    }
  }
  function sales_engineer_change_provinsi(){
    var id_provinsi = $("#select_provinsi1").val();
    $.ajax({
      url:"<?php echo base_url();?>ws/user/data_kabupaten/"+id_provinsi,
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "<option value = 'none'>---- Pilih Kabupaten ----</option>";
        for(var a = 0; a<respond.length; a++){
          html += `<option value ="${respond[a]['id_pk_kabupaten']}">${respond[a]['kabupaten_nama']}</option>`;
        }
        $("#select_kabupaten").html(html);
      }
    });
  }
  function sales_engineer_change_kabupaten(){
    var id_kabupaten = $("#select_kabupaten").val();
    if(id_kabupaten != "none"){
      $.ajax({
        url:"<?php echo base_url();?>ws/user/data_rs/"+id_kabupaten,
        type:"GET",
        dataType:"JSON",
        success:function(respond){
          var html = "";
          for(var a = 0; a<respond.length; a++){
            html += `
              <tr>
                <td><input type="checkbox" value="${respond[a]['id_pk_rs']}" name = "se_rs[]"></td>
                <td>${respond[a]['rs_nama']}</td>
                <td>${respond[a]['rs_kelas']}</td>
                <td>${respond[a]['rs_alamat']}</td>
                <td>${respond[a]['rs_kategori']}</td>
              </tr>`;
          }
          $("#table_rs").html(html);
        }
      });
    }
  }
  var provinsi = <?php echo json_encode($data_provinsi);?>;
  var option_provinsi = "";
  for(var a = 0; a<provinsi.length; a++){
    option_provinsi += `
      <option value = "${provinsi[a]["id_pk_provinsi"]}">${provinsi[a]["provinsi_nama"]}</option>
    `;
  }
  function tambah_kabupaten_supervisor_row(){
    var count = $(".kabupaten_supervisor_row").length;
    var html = `
      <tr class = "kabupaten_supervisor_row">
        <td><input type = "checkbox" value = ${count} name = "kabupaten_supervisor_check[]"></td>
        <td><select class = "form-control" name = "provinsi${count}" id = "tambah_provinsi_row${count}">${option_provinsi}</select></td>
        <td><select class = "form-control" name = "kabupaten${count}" id = "tambah_kabupaten_row${count}"></select></td>
      </tr>
    `;
    $("#tambah_kabupaten_supervisor_row_button_container").before(html);
  }
  function function4(){
    var id_provinsi = $("#select_provinsi2").val();
      $.ajax({
          url:"<?php echo base_url();?>ws/user/data_kabupaten/"+id_provinsi,
          type:"GET",
          dataType:"JSON",
          success:function(respond){
              var html = "";
              for(var a = 0; a<respond.length; a++){
                  html += `<tr><td>${respond[a]['id_pk_kabupaten']}</td>
                          <td>${respond[a]['kabupaten_nama']}</td>
                          <td><input type="checkbox" value="${respond[a]['kabupaten_nama']}"></td></tr>`;
              }
              $("#table_kabupaten").html(html);
          }
      });
  }
</script>
<script>
  var base_url = "<?php echo base_url();?>";
  var kolom_pengurutan = "id_pk_produk";
  var arah_kolom_pengurutan = "ASC";
  var pencarian_phrase = "";
  var kolom_pencarian = "all";
  var current_page = 1;
  var content = [];
  /*reload_table();*/
  function change_kolom_pengurutan(){
    var pengurutan = $("#kolom_pengurutan").val();
    kolom_pengurutan = pengurutan;
    reload_table();
  }
  function change_arah_pengurutan(){
    var urutan = $("#urutan_kolom").val();
    arah_kolom_pengurutan = urutan;
    reload_table();
  }
  function change_pencarian(){
    var pencarian = $("#pencarian").val();
    pencarian_phrase = pencarian;
    reload_table();
  }
  function change_pencarian_kolom(){
    var pencarian_kolom = $("#pencarian_kolom").val();
    kolom_pencarian = pencarian_kolom;
    reload_table();
  }
  function change_pagination(page){
    current_page = page; 
    reload_table();
  }
  function reload_table(){
    var url = `<?php echo base_url();?>ws/produk/get_data?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url:url,
      type:"GET",
      dataType:"JSON",
      success:function(respond){  
        var html = "";
        content = respond["data"];
        for(var a = 0; a<respond["data"].length; a++){
          html += `
          <tr id = "produk_row${a}">
            <td>
              <a class="inline-block" href="${base_url}docs/upload/image/produk/${respond["data"][a]["produk_foto"]}" data-plugin="magnificPopup" data-close-btn-inside="false" data-fixed-contentPos="true" data-main-class="mfp-margin-0s mfp-with-zoom" data-zoom='{"enabled": "true","duration":"300"}'>
              <img class="img-fluid" src="${base_url}docs/upload/image/produk/${respond["data"][a]["produk_foto"]}" alt="..." width="220"/>
            </td>
            <td>${respond["data"][a]["produk_no_katalog"]}</td>
            <td>${respond["data"][a]["produk_principal"]}</td>
            <td>${respond["data"][a]["produk_no_sap"]}</td>
            <td>${respond["data"][a]["produk_nama"]}</td>
            <td>${respond["data"][a]["produk_kategori"]}</td>
            <td>${respond["data"][a]["produk_price_list"]}</td>
            <td>${respond["data"][a]["produk_harga_ekat"]}</td>
            <td>${respond["data"][a]["produk_deskripsi"]}</td>
            <td>
            <button type = "button" class = "btn btn-primary btn-sm" onclick = "load_edit(${a})"><i class = "icon md-edit"></i></button>
            <button type = "button" class = "btn btn-danger btn-sm" onclick = "load_delete(${a})"><i class = "icon md-delete"></i></button>
            </td>
          </tr>
          `;
        }
        $("#table_content_container").html(html);
        pagination(respond["page"]);
      }
    })

  }
  function pagination(page_rules){
    html = "";
    if(page_rules["previous"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination('+(page_rules["before"])+')"><</a></li>';
    }
    else{
        html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed"><</a></li>';
    }
    if(page_rules["first"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination('+(page_rules["first"])+')">'+(page_rules["first"])+'</a></li>';
        html += '<li class="page-item"><a class="page-link">...</a></li>';
    }
    if(page_rules["before"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination('+(page_rules["before"])+')">'+page_rules["before"]+'</a></li>';
    }
    html += '<li class="page-item active"><a class="page-link" onclick = "change_pagination('+(page_rules["current"])+')">'+page_rules["current"]+'</a></li>';
    if(page_rules["after"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination('+(page_rules["after"])+')">'+page_rules["after"]+'</a></li>';
    }
    if(page_rules["last"]){
        html += '<li class="page-item"><a class="page-link">...</a></li>';
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination('+(page_rules["last"])+')">'+page_rules["last"]+'</a></li>';
    }
    if(page_rules["next"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination('+(page_rules["after"])+')">></a></li>';
    }
    else{
        html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed">></a></li>';
    }
    $(".pagination").html(html);
  }
</script>
<script>
  function insert_row(){
    var fd = new FormData($("#insert_form")[0]);
    $.ajax({
      url:`${base_url}ws/user/insert/`,
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success:function(respond){
        $("#modalTambahUser").modal("hide");
        /*reload_table();*/
      }
    });
  }
</script>