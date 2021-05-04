<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta") ?>
    <title>MAK-CRM | Master provinsi</title>
    <?php $this->load->view("includes/core-head") ?>
    <link rel="stylesheet" href="<?php echo base_url();?>global/fonts/font-awesome/font-awesome.css">

    <style>
      .scroll-provinsi-table-wrapper{
        overflow-y:scroll;
        height:400px;
      }
    </style>
  </head>
  <body class="animsition site-navbar-small">
    <?php $this->load->view("includes/navbar")?>
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Provinsi & Kabupaten</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
          <li class="breadcrumb-item active">Provinsi & Kabupaten</li>
        </ol>
      </div>
      <div class="page-content container-fluid">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <div class="panel">
              <div class="panel-body">
                <div class = "row">
                  <div class = "form-group col-lg-3">
                    <h5>Kolom Pengurutan</h5>
                    <select class = "form-control" onchange = "change_kolom_pengurutan()" id = "kolom_pengurutan">
                      <?php for($a = 0; $a<count($field); $a++):?>
                      <option value = "<?php echo $field[$a]["field_value"];?>"><?php echo $field[$a]["field_text"];?></option>
                      <?php endfor;?>
                    </select>
                  </div>
                  <div class = "form-group col-lg-2">
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
                  <div class = "form-group col-lg-4">
                    <h5>Kolom Pencarian</h5>
                    <select class = "form-control" onchange = "change_pencarian_kolom()" id = "pencarian_kolom">
                      <option value = "all">Semua</option>
                      <?php for($a = 0; $a<count($field); $a++):?>
                      <option value = "<?php echo $field[$a]["field_value"];?>"><?php echo $field[$a]["field_text"];?></option>
                      <?php endfor;?>
                    </select>
                  </div>
                </div>
                <div class = "scroll-provinsi-table-wrapper">
                  <table class="table table-hover table-striped w-full" id = "table_content_container">
                    <thead>
                      <tr>
                        <th>Provinsi</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id = "tambah_provinsi_button_container">
                        <td colspan = 3>
                          <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "tambahRowProvinsi()">Tambah Provinsi</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <nav class = "d-flex justify-content-center">
                    <ul class="pagination" id = "pagination">
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6 col-sm-12">
            <div class="panel">
              <div class="panel-body">
                <div class = "row">
                  <div class = "form-group col-lg-3">
                    <h5>Kolom Pengurutan</h5>
                    <select class = "form-control" onchange = "change_kolom_pengurutan1()" id = "kolom_pengurutan1">
                      <?php for($a = 0; $a<count($field1); $a++):?>
                      <option value = "<?php echo $field1[$a]["field_value"];?>"><?php echo $field1[$a]["field_text"];?></option>
                      <?php endfor;?>
                    </select>
                  </div>
                  <div class = "form-group col-lg-2">
                    <h5>Urutan</h5>
                    <select class = "form-control" id = "urutan_kolom1" onchange = "change_arah_pengurutan1()">
                      <option value = "ASC">A-Z</option>
                      <option value = "DESC">Z-A</option>
                    </select>
                  </div>
                  <div class = "form-group col-lg-3">
                    <h5>Pencarian</h5>
                    <input type = "text" class = "form-control" onclick = "change_pencarian1()" oninput = "change_pencarian1()" id = "pencarian1">
                  </div>
                  <div class = "form-group col-lg-4">
                    <h5>Kolom Pencarian</h5>
                    <select class = "form-control" onchange = "change_pencarian_kolom1()" id = "pencarian_kolom1">
                      <option value = "all">Semua</option>
                      <?php for($a = 0; $a<count($field1); $a++):?>
                      <option value = "<?php echo $field1[$a]["field_value"];?>"><?php echo $field1[$a]["field_text"];?></option>
                      <?php endfor;?>
                    </select>
                  </div>
                </div>
                <div class = "scroll-provinsi-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Kabupaten</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id = "table_content_container1">
                      <tr>
                        <td colspan = 3>Silahkan Pilih Provinsi Dahulu</td>
                      </tr>
                    </tbody>
                  </table>
                  <nav class = "d-flex justify-content-center">
                    <ul class="pagination" id = "pagination1">
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
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
  var active_provinsi = "";
  var active_id_provinsi = "";
  function load_kabupaten_provinsi(provinsi,id_provinsi){
    active_provinsi = provinsi;
    active_id_provinsi = id_provinsi;
    reload_table1();
  }
