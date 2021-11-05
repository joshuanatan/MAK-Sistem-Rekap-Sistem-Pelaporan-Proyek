<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta") ?>
  <title>MAK-CRM | Prospek</title>
  <?php $this->load->view("includes/core-head") ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/fonts/font-awesome/font-awesome.css">

  <style>
    .scroll-provinsi-table-wrapper {
      overflow-y: scroll;
      height: 400px;
    }
  </style>
</head>

<body class="animsition site-navbar-small">
  <?php $this->load->view("includes/navbar") ?>
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Prospek</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active">Prospek</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body">
          <h3>Daftar Prospek</h3>
          <br>
          <div class="row">
            <?php if(strtolower($this->session->user_role) != "administrator"):?>
              <div class="form-group col-lg-1">
                <h5>&nbsp;</h5>
                <a href="<?php echo base_url(); ?>prospek/add_prospek" type="button" class="btn btn-primary btn-sm">Tambah Prospek</a>
              </div>
            <?php endif;?>
            <?php if(strtolower($this->session->user_role) != "sales engineer" && strtolower($this->session->user_role) != "administrator"):?>
              <div class="form-group col-lg-1">
                <h5>&nbsp;</h5>
                <a href="<?php echo base_url(); ?>prospek/supervisee" type="button" class="btn btn-primary btn-sm">Prospek Supervisee</a>
              </div>
            <?php endif;?>
            <?php if(strtolower($this->session->user_role) != "administrator"):?>
              <div class="form-group col-lg-1"></div>
            <?php endif;?>
            <div class="form-group col-lg-3">
              <h5>Kolom Pengurutan</h5>
              <select class="form-control" onchange="change_kolom_pengurutan()" id="kolom_pengurutan">
                <?php for ($a = 0; $a < count($field); $a++) : ?>
                  <option value="<?php echo $field[$a]["field_value"]; ?>"><?php echo $field[$a]["field_text"]; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="form-group col-lg-1">
              <h5>Urutan</h5>
              <select class="form-control" id="urutan_kolom" onchange="change_arah_pengurutan()" id="urutan_kolom">
                <option value="ASC">A-Z</option>
                <option value="DESC">Z-A</option>
              </select>
            </div>
            <?php if(strtolower($this->session->user_role) != "administrator"):?>
              <div class="form-group col-lg-3">
            <?php else:?>
              <div class="form-group col-lg-6">
            <?php endif;?>
              <h5>Pencarian</h5>
              <input type="text" class="form-control" onclick="change_pencarian()" oninput="change_pencarian()" id="pencarian">
            </div>
            <div class="form-group col-lg-2">
              <h5>Kolom Pencarian</h5>
              <select class="form-control" onchange="change_pencarian_kolom()" id="pencarian_kolom">
                <option value="all">Semua</option>
                <?php for ($a = 0; $a < count($field); $a++) : ?>
                  <option value="<?php echo $field[$a]["field_value"]; ?>"><?php echo $field[$a]["field_text"]; ?></option>
                <?php endfor; ?>
              </select>
            </div>
          </div>
          
          <?php if(strtolower($this->session->user_role) == "sales manager"):?>
          <div class="row">
            <div class="form-group col-lg-2">
              <h5>Tampilkan</h5>
              <select class="form-control" onchange="change_base_url()" id="status_tampilkan">
                <option value="get_data">Semua</option>
                <option value="get_data_ekat">Sudah ada E-katalog</option>
                <option value="get_data_belum_ekat">Belum ada E-katalog</option>
              </select>
            </div>
          </div>
          <?php endif;?>
          
          <?php if(strtolower($this->session->user_role) == "supervisor"):?>
          <div class="row">
            <div class="form-group col-lg-2">
              <h5>Tampilkan</h5>
              <select class="form-control" onchange="change_base_url()" id="status_tampilkan">
                <option value="get_data">Semua</option>
                <option value="get_data_sirup">Sudah ada SiRUP</option>
                <option value="get_data_belum_sirup">Belum ada SiRUP</option>
              </select>
            </div>
          </div>
          <?php endif;?>
          <br>
          <div class="scroll-provinsi-table-wrapper">
            <table class="table table-hover table-striped w-full">
              <thead>
                <tr>
                  <th>Provinsi</th>
                  <th>Kabupaten</th>
                  <th>Rumah Sakit</th>
                  <th>Prospek Principle</th>
                  <th>Notes Kompetitor</th>
                  <th>Notes Prospek</th>
                  <th>Funnel</th>
                  <th>Total Price</th>
                  <th>Estimasi Pembelian</th>
                  <th>Creator</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="table_content_container">
              </tbody>
            </table>
          </div>
          <nav class="d-flex justify-content-center">
            <ul class="pagination">
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <?php $this->load->view("includes/footer") ?>
    <?php $this->load->view("includes/core-script") ?>
    <script src="<?php echo base_url(); ?>global/vendor/asrange/jquery-asRange.min.js"></script>
    <script src="<?php echo base_url(); ?>global/vendor/bootbox/bootbox.js"></script>

    <script>
      function load_delete(row) {
        $("#delete_button").attr("onclick", `delete_row(${row})`);
        $("#modalDelete").modal("show");
      }

      function delete_row(row) {
        var id_prospek = content[row]["id_pk_prospek"];
        $.ajax({
          url: `${base_url}ws/prospek/delete/${id_prospek}`,
          type: "DELETE",
          dataType: "JSON",
          success: function(respond) {
            alert("Data Produk Berhasil Dihapus");
            $("#modalDelete").modal("hide");
            $(`#prospek_row${row}`).remove();
          }
        });
      }
    </script>
