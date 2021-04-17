
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
                <div class = "scroll-provinsi-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Provinsi</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for($a = 0; $a < count($provinsi); $a++):?>
                      <tr class = "provinsi_row" id = "provinsi_row<?php echo $a;?>">
                        <input type = "hidden" id = "id_provinsi<?php echo $a;?>" value = "<?php echo $provinsi[$a]["id_pk_provinsi"];?>">
                        <input type = "hidden" id = "nama_provinsi<?php echo $a;?>" value = "<?php echo $provinsi[$a]["provinsi_nama"];?>">
                        <input type = "hidden" id = "status_provinsi<?php echo $a;?>" value = "<?php echo $provinsi[$a]["provinsi_status"];?>">
                        <td id = "nama_provinsi_display<?php echo $a;?>" onclick = "load_kabupaten_provinsi('<?php echo $provinsi[$a]['provinsi_nama'];?>',<?php echo $provinsi[$a]['id_pk_provinsi'];?>)"><?php echo $provinsi[$a]["provinsi_nama"];?></td>
                        <td id = "status_provinsi_display<?php echo $a;?>" onclick = "load_kabupaten_provinsi('<?php echo $provinsi[$a]['provinsi_nama'];?>',<?php echo $provinsi[$a]['id_pk_provinsi'];?>)">
                          <?php if($provinsi[$a]["provinsi_status"] == "aktif"):?>
                          <button type = "button" class = "btn btn-success btn-sm">AKTIF</button>
                          <?php else:?>
                          <button type = "button" class = "btn btn-danger btn-sm">NONAKTIF</button>
                          <?php endif;?>
                        </td>
                        <td>
                          <button type = "button" onclick = "load_edit(<?php echo $a;?>)" class = "btn btn-primary btn-sm" data-target="#edit_provinsi" data-toggle="modal"><i class = "icon md-edit"></i></button>
                          <!-- Delete -->
                          <button type = "button" onclick = "load_delete(<?php echo $a;?>)" class = "btn btn-danger btn-sm" data-target="#delete_provinsi" data-toggle="modal"><i class = "icon md-delete"></i></button>
                        </td>
                      </tr>
                      <?php endfor;?>
                      <tr id = "tambah_provinsi_button_container">
                        <td colspan = 3>
                          <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "tambahRowProvinsi()">Tambah Provinsi</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6 col-sm-12">
            <div class="panel">
              <div class="panel-body">
                <div class = "scroll-provinsi-table-wrapper">
                  <table class="table table-hover table-striped w-full">
                    <thead>
                      <tr>
                        <th>Kabupaten</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id = "kabupaten_container">
                      <tr>
                        <td colspan = 3>Silahkan Pilih Provinsi Dahulu</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalTambahProvinsi">
      <div class="modal-dialog modal-simple modal-center">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleModalTitle">Tambah provinsi</h4>
          </div>
          <form action="<?php echo base_url();?>provinsi/insert" autocomplete="off" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label class="form-control-label" for="inputBasicFirstName">provinsiname</label>
                <input type="text" class="form-control" name="provinsiname" placeholder="provinsiname" autocomplete="off" required>
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
                <select onchange = "function1()" id = "select_access" class = "form-control" name = "role">
                  <option >Pilih</option>
                  <option value = "Administrator">Administrator</option>
                  <option value = "Sales Engineer">Sales Engineer</option>
                  <option value = "Supervisor">Supervisor</option>
                  <option value = "Area Sales manager">Area Sales Manager</option>
                  <option value = "Sales Manager">Sales Manager</option>
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
    $.ajax({
      url:"<?php echo base_url();?>ws/kabupaten/kabupaten_provinsi/"+provinsi,
      data:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        if(respond.length > 0){
          for(var a = 0; a<respond.length; a++){
            var button = "";
            if(respond[a]["kabupaten_status"] == "aktif"){
              button = "<button class = 'btn btn-success btn-sm'>AKTIF</button>";
            }
            else{
              button = "<button class = 'btn btn-danger btn-sm'>NONAKTIF</button>";
            }
            html += `
            <tr class = "kabupaten_row" id = "kabupaten_row${a}">
              <input type = "hidden" id = "id_kabupaten${a}" value = "${respond[a]["id_pk_kabupaten"]}">
              <input type = "hidden" id = "nama_kabupaten${a}" value = "${respond[a]["kabupaten_nama"]}">
              <input type = "hidden" id = "status_kabupaten${a}" value = "${respond[a]["kabupaten_status"]}">
              <td id = 'nama_kabupaten_display${a}' >${respond[a]["kabupaten_nama"]}</td>
              <td id = 'status_kabupaten_display${a}' >${button}</td>
              <td>
                <button type = "button" onclick = "load_edit_kabupaten(${a})" class = "btn btn-primary btn-sm" data-target="#edit_kabupaten" data-toggle="modal"><i class = "icon md-edit"></i></button>
                <button type = "button" onclick = "load_delete_kabupaten(${a})" class = "btn btn-danger btn-sm" data-target="#delete_kabupaten" data-toggle="modal"><i class = "icon md-delete"></i></button>
              </td>
            </tr>
            `
          }
        }
        else{
          html = "<tr><td colspan = '3'>Tidak ada kabupaten</td></tr>";
        }
        html += `
          <tr id = "tambah_kabupaten_button_container">
            <td colspan = '3'>
              <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "tambahRowKabupaten()">Tambah Kabupaten</button>
            </td>
          </tr>
        `;
        $("#kabupaten_container").html(html);
      }
    });
  }
