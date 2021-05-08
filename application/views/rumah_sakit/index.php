
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
        <h1 class="page-title">Rumah Sakit</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>welcome/home">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
          <li class="breadcrumb-item active">Rumah Sakit</li>
        </ol>
      </div>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <div class = "row">
              <div class = "form-group col-lg-1">
                <h5>&nbsp;</h5>
                <button type = "button" class = "btn btn-primary btn-sm" data-target="#createModal" data-toggle="modal">Tambah Data</button>
              </div>
              <div class = "form-group col-lg-2"></div>
              <div class = "form-group col-lg-3">
                <h5>Kolom Pengurutan</h5>
                <select class = "form-control" onchange = "change_kolom_pengurutan()" id = "kolom_pengurutan">
                  <?php for($a = 0; $a<count($field); $a++):?>
                  <option value = "<?php echo $field[$a]["field_value"];?>"><?php echo $field[$a]["field_text"];?></option>
                  <?php endfor;?>
                </select>
              </div>
              <div class = "form-group col-lg-1">
                <h5>Urutan</h5>
                <select class = "form-control" id = "urutan_kolom" onchange = "change_arah_pengurutan()" id = "urutan_kolom">
                  <option value = "ASC">A-Z</option>
                  <option value = "DESC">Z-A</option>
                </select>
              </div>
              <div class = "form-group col-lg-3">
                <h5>Pencarian</h5>
                <input type = "text" class = "form-control" onclick = "change_pencarian()" oninput = "change_pencarian()" id = "pencarian">
              </div>
              <div class = "form-group col-lg-2">
                <h5>Kolom Pencarian</h5>
                <select class = "form-control" onchange = "change_pencarian_kolom()" id = "pencarian_kolom">
                  <option value = "all">Semua</option>
                  <?php for($a = 0; $a<count($field); $a++):?>
                  <option value = "<?php echo $field[$a]["field_value"];?>"><?php echo $field[$a]["field_text"];?></option>
                  <?php endfor;?>
                </select>
              </div>
            </div>
            <div class = "table-responsive">
              <table class="table table-hover dataTable table-striped w-full">
                <thead>
                  <tr>
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
                <tbody id = "table_content_container">
                </tbody>
              </table>
            </div>
            <nav class = "d-flex justify-content-center">
              <ul class="pagination">
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