</script>
<script>
  var row = 0;
  var edited_row = 0;
  var deleted_row = 0;
</script>
<script>
  function tambahRowProvinsi(){
    var html = `
      <tr id = "tambahRowProvinsi${row}">
        <td><input type = 'text' class = 'form-control' id = 'nama_provinsi_insert${row}'></td>
        <td>
          <select class = 'form-control' id = 'status_provinsi_insert${row}'>
            <option value = "aktif">AKTIF</option>
            <option value = "nonaktif">NONAKTIF</option>
        </td>
        <td>
          <button type = "button" class = "btn btn-success btn-sm" onclick = "submit_data_provinsi(${row})"><i class = "icon md-check"></i></button>
        </td>
      </tr>
    `;
    $("#tambah_provinsi_button_container").before(html);
    row++;
  }
  function submit_data_provinsi(row){
    var nama_provinsi = $("#nama_provinsi_insert"+row).val();
    var status_provinsi = $("#status_provinsi_insert"+row).val();
    $.ajax({
      url:"<?php echo base_url();?>ws/provinsi/create",
      type:"POST",
      dataType:"JSON",
      data:{
        "nama_provinsi":nama_provinsi,
        "status_provinsi": status_provinsi
      },
      success:function(respond){
        if(respond["status"]){
          $("#tambahRowProvinsi"+row).remove();
          alert("Provinsi Berhasil Ditambahkan");
          reload_table();
        }
        else{
          alert(respond["msg"]);
        }
      }
    }); 
  }
  function load_edit(row){
    edited_row = row;
    var id_provinsi = $("#id_provinsi"+row).val();
    var nama_provinsi = $("#nama_provinsi"+row).val();
    var status_provinsi = $("#status_provinsi"+row).val();
    $("#id_provinsi_edit").val(id_provinsi);
    $("#nama_provinsi_edit").val(nama_provinsi);
    $("#status_provinsi_edit").val(status_provinsi);
  }
  function submit_changes(){
    var id_provinsi_edit = $("#id_provinsi_edit").val();
    var nama_provinsi_edit = $("#nama_provinsi_edit").val();
    var status_provinsi_edit = $("#status_provinsi_edit").val();
    $.ajax({
      url:"<?php echo base_url();?>ws/provinsi/update",
      type:"POST",
      dataType:"JSON",
      data:{
        "id":id_provinsi_edit,
        "nama":nama_provinsi_edit,
        "status":status_provinsi_edit
      },
      success:function(respond){
        if(respond["status"]){
          reload_table();
          alert("Provinsi Berhasil Diubah");
          $("#edit_provinsi").modal("hide");
        }
        else{
          alert(respond["msg"]);
        }
      }
    });
  }
  function load_delete(row){
    deleted_row = row;
    var id = $("#id_provinsi"+row).val();
    $("#id_provinsi_delete").val(id);
  }
  function submit_delete(){
    var id = $("#id_provinsi_delete").val();
    $.ajax({
      url:"<?php echo base_url();?>ws/provinsi/delete?id="+id,
      type:"delete",
      dataType:"JSON",
      success:function(respond){
        if(respond["status"]){
          $("#provinsi_row"+deleted_row).remove();
          reload_table();
          $("#delete_provinsi").modal("hide");
        }
        else{
          alert("Provinsi Gagal Dihapus");
        }
      }
    });
  }