</script>
<script>
  var row = 0;
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
          <button type = "button" class = "btn btn-success btn-sm" onclick = "submitProvinsiData(${row})"><i class = "icon md-check"></i></button>
        </td>
      </tr>
    `;
    $("#tambah_provinsi_button_container").before(html);
    row++;
  }
  function submitProvinsiData(row){
    var nama_provinsi = $("#nama_provinsi_insert"+row).val();
    var status_provinsi = $("#status_provinsi_insert"+row).val();
    $.ajax({
      url:"<?php echo base_url();?>ws/provinsi/create",
      type:"POST",
      dataType:"JSON",
      data:{
        "nama_provinsi":nama_provinsi,
        "status_provinsi": status_provinsi,
        "id_create":<?php echo $this->session->id_user;?>
      },
      success:function(respond){
        if(respond["status"] == "success"){
          var row_official = $(".provinsi_row").length;
          var button = "";
          if(status_provinsi == "aktif"){
            button = "<button class = 'btn btn-success btn-sm'>AKTIF</button>";
          }
          else{
            button = "<button class = 'btn btn-danger btn-sm'>NONAKTIF</button>";
          }
          var html = `
            <tr class = 'provinsi_row'>
              <input type = "hidden" id = "nama_provinsi${row_official}" value = "${nama_provinsi}">
              <input type = "hidden" id = "id_provinsi${row_official}" value = "${respond["last_id"]}">
              <input type = "hidden" id = "status_provinsi${row_official}" value = "${status_provinsi}">
              <td id = "nama_provinsi_display${row_official}">${nama_provinsi}</td>
              <td id = "status_provinsi_display${row_official}">${button}</td>
              <td>
                <button type = "button" class = "btn btn-primary btn-sm" data-target="#edit_provinsi" onclick = "load_edit(${row_official})" data-toggle="modal"><i class = "icon md-edit"></i></button>
                <button type = "button" class = "btn btn-danger btn-sm" data-target="#delete_provinsi" onclick = "load_delete(${row_official})" data-toggle="modal"><i class = "icon md-delete"></i></button>
              </td>
            </tr>
          `;
          $("#tambahRowProvinsi"+row).before(html);
          $("#tambahRowProvinsi"+row).remove();
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
          <button type = "button" class = "btn btn-success btn-sm" onclick = "submitKabupatenData(${row_kabupaten})"><i class = "icon md-check"></i></button>
        </td>
      </tr>
    `;
    $("#tambah_kabupaten_button_container").before(html);
    row_kabupaten++;
  }
  function submitKabupatenData(row){
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
        "id_provinsi": id_provinsi,
        "id_create":<?php echo $this->session->id_user;?>
      },
      success:function(respond){
        if(respond["status"] == "success"){
          var row_official = $(".kabupaten_row").length;
          var button = "";
          if(status_kabupaten == "aktif"){
            button = "<button class = 'btn btn-success btn-sm'>AKTIF</button>";
          }
          else{
            button = "<button class = 'btn btn-danger btn-sm'>NONAKTIF</button>";
          }
          var html = `
            <tr class = 'kabupaten_row'>
              <input type = "hidden" id = "id_kabupaten${row_official}" value = "${respond["last_id"]}">
              <input type = "hidden" id = "nama_kabupaten${row_official}" value = "${nama_kabupaten}">
              <input type = "hidden" id = "status_kabupaten${row_official}" value = "${status_kabupaten}">
              <td id = "nama_kabupaten_display${row_official}">${nama_kabupaten}</td>
              <td id = "status_kabupaten_display${row_official}">${button}</td>
              <td>
                <button type = "button" class = "btn btn-primary btn-sm" data-target="#edit_kabupaten" onclick = "load_edit(${row_official})" data-toggle="modal"><i class = "icon md-edit"></i></button>
                <button type = "button" class = "btn btn-danger btn-sm" data-target="#delete_kabupaten" onclick = "load_delete(${row_official})" data-toggle="modal"><i class = "icon md-delete"></i></button>
              </td>
            </tr>
          `;
          $("#tambahRowKabupaten"+row).before(html);
          $("#tambahRowKabupaten"+row).remove();
        }
      }
    }); 
  }