<div class="modal fade" id="deleteModal">
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
        <button class="btn btn-primary" id = "button_delete">Delete</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="createModal">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Tambah Rumah Sakit</h4>
      </div>
      <form id = "createForm" >
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">Kode Rumah Sakit</label>
            <input type="text" class="form-control" name="koderumahsakit" placeholder="Kode Rumah Sakit">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Rumah Sakit</label>
            <input type="text" class="form-control" name="namarumahsakit" placeholder="Nama Rumah Sakit" required>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kelas Rumah Sakit</label>
            <br>
            <select class="form-control" name="kelasrumahsakit">
              <option value="none" selected disabled hidden>-- Silahkan Pilih Kelas --</option>
              <option value="Belum Ditentukan">Belum Ditentukan</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Direktur</label>
            <input type="text" class="form-control" name="direktur" placeholder="Direktur">
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat</label>
            <textarea type="text" class="form-control" name="alamat" placeholder="Alamat"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kategori</label>
            <br>
            <select class="form-control" name="kategori">
              <option value="none" selected disabled hidden>-- Silahkan Pilih Kategori --</option>
              <option value="Pemerintah">Pemerintah</option>
              <option value="Swasta">Swasta</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Provinsi</label> <strong><a href = "<?php echo base_url();?>provinsi" target = "_blank">Buka Provinsi</a></strong>
            <div class = "row">
              <div class = "col-lg-2">
                <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "load_provinsi()"><i class = "icon md-refresh"></i></button>
              </div>
              <div class = "col-lg-10">
                <select class="form-control" onchange = "load_kabupaten_provinsi()" id="rs_provinsi">
                  <option value="none" selected disabled hidden>-- Silahkan Pilih Provinsi --</option>
                  <?php for($a = 0; $a < count($dataprovinsi); $a++):?>
                    <option value = "<?php echo $dataprovinsi[$a]["id_pk_provinsi"];?>"><?php echo $dataprovinsi[$a]["provinsi_nama"];?></option>
                    <?php endfor;?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kabupaten</label> <strong><a href = "<?php echo base_url();?>provinsi" target = "_blank">Buka Kabupaten</a></strong>
            <div class = "row">
              <div class = "col-lg-2">
                <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "load_kabupaten_provinsi()"><i class = "icon md-refresh"></i></button>
              </div>
              <div class = "col-lg-10">
                <select class="form-control" name= "kabupaten" id = "rs_kabupaten">
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kode Pos</label>
            <input type="text" class="form-control" name="kodepos" placeholder="Kode Pos">
          </div>
          <div class="form-group">
            <label class="form-control-label">Telepon</label>
            <input type="text" class="form-control" name="telepon" placeholder="Telepon">
          </div>
          <div class="form-group">
            <label class="form-control-label">Fax</label>
            <input type="text" class="form-control" name="fax" placeholder="Fax">
          </div>
          <div class="form-group">
            <label class="form-control-label">Jenis Rumah Sakit</label> <strong><a href = "<?php echo base_url();?>jenis_rs" target = "_blank">Buka Jenis Rumah Sakit</a></strong>
            <br/>
            <div class = "row">
              <div class = "col-lg-2">
                <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "load_jenis_rumah_sakit()"><i class = "icon md-refresh"></i></button>
              </div>
              <div class = "col-lg-10">
                <select class="form-control dropdown_jenis" name="jenisrumahsakit" class = "">
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Penyelenggara</label> <strong><a href = "<?php echo base_url();?>penyelenggara" target = "_blank">Buka Daftar Penyelenggara</a></strong>
            <br/>
            <div class = "row">
              <div class = "col-lg-2">
                <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "load_penyelenggara()"><i class = "icon md-refresh"></i></button>
              </div>
              <div class = "col-lg-10">
                <select class="form-control dropdown_penyelenggara" name="penyelenggara" class = "">
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" onclick = "create_row()" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editModal">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Update Rumah Sakit</h4>
      </div>
      <form id = "updateForm" >
        <div class="modal-body">
          <input type = "hidden" id = "edit_idrumahsakit" name = "id_pk_rs">
          <div class="form-group">
            <label class="form-control-label">Kode Rumah Sakit</label>
            <input type="text" class="form-control" id = "edit_koderumahsakit" name="koderumahsakit" placeholder="Kode Rumah Sakit">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Rumah Sakit</label>
            <input type="text" class="form-control" id = "edit_namarumahsakit" name="namarumahsakit" placeholder="Nama Rumah Sakit" required>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kelas Rumah Sakit</label>
            <br>
            <select class="form-control" id = "edit_kelasrumahsakit" name="kelasrumahsakit">
              <option value="none" selected disabled hidden>-- Silahkan Pilih Kelas --</option>
              <option value="Belum Ditentukan">Belum Ditentukan</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Direktur</label>
            <input type="text" class="form-control" id = "edit_direktur" name="direktur" placeholder="Direktur">
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat</label>
            <textarea type="text" class="form-control" id = "edit_alamat" name="alamat" placeholder="Alamat"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kategori</label>
            <br>
            <select class="form-control" id = "edit_kategori" name="kategori">
              <option value="none" selected disabled hidden>-- Silahkan Pilih Kategori --</option>
              <option value="Pemerintah">Pemerintah</option>
              <option value="Swasta">Swasta</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Provinsi</label> <strong><a href = "<?php echo base_url();?>provinsi" target = "_blank">Buka Provinsi</a></strong>
            <div class = "row">
              <div class = "col-lg-2">
                <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "load_provinsi()"><i class = "icon md-refresh"></i></button>
              </div>
              <div class = "col-lg-10">
                <select class="form-control" onchange = "load_kabupaten_provinsi(true)" id="edit_provinsi">
                  <option value="none" selected disabled hidden>-- Silahkan Pilih Provinsi --</option>
                  <?php for($a = 0; $a < count($dataprovinsi); $a++):?>
                  <option value = "<?php echo $dataprovinsi[$a]["id_pk_provinsi"];?>"><?php echo $dataprovinsi[$a]["provinsi_nama"];?></option>
                  <?php endfor;?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kabupaten</label> <strong><a href = "<?php echo base_url();?>provinsi" target = "_blank">Buka Kabupaten</a></strong>
            <div class = "row">
              <div class = "col-lg-2">
                <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "load_kabupaten_provinsi(true)"><i class = "icon md-refresh"></i></button>
              </div>
              <div class = "col-lg-10">
                <select class="form-control" id = "edit_kabupaten" name= "kabupaten">
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kode Pos</label>
            <input type="text" class="form-control" id = "edit_kodepos" name="kodepos" placeholder="Kode Pos">
          </div>
          <div class="form-group">
            <label class="form-control-label">Telepon</label>
            <input type="text" class="form-control" id = "edit_telepon" name="telepon" placeholder="Telepon">
          </div>
          <div class="form-group">
            <label class="form-control-label">Fax</label>
            <input type="text" class="form-control" id = "edit_fax" name="fax" placeholder="Fax">
          </div>
          <div class="form-group">
            <label class="form-control-label">Jenis Rumah Sakit</label> <strong><a href = "<?php echo base_url();?>jenis_rs" target = "_blank">Buka Jenis Rumah Sakit</a></strong>
            <br/>
            <div class = "row">
              <div class = "col-lg-2">
                <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "load_jenis_rumah_sakit()"><i class = "icon md-refresh"></i></button>
              </div>
              <div class = "col-lg-10">
                <select class="form-control dropdown_jenis" id = "edit_jenisrumahsakit" name="jenisrumahsakit">
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Penyelenggara</label> <strong><a href = "<?php echo base_url();?>penyelenggara" target = "_blank">Buka Daftar Penyelenggara</a></strong>
            <br/>
            <div class = "row">
              <div class = "col-lg-2">
                <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "load_penyelenggara()"><i class = "icon md-refresh"></i></button>
              </div>
              <div class = "col-lg-10">
                <select class="form-control dropdown_penyelenggara" id = "edit_penyelenggara" name="penyelenggara">
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" onclick = "update_row()" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function load_kabupaten_provinsi(edit = false){
    var id_provinsi = "";
    if(edit){
      id_provinsi = $("#edit_provinsi option:selected").val();
    }
    else{
      id_provinsi = $("#rs_provinsi option:selected").val();
    }
    $.ajax({
      url:"<?php echo base_url();?>ws/kabupaten/kabupaten_provinsi/"+id_provinsi,
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          html += `<option value ="${respond[a]['id_pk_kabupaten']}">${respond[a]['kabupaten_nama']}</option>`;
        }
        if(edit){
          $("#edit_kabupaten").html(html);
        }
        else{
          $("#rs_kabupaten").html(html);
        }
      }
    });
  }
  function load_provinsi(edit = false){
    $.ajax({
      url:"<?php echo base_url();?>ws/provinsi/get_active_data",
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = ``;
        for(var a = 0; a<respond["data"].length; a++){
          html += `
          <option value = "${respond["data"][a]["id_pk_provinsi"]}">${respond["data"][a]["provinsi_nama"]}</option>
          `;
        }
        if(edit){
          $("#edit_provinsi").html(html);
        }
        else{
          $("#rs_provinsi").html(html);
        }
      }
    })
  }
  </script>
