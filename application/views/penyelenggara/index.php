
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta");?>
    <?php $this->load->view("includes/core-head");?>

    <link rel="stylesheet" href="<?php echo base_url();?>global/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/structure/pagination.css">
    <title>MAK-CRM | Master Penyelenggara</title>
  </head>
  <body class="animsition site-navbar-small ">

    <?php $this->load->view("includes/navbar");?>
    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Penyelenggara</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
          <li class="breadcrumb-item active">Penyelenggara</li>
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
              <div class = "form-group col-lg-1">
              </div>
              <div class = "form-group col-lg-1"></div>
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
            <table class="table table-hover dataTable table-striped w-full" id = "table_content_container">
              <thead>
                <tr>
                  <th>Nama Penyelenggara</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php for($a = 0; $a < count($datadb); $a++):?>
                <tr>
                  <td><?php echo strtoupper($datadb[$a]["penyelenggara_nama"]);?></td>
                  <td><?php if($datadb[$a]["penyelenggara_status"] == "aktif"):?>
                    <button type = "button" class = "btn btn-success btn-sm">AKTIF</button>
                    <?php else:?>
                    <button type = "button" class = "btn btn-danger btn-sm">NONAKTIF</button>
                    <?php endif;?>
                  </td>
                  <td>
                    <button type = "button" class = "btn btn-primary btn-sm" data-target="#editPenyelenggara<?php echo $datadb[$a]["id_pk_penyelenggara"];?>" data-toggle="modal"><i class = "icon md-edit"></i></button>
                  </td>
                </tr>
                <?php endfor;?>
              </tbody>
            </table>
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
        <h4 class="modal-title" id="exampleModalTitle">Tambah Penyelenggara</h4>
      </div>
      <form action="<?php echo base_url();?>penyelenggara/insert" autocomplete="off" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">Nama Penyelenggara</label>
            <input type="text" class="form-control" name="namapenyelenggara" placeholder="Nama Penyelenggara" autocomplete="off">
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
<div class="modal fade" id="modalUpdate">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="exampleModalTitle">Edit Penyelenggara</h4>
      </div>
      <form action="<?php echo base_url();?>penyelenggara/edit" autocomplete="off" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="idpenyelenggara" id = "edit_idpenyelenggara">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">Nama Penyelenggara</label>
            <input type="text" class="form-control" name="namapenyelenggara" id = "edit_namapenyelenggara">
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
<div class="modal fade" id="modalDelete">
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
        <a type="button" id = "delete_button" class="btn btn-primary">Delete</a>
      </div>
    </div>
  </div>
</div>
<script>
  var base_url = "<?php echo base_url();?>";
  var kolom_pengurutan = "id_pk_penyelenggara";
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
    var url = `<?php echo base_url();?>ws/penyelenggara/get_data?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url:url,
      type:"GET",
      dataType:"JSON",
      success:function(respond){  
        var html = "";
        content = respond["data"];
        for(var a = 0; a<respond["data"].length; a++){
          html += `
          <tr id = "penyelenggara${a}">
            <td>${respond["data"][a]["penyelenggara_nama"]}</td>
            <td>${respond["data"][a]["penyelenggara_status"]}</td>
            <td>
            <button type = "button" class = "btn btn-primary btn-sm" onclick = "load_edit(${a})" data-toggle = "modal" data-target = "#modalUpdate"><i class = "icon md-edit"></i></button>
            <button type = "button" class = "btn btn-danger btn-sm" onclick = "load_delete(${a})" data-toggle = "modal" data-target = "#modalDelete"><i class = "icon md-delete"></i></button>
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
  function load_edit(row){
    $("#edit_idpenyelenggara").val(content[row]["id_pk_penyelenggara"]);
    $("#edit_namapenyelenggara").val(content[row]["penyelenggara_nama"]);
    /*$("#modalUpdate").modal("show");*/
  }
  function load_delete(row){
    $("#delete_button").attr("href",`${base_url}penyelenggara/delete/${content[row]["id_pk_penyelenggara"]}`);
    /*$("#modalDelete").modal("show");*/
  }
</script>