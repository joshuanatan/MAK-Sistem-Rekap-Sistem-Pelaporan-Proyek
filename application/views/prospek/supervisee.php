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
        <li class="breadcrumb-item ">Prospek</li>
        <li class="breadcrumb-item active">Supervisee</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body">
          <h3>Daftar Prospek Supervisee</h3>
          <br>
          <div class="row">
            <div class="form-group col-lg-1">
              <h5>&nbsp;</h5>
              <a href="<?php echo base_url(); ?>prospek/" type="button" class="btn btn-primary btn-sm">Kembali ke Prospek</a>
            </div>
            <div class="form-group col-lg-1">
            </div>
            <div class="form-group col-lg-1"></div>
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
            <div class="form-group col-lg-3">
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
                  <th>Supervisee</th>
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
</body>

</html>
</script>

<script>
  var kolom_pengurutan = "id_pk_prospek";
  var arah_kolom_pengurutan = "DESC";
  var pencarian_phrase = "";
  var kolom_pencarian = "all";
  var current_page = 1;
  var content = [];
  reload_table();

  function reload_table() {
    var url = `<?php echo base_url(); ?>ws/prospek/get_data_supervisee?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url: url,
      type: "POST",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        content = respond["data"];
        for (var a = 0; a < respond["data"].length; a++) {
          html += `
            <tr id = "prospek_row${a}">
              <td>${respond["data"][a]["nama_provinsi"]}</td>
              <td>${respond["data"][a]["nama_kabupaten"]}</td>
              <td>${respond["data"][a]["nama_rs"]}</td>
              <td>${respond["data"][a]["prospek_principle"]}</td>
              <td>${respond["data"][a]["notes_kompetitor"]}</td>
              <td>${respond["data"][a]["notes_prospek"]}</td>
              <td>${respond["data"][a]["funnel"]}</td>
              <td>${format_number(respond["data"][a]["total_price_prospek"])}</td>
              <td>${respond["data"][a]["estimasi_pembelian"]}</td>
              <td>${respond["data"][a]["user_username"]}</td>
              <td>
                <a href="<?php echo base_url(); ?>prospek/detail_prospek/${respond["data"][a]["id_pk_prospek"]}" type = "button" class = "btn btn-light btn-sm" id="load_button"><i class="icon md-search" aria-hidden="true"></i></button>
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