</body>

</html>
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
        <button type="submit" class="btn btn-danger" data-dismiss="modal" id="delete_button">Delete</button>
      </div>
    </div>
  </div>
</div>
</script>

<script>
  function change_base_url(){
    final_base_url = base_url+"ws/prospek/"+$("#status_tampilkan").val();
    console.log(final_base_url);
    reload_table();
  }
</script>
<script>
  var kolom_pengurutan = "id_pk_prospek";
  var arah_kolom_pengurutan = "DESC";
  var pencarian_phrase = "";
  var kolom_pencarian = "all";
  var current_page = 1;
  var content = [];
  var base_url = "<?php echo base_url(); ?>";
  var final_base_url = base_url+"ws/prospek/get_data";
  var user_role = "<?php echo $this->session->user_role ?>";
  var user_id = "<?php echo $this->session->id_user ?>";
  reload_table();

  function reload_table() {
    var url = `${final_base_url}?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url: url,
      type: "POST",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        content = respond["data"];
        for (var a = 0; a < respond["data"].length; a++) {
          var htmlEditButton = "";
          var htmlDeleteButton = "";
          if ((respond["data"][a]["flag_sirup"] == 1 && user_role == "Supervisor") || (respond["data"][a]["flag_ekatalog"] == 1 && user_role == "Sales Manager") || (respond["data"][a]["prospek_id_create"] == user_id)) {
            htmlEditButton = `<a target="_blank" href="<?php echo base_url(); ?>prospek/edit_prospek/${respond["data"][a]["id_pk_prospek"]}" type = "button" class = "btn btn-primary btn-sm"><i class = "icon md-edit"></i></a>`;
          }
          if (respond["data"][a]["prospek_id_create"] == user_id) {
            htmlDeleteButton = `<button type = "button" class = "btn btn-danger btn-sm" onclick = "load_delete(${a})"><i class = "icon md-delete"></i></button>`;
          }
          if (user_role == "Administrator") {
            htmlEditButton = ``;
            htmlDeleteButton = ``;
          }
          var funnel_html = "";
          if(respond["data"][a]["funnel"].toLowerCase() == "belum ditentukan"){
            funnel_html = `<button type = 'button' class = 'col-lg-12 btn btn-sm btn-primary'>${respond["data"][a]["funnel"]}</button>`;
          }
          else if(respond["data"][a]["funnel"].toLowerCase() == "lead"){
            funnel_html = `<button type = 'button' class = 'col-lg-12 btn btn-sm btn-info'>${respond["data"][a]["funnel"]}</button>`;
          }
          else if(respond["data"][a]["funnel"].toLowerCase() == "prospek"){
            funnel_html = `<button type = 'button' class = 'col-lg-12 btn btn-sm btn-warning'>${respond["data"][a]["funnel"]}</button>`;
          }
          else if(respond["data"][a]["funnel"].toLowerCase() == "hot prospek"){
            funnel_html = `<button type = 'button' class = 'col-lg-12 btn btn-sm btn-danger'>${respond["data"][a]["funnel"]}</button>`;
          }
          else if(respond["data"][a]["funnel"].toLowerCase() == "win"){
            funnel_html = `<button type = 'button' class = 'col-lg-12 btn btn-sm btn-success'>${respond["data"][a]["funnel"]}</button>`;
          }
          else if(respond["data"][a]["funnel"].toLowerCase() == "loss"){
            funnel_html = `<button type = 'button' class = 'col-lg-12 btn btn-sm btn-dark'>${respond["data"][a]["funnel"]}</button>`;
          }
          html += `
            <tr id = "prospek_row${a}">
              <td>${respond["data"][a]["nama_provinsi"]}</td>
              <td>${respond["data"][a]["nama_kabupaten"]}</td>
              <td>${respond["data"][a]["nama_rs"]}</td>
              <td>${respond["data"][a]["prospek_principle"]}</td>
              <td>${respond["data"][a]["notes_kompetitor"]}</td>
              <td>${respond["data"][a]["notes_prospek"]}</td>
              <td>${funnel_html}</td>
              <td>${format_number(respond["data"][a]["total_price_prospek"])}</td>
              <td>${respond["data"][a]["estimasi_pembelian"]}</td>
              <td>${respond["data"][a]["user_username"]}</td>
              <td>
                <a href="<?php echo base_url(); ?>prospek/detail_prospek/${respond["data"][a]["id_pk_prospek"]}" type = "button" class = "btn btn-light btn-sm" id="load_button"><i class="icon md-search" aria-hidden="true"></i></a>
                ${htmlEditButton}
                ${htmlDeleteButton}
              </td>
            </tr>
            `;
        }
        $("#table_content_container").html(html);
        pagination(respond["page"]);
      }
    });
  }

  function change_kolom_pengurutan() {
    var pengurutan = $("#kolom_pengurutan").val();
    kolom_pengurutan = pengurutan;
    reload_table();
  }

  function change_arah_pengurutan() {
    var urutan = $("#urutan_kolom").val();
    arah_kolom_pengurutan = urutan;
    reload_table();
  }

  function change_pencarian() {
    var pencarian = $("#pencarian").val();
    pencarian_phrase = pencarian;
    reload_table();
  }

  function change_pencarian_kolom() {
    var pencarian_kolom = $("#pencarian_kolom").val();
    kolom_pencarian = pencarian_kolom;
    reload_table();
  }

  function change_pagination(page) {
    current_page = page;
    reload_table();
  }

  function pagination(page_rules) {
    html = "";
    if (page_rules["previous"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["before"]) + ')"><</a></li>';
    } else {
      html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed"><</a></li>';
    }
    if (page_rules["first"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["first"]) + ')">' + (page_rules["first"]) + '</a></li>';
      html += '<li class="page-item"><a class="page-link">...</a></li>';
    }
    if (page_rules["before"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["before"]) + ')">' + page_rules["before"] + '</a></li>';
    }
    html += '<li class="page-item active"><a class="page-link" onclick = "change_pagination(' + (page_rules["current"]) + ')">' + page_rules["current"] + '</a></li>';
    if (page_rules["after"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["after"]) + ')">' + page_rules["after"] + '</a></li>';
    }
    if (page_rules["last"]) {
      html += '<li class="page-item"><a class="page-link">...</a></li>';
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["last"]) + ')">' + page_rules["last"] + '</a></li>';
    }
    if (page_rules["next"]) {
      html += '<li class="page-item"><a class="page-link" onclick = "change_pagination(' + (page_rules["after"]) + ')">></a></li>';
    } else {
      html += '<li class="page-item"><a class="page-link" style = "cursor:not-allowed">></a></li>';
    }
    $(".pagination").html(html);
  }
</script>