<script>
  function load_edit(row){
    $.ajax({
      url:"<?php echo base_url();?>ws/kabupaten/kabupaten_provinsi/"+content[row]["id_fk_provinsi"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          html += `<option value ="${respond[a]['id_pk_kabupaten']}">${respond[a]['kabupaten_nama']}</option>`;
        }
        $("#edit_kabupaten").html(html);
        $("#edit_kabupaten").val(content[row]["id_fk_kabupaten"]);
      }
    });

    $("#edit_idrumahsakit").val(content[row]["id_pk_rs"]);
    $("#edit_koderumahsakit").val(content[row]["rs_kode"]);
    $("#edit_namarumahsakit").val(content[row]["rs_nama"]);
    $("#edit_kelasrumahsakit").val(content[row]["rs_kelas"]);
    $("#edit_direktur").val(content[row]["rs_direktur"]);
    $("#edit_alamat").val(content[row]["rs_alamat"]);
    $("#edit_kategori").val(content[row]["rs_kategori"]);
    $("#edit_provinsi").val(content[row]["id_fk_provinsi"]);
    $("#edit_kodepos").val(content[row]["rs_kode_pos"]);
    $("#edit_telepon").val(content[row]["rs_telepon"]);
    $("#edit_fax").val(content[row]["rs_fax"]);
    $("#edit_jenisrumahsakit").val(content[row]["id_fk_jenis_rs"]);
    $("#edit_penyelenggara").val(content[row]["id_fk_penyelenggara"]);

    $("#editModal").modal("show");
  }
  function load_delete(row){
    $("#button_delete").attr("onclick",`delete_row(${row})`);
    $("#deleteModal").modal("show");
  }
  var create_rumah_sakit_form = $("#createForm").html();
  function create_row(){
    var fd = new FormData($("#createForm")[0]);
    $.ajax({
      url:"<?php echo base_url();?>ws/rumah_sakit/insert",
      type:"POST",
      dataType:"JSON",
      data:fd,
      contentType: false,
      processData: false,
      success:function(respond){
        if(respond["status"]){
          $("#createForm").html(create_rumah_sakit_form);
          alert("Data Rumah Sakit Berhasil Ditambahkan");
          $("#createModal").modal("hide");
          reload_table();
        }
        else{
          alert(respond["msg"]);
        }
      }
    });
  }
  function update_row(){
    var fd = new FormData($("#updateForm")[0]);
    $.ajax({
      url:"<?php echo base_url();?>ws/rumah_sakit/update",
      type:"POST",
      dataType:"JSON",
      data:fd,
      contentType: false,
      processData: false,
      success:function(respond){
        if(respond["status"]){
          $("#editModal").modal("hide");
          alert("Data Rumah Sakit Berhasil Diubah");
          reload_table();
        }
        else{
          alert(respond["msg"]);
        }
      }
    });
  }
  function delete_row(row){
    var id_rumah_sakit = content[row]["id_pk_rs"];
    $.ajax({
      url:`<?php echo base_url();?>ws/rumah_sakit/delete/${id_rumah_sakit}`,
      type:"DELETE",
      dataType:"JSON",
      success:function(respond){
        if(respond["status"]){
          $("#deleteModal").modal("hide");
          alert("Data Rumah Sakit Berhasil Dihapus");
          $(`#rumah_sakit_row${row}`).remove();
        }
        else{
          alert("Data Rumah Sakit Gagal Dihapus");
        }
      }
    });
  }