</script>
<script>
  var row_kabupaten = 0;
  function tambahRowKabupaten(){
    var html = `
      <tr id = "tambahRowKabupaten${row_kabupaten}">
        <td><input type = 'text' class = 'form-control' id = 'nama_kabupaten_insert${row_kabupaten}'></td>
        <td>
          <select class = 'form-control' id = 'status_kabupaten_insert${row_kabupaten}'>
            <option value = "aktif">AKTIF</option>
            <option value = "nonaktif">NONAKTIF</option>
        </td>
        <td>
          <button type = "button" class = "btn btn-success btn-sm" onclick = "submit_data_kabupaten(${row_kabupaten})"><i class = "icon md-check"></i></button>
        </td>
      </tr>
    `;
    $("#tambah_kabupaten_button_container").before(html);
    row_kabupaten++;
  }
  function submit_data_kabupaten(row){
    var nama_kabupaten = $("#nama_kabupaten_insert"+row).val();
    var status_kabupaten = $("#status_kabupaten_insert"+row).val();
    var id_provinsi = active_id_provinsi;
    $.ajax({
      url:"<?php echo base_url();?>ws/kabupaten/create",
      type:"POST",
      dataType:"JSON",
      data:{
        "nama_kabupaten":nama_kabupaten,
        "status_kabupaten": status_kabupaten,
        "id_provinsi": id_provinsi
      },
      success:function(respond){
        if(respond["status"]){
          $(`tambahRowKabupaten${row}`).remove();
          alert("Kabupaten Berhasil Ditambahkan");
          reload_table1();
        }
        else{
          alert(respond["msg"]);
        }
      }
    }); 
  }
  function load_edit_kabupaten(row){
    edited_row = row;
    var id_kabupaten = $("#id_kabupaten"+row).val();
    var nama_kabupaten = $("#nama_kabupaten"+row).val();
    var status_kabupaten = $("#status_kabupaten"+row).val();
    $("#id_kabupaten_edit").val(id_kabupaten);
    $("#nama_kabupaten_edit").val(nama_kabupaten);
    $("#status_kabupaten_edit").val(status_kabupaten);
  }
  function submit_changes_kabupaten(){
    var id_kabupaten_edit = $("#id_kabupaten_edit").val();
    var nama_kabupaten_edit = $("#nama_kabupaten_edit").val();
    var status_kabupaten_edit = $("#status_kabupaten_edit").val();
    $.ajax({
      url:"<?php echo base_url();?>ws/kabupaten/update",
      type:"POST",
      dataType:"JSON",
      data:{
        "id":id_kabupaten_edit,
        "nama":nama_kabupaten_edit,
        "status":status_kabupaten_edit
      },
      success:function(respond){
        if(respond["status"]){
          reload_table1();
          alert("Kabupaten Berhasil Diubah");
          $("#edit_kabupaten").modal("hide");
        }
        else{
          alert(respond["msg"]);
        }
      }
    });
  }
  function load_delete_kabupaten(row){
    deleted_row = row;
    var id = $("#id_kabupaten"+row).val();
    $("#id_kabupaten_delete").val(id);
  }
  function submit_delete_kabupaten(){
    var id = $("#id_kabupaten_delete").val();
    $.ajax({
      url:"<?php echo base_url();?>ws/kabupaten/delete?id="+id,
      type:"delete",
      dataType:"JSON",
      success:function(respond){
        if(respond["status"]){
          $("#kabupaten_row"+deleted_row).remove();
          $("#delete_kabupaten").modal("hide");
          reload_table1();
        }
        else{
          alert("Kabupaten Gagal Dihapus");
        }
      }
    });
  }
</script>
<div class="modal fade" id="edit_provinsi">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Edit provinsi</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="id_provinsi" id = "id_provinsi_edit">
        <div class="form-group">
          <label class="form-control-label">Nama Provinsi</label>
          <input type="text" class="form-control" name="provinsi" placeholder="Nama Provinsi" id = "nama_provinsi_edit">
        </div>
        <div class="form-group">
          <label class="form-control-label">Status Provinsi</label>
          <select class = "form-control" id = "status_provinsi_edit" name = "status">
            <option value = "aktif">AKTIF</option>
            <option value = "nonaktif">NONAKTIF</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" onclick = "submit_changes()">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete_provinsi">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Confirmation Delete</h4>
      </div>
      <div class="modal-body">
        <input type = "hidden" id = "id_provinsi_delete">
        <p>Are you sure you want to delete?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick = "submit_delete()">Hapus</button>
      </div>
    </div>
  </div>