</script>
<script>
  var edited_row = 0;
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
        "status":status_provinsi_edit,
        "id_edit":<?php echo $this->session->id_user?>
      },
      success:function(respond){
        if(respond["status"] == "success"){
          $("#id_provinsi"+edited_row).val(id_provinsi_edit);
          $("#nama_provinsi"+edited_row).val(nama_provinsi_edit);
          $("#status_provinsi"+edited_row).val(status_provinsi_edit);
          $("#nama_provinsi_display"+edited_row).html(nama_provinsi_edit);
          var button = "";
          if(status_provinsi_edit == "aktif"){
            button = "<button class = 'btn btn-success btn-sm'>AKTIF</button>";
          }
          else{
            button = "<button class = 'btn btn-danger btn-sm'>NONAKTIF</button>";
          }
          $("#status_provinsi_display"+edited_row).html(button);
        }
        $("#edit_provinsi").modal("hide");
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
        "status":status_kabupaten_edit,
        "id_edit":<?php echo $this->session->id_user?>
      },
      success:function(respond){
        if(respond["status"] == "success"){
          $("#id_kabupaten"+edited_row).val(id_kabupaten_edit);
          $("#nama_kabupaten"+edited_row).val(nama_kabupaten_edit);
          $("#status_kabupaten"+edited_row).val(status_kabupaten_edit);
          $("#nama_kabupaten_display"+edited_row).html(nama_kabupaten_edit);
          var button = "";
          if(status_kabupaten_edit == "aktif"){
            button = "<button class = 'btn btn-success btn-sm'>AKTIF</button>";
          }
          else{
            button = "<button class = 'btn btn-danger btn-sm'>NONAKTIF</button>";
          }
          $("#status_kabupaten_display"+edited_row).html(button);
        }
        $("#edit_kabupaten").modal("hide");
      }
    });
  }
</script>
<script>
  var deleted_row = 0;
  function load_delete(row){
    deleted_row = row;
    var id = $("#id_provinsi"+row).val();
    $("#id_provinsi_delete").val(id);
  }
  function submit_delete(){
    var id = $("#id_provinsi_delete").val();
    $.ajax({
      url:"<?php echo base_url();?>ws/provinsi/delete?id="+id+"&id_delete=<?php echo $this->session->id_user;?>",
      type:"delete",
      dataType:"JSON",
      success:function(respond){
        if(respond["status"] == "success"){
          $("#provinsi_row"+deleted_row).remove();
          $("#delete_provinsi").model("hide");
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
      url:"<?php echo base_url();?>ws/kabupaten/delete?id="+id+"&id_delete=<?php echo $this->session->id_user;?>",
      type:"delete",
      dataType:"JSON",
      success:function(respond){
        if(respond["status"] == "success"){
          $("#kabupaten_row"+deleted_row).remove();
          $("#delete_kabupaten").model("hide");
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