</script>
<script id = "script core">
  var base_url = "<?php echo base_url();?>";
  var kolom_pengurutan = "id_pk_rs";
  var arah_kolom_pengurutan = "ASC";
  var pencarian_phrase = "";
  var kolom_pencarian = "all";
  var current_page = 1;
  var content = [];
  reload_table();
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
    var url = `<?php echo base_url();?>ws/rumah_sakit/get_data?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url:url,
      type:"GET",
      dataType:"JSON",
      success:function(respond){  
        var html = "";
        content = respond["data"];
        for(var a = 0; a<respond["data"].length; a++){
          html += `
          <tr class = "rumah_sakit_row" id = "rumah_sakit_row${a}">
            <td>${respond["data"][a]["rs_kode"]}</td>
            <td>${respond["data"][a]["rs_nama"]}</td>
            <td>${respond["data"][a]["rs_kelas"]}</td>
            <td>${respond["data"][a]["rs_direktur"]}</td>
            <td>${respond["data"][a]["rs_alamat"]}</td>
            <td>${respond["data"][a]["rs_kategori"]}</td>
            <td>${respond["data"][a]["nama_kabupaten"]}</td>
            <td>${respond["data"][a]["rs_kode_pos"]}</td>
            <td>${respond["data"][a]["rs_telepon"]}</td>
            <td>${respond["data"][a]["rs_fax"]}</td>
            <td>${respond["data"][a]["jenis_rs"]}</td>
            <td>${respond["data"][a]["penyelenggara"]}</td>
            <td>
              <button type = "button" onclick = "load_edit(${a})" class = "btn btn-primary btn-sm"><i class = "icon md-edit"></i></button>
              <button type = "button" onclick = "load_delete(${a})" class = "btn btn-danger btn-sm"><i class = "icon md-delete"></i></button>
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
<script id = "script load jenis rs dan penyelenggara">
  load_jenis_rumah_sakit();
  function load_jenis_rumah_sakit(){
    $.ajax({
      url:"<?php echo base_url();?>ws/rumah_sakit/get_jenis_rumah_sakit",
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond["data"].length; a++){
          html += `
          <option value = ${respond["data"][a]["id_pk_jenis_rs"]}>(${respond["data"][a]["jenis_rs_kode"]}) ${respond["data"][a]["jenis_rs_nama"]}</option>
          `;
        }
        $(".dropdown_jenis").html(html);
      }
    })
  }
  load_penyelenggara();
  function load_penyelenggara(){
    $.ajax({
      url:"<?php echo base_url();?>ws/rumah_sakit/get_penyelenggara",
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond["data"].length; a++){
          html += `
          <option value = ${respond["data"][a]["id_pk_penyelenggara"]}>${respond["data"][a]["penyelenggara_nama"]}</option>
          `;
        }
        $(".dropdown_penyelenggara").html(html);
      }
    })
  }
</script>