</div>  
<div class="modal fade" id="edit_kabupaten">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Edit Kabupaten</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="id_kabupaten" id = "id_kabupaten_edit">
        <div class="form-group">
          <label class="form-control-label">Nama Kabupaten</label>
          <input type="text" class="form-control" name="kabupaten" placeholder="Nama kabupaten" id = "nama_kabupaten_edit">
        </div>
        <div class="form-group">
          <label class="form-control-label">Status Kabupaten</label>
          <select class = "form-control" id = "status_kabupaten_edit" name = "status">
            <option value = "aktif">AKTIF</option>
            <option value = "nonaktif">NONAKTIF</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" onclick = "submit_changes_kabupaten()">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete_kabupaten">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Confirmation Delete</h4>
      </div>
      <div class="modal-body">
        <input type = "hidden" id = "id_kabupaten_delete">
        <p>Are you sure you want to delete?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick = "submit_delete_kabupaten()">Hapus</button>
      </div>
    </div>
  </div>
</div>  
<script>
  var base_url = "<?php echo base_url();?>";
  var kolom_pengurutan = "id_pk_provinsi";
  var arah_kolom_pengurutan = "ASC";
  var pencarian_phrase = "";
  var kolom_pencarian = "all";
  var current_page = 1;
  var content = [];
  var ctrl = "provinsi";
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
    var url = `<?php echo base_url();?>ws/${ctrl}/get_data?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url:url,
      type:"GET",
      dataType:"JSON",
      success:function(respond){  
        var html = "";
        content = respond["data"];
        for(var a = 0; a<respond["data"].length; a++){
          html += `
          <tr class = "provinsi_row" id = "provinsi_row${a}">
            <input type = "hidden" id = "id_provinsi${a}" value = "${respond["data"][a]["id_pk_provinsi"]}">
            <input type = "hidden" id = "nama_provinsi${a}" value = "${respond["data"][a]["provinsi_nama"]}">
            <input type = "hidden" id = "status_provinsi${a}" value = "${respond["data"][a]["provinsi_status"]}">
            <td id = "nama_provinsi_display${a}" onclick = "load_kabupaten_provinsi('${respond["data"][a]['provinsi_nama']}',${respond["data"][a]['id_pk_provinsi']})">${respond["data"][a]["provinsi_nama"]}</td>
            <td id = "status_provinsi_display${a}" onclick = "load_kabupaten_provinsi('${respond["data"][a]['provinsi_nama']}',${respond["data"][a]['id_pk_provinsi']})">
              ${respond["data"][a]["provinsi_status"]}
            </td>
            <td>
              <button type = "button" onclick = "load_edit(${a})" class = "btn btn-primary btn-sm" data-target="#edit_provinsi" data-toggle="modal"><i class = "icon md-edit"></i></button>
              <!-- Delete -->
              <button type = "button" onclick = "load_delete(${a})" class = "btn btn-danger btn-sm" data-target="#delete_provinsi" data-toggle="modal"><i class = "icon md-delete"></i></button>
            </td>
          </tr>
          `;
        }
        $(".provinsi_row").remove();
        $("#tambah_provinsi_button_container").before(html);
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
    $("#pagination").html(html);
  }
</script>
<script>
  var base_url1 = "<?php echo base_url();?>";
  var kolom_pengurutan1 = "id_pk_kabupaten";
  var arah_kolom_pengurutan1 = "ASC";
  var pencarian_phrase1 = "";
  var kolom_pencarian1 = "all";
  var current_page1 = 1;
  var content1 = [];
  var ctrl1 = "kabupaten";
  function change_kolom_pengurutan1(){
    var pengurutan = $("#kolom_pengurutan1").val();
    kolom_pengurutan1 = pengurutan;
    reload_table1();
  }
  function change_arah_pengurutan1(){
    var urutan = $("#urutan_kolom1").val();
    arah_kolom_pengurutan1 = urutan;
    reload_table1();
  }
  function change_pencarian1(){
    var pencarian = $("#pencarian1").val();
    pencarian_phrase1 = pencarian;
    reload_table1();
  }
  function change_pencarian_kolom1(){
    var pencarian_kolom = $("#pencarian_kolom1").val();
    kolom_pencarian1 = pencarian_kolom;
    reload_table1();
  }
  function change_pagination1(page){
    current_page1 = page; 
    reload_table1();
  }
  function reload_table1(){
    var url = `<?php echo base_url();?>ws/${ctrl1}/get_data?kolom_pengurutan=${kolom_pengurutan1}&arah_kolom_pengurutan=${arah_kolom_pengurutan1}&pencarian_phrase=${pencarian_phrase1}&kolom_pencarian=${kolom_pencarian1}&current_page=${current_page1}&provinsi=${active_id_provinsi}`;
    $.ajax({
      url:url,
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        content1 = respond["data"];
        for(var a = 0; a<respond["data"].length; a++){
          html += `
          <tr class = "kabupaten_row" id = "kabupaten_row${a}">
            <input type = "hidden" id = "id_kabupaten${a}" value = "${respond["data"][a]["id_pk_kabupaten"]}">
            <input type = "hidden" id = "nama_kabupaten${a}" value = "${respond["data"][a]["kabupaten_nama"]}">
            <input type = "hidden" id = "status_kabupaten${a}" value = "${respond["data"][a]["kabupaten_status"]}">
            <td id = 'nama_kabupaten_display${a}'>${respond["data"][a]["kabupaten_nama"]}</td>
            <td id = 'status_kabupaten_display${a}'>${respond["data"][a]["kabupaten_status"]}</td>
            <td>
              <button type = "button" onclick = "load_edit_kabupaten(${a})" class = "btn btn-primary btn-sm" data-target="#edit_kabupaten" data-toggle="modal"><i class = "icon md-edit"></i></button>
              <button type = "button" onclick = "load_delete_kabupaten(${a})" class = "btn btn-danger btn-sm" data-target="#delete_kabupaten" data-toggle="modal"><i class = "icon md-delete"></i></button>
            </td>
          </tr>
          `
        }
        html += `
          <tr id = "tambah_kabupaten_button_container">
            <td colspan = '3'>
              <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "tambahRowKabupaten()">Tambah Kabupaten</button>
            </td>
          </tr>
        `;
        $("#table_content_container1").html(html);
        pagination1(respond["page"]);
      }
    })

  }
  function pagination1(page_rules){
    html = "";
    if(page_rules["previous"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination1('+(page_rules["before"])+')"><</a></li>';
    }
    else{
        html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed"><</a></li>';
    }
    if(page_rules["first"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination1('+(page_rules["first"])+')">'+(page_rules["first"])+'</a></li>';
        html += '<li class="page-item"><a class="page-link">...</a></li>';
    }
    if(page_rules["before"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination1('+(page_rules["before"])+')">'+page_rules["before"]+'</a></li>';
    }
    html += '<li class="page-item active"><a class="page-link" onclick = "change_pagination1('+(page_rules["current"])+')">'+page_rules["current"]+'</a></li>';
    if(page_rules["after"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination1('+(page_rules["after"])+')">'+page_rules["after"]+'</a></li>';
    }
    if(page_rules["last"]){
        html += '<li class="page-item"><a class="page-link">...</a></li>';
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination1('+(page_rules["last"])+')">'+page_rules["last"]+'</a></li>';
    }
    if(page_rules["next"]){
        html += '<li class="page-item"><a class="page-link" onclick = "change_pagination1('+(page_rules["after"])+')">></a></li>';
    }
    else{
        html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed">></a></li>';
    }
    $("#pagination1").html(html);
  }
</script>