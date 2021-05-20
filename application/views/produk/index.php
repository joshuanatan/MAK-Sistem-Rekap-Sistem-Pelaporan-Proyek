<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta"); ?>
  <?php $this->load->view("includes/core-head"); ?>

  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/structure/pagination.css">
  <title>MAK-CRM | Master Produk</title>
</head>

<body class="animsition site-navbar-small ">

  <?php $this->load->view("includes/navbar"); ?>
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Produk</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome/home">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
        <li class="breadcrumb-item active">Produk</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-lg-4">
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
            <div class="form-group col-lg-5">
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
          <div class="form-group">
            <h5>&nbsp;</h5>
            <button type="button" class="btn btn-primary btn-sm" data-target="#modalCreate" data-toggle="modal">Tambah Data</button>
          </div>
          <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered w-full">
              <thead>
                <tr>
                  <th>No. Katalog Produk</th>
                  <th>Principal</th>
                  <th>No. SAP</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Price List</th>
                  <th>Harga Ekat</th>
                  <th>Deskripsi</th>
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
  </div>
  <!-- End Page -->
  <?php $this->load->view("includes/footer"); ?>
  <!-- Core  -->
  <?php $this->load->view("includes/core-script"); ?>

  <script src="<?php echo base_url(); ?>global/js/Plugin/magnific-popup.js"></script>
  <script src="<?php echo base_url(); ?>global/vendor/magnific-popup/jquery.magnific-popup.js"></script>

</body>

</html>

<div class="modal fade" id="modalCreate">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Tambah Produk</h4>
      </div>
      <form id="createProdukForm">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">No. Katalog</label>
            <input type="text" class="form-control" name="nokatalogproduk" placeholder="No. Katalog" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Principal</label>
            <input type="text" class="form-control" name="principalproduk" placeholder="Produk Principal" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">No. SAP</label>
            <input type="text" class="form-control" name="nosapproduk" placeholder="No. SAP Produk" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Produk</label>
            <textarea class="form-control" name="namaproduk" placeholder="Nama Produk" rows=4></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kategori</label>
            <input type="text" class="form-control" name="kategoriproduk" placeholder="Kategori" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Price List</label>
            <input type="text" class="form-control" name="pricelistproduk" placeholder="Price List" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Harga Ekat</label>
            <input type="text" class="form-control" name="hargaekatproduk" placeholder="Harga Ekat" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsiproduk" placeholder="Deskripsi" autocomplete="off"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Foto Produk</label><br />
            <input type="file" name="foto_produk">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="create_row()">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="modalEdit">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Edit Produk</h4>
      </div>
      <form id="editProdukForm">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" class="form-control" name="idproduk" id="idproduk" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">No. Katalog</label>
            <input type="text" class="form-control" name="nokatalogproduk" id="nokatalogproduk" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Principal</label>
            <input type="text" class="form-control" name="principalproduk" id="principalproduk" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">No. SAP</label>
            <input type="text" class="form-control" name="nosapproduk" id="nosapproduk" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Produk</label>
            <textarea class="form-control" name="namaproduk" id="namaproduk"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Kategori</label>
            <input type="text" class="form-control" name="kategoriproduk" id="kategoriproduk" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Price List</label>
            <input type="text" class="form-control" name="pricelistproduk" id="pricelistproduk" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Harga Ekat</label>
            <input type="text" class="form-control" name="hargaekatproduk" id="hargaekatproduk" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsiproduk" id="deskripsiproduk"></textarea>
          </div>
          <div class="form-group">
            <label>Foto Produk Saat Ini </label>
            <br />
            <a class="inline-block" id="displayfotoproduk" data-plugin="magnificPopup" data-close-btn-inside="false" data-fixed-contentPos="true" data-main-class="mfp-margin-0s mfp-with-zoom" data-zoom='{"enabled": "true","duration":"300"}'>
              <img class="img-fluid col-lg-6 col-sm-12" id="displayfoto" alt="..." />
            </a>
            <br />
            <br />
            <label>Foto Produk Baru </label><br />
            <input type="file" name="foto_produk">
            <input type="hidden" name="foto_produk_current" id="sourceimage" value="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="edit_button">Save changes</button>
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
        <button type="button" id="delete_button" class="btn btn-primary">Delete</a></button>
      </div>
    </div>
  </div>
</div>
<script>
  var base_url = "<?php echo base_url(); ?>";
  var kolom_pengurutan = "id_pk_produk";
  var arah_kolom_pengurutan = "ASC";
  var pencarian_phrase = "";
  var kolom_pencarian = "all";
  var current_page = 1;
  var content = [];
  reload_table();

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

  function reload_table() {
    var url = `<?php echo base_url(); ?>ws/produk/get_data?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        content = respond["data"];
        for (var a = 0; a < respond["data"].length; a++) {
          html += `
          <tr id = "produk_row${a}">
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
<script>
  function load_edit(row) {
    $("#idproduk").val(content[row]["id_pk_produk"]);
    $("#nokatalogproduk").val(content[row]["produk_no_katalog"]);
    $("#principalproduk").val(content[row]["produk_principal"]);
    $("#nosapproduk").val(content[row]["produk_no_sap"]);
    $("#namaproduk").val(content[row]["produk_nama"]);
    $("#kategoriproduk").val(content[row]["produk_kategori"]);
    $("#pricelistproduk").val(content[row]["produk_price_list"]);
    $("#hargaekatproduk").val(content[row]["produk_harga_ekat"]);
    $("#deskripsiproduk").val(content[row]["produk_deskripsi"]);
    $("#displayfotoproduk").attr("href", `${base_url}docs/upload/image/produk/${content[row]["produk_foto"]}`);
    $("#displayfoto").attr("src", `${base_url}docs/upload/image/produk/${content[row]["produk_foto"]}`);
    $("#sourceimage").val(`${content[row]["produk_foto"]}`);
    $("#edit_button").attr("onclick", `update_row(${row})`);
    $("#modalEdit").modal("show");
  }

  function load_delete(row) {
    $("#delete_button").attr("onclick", `delete_row(${row})`);
    $("#modalDelete").modal("show");
  }
  var default_insert_form = $("#createProdukForm").html();

  function create_row() {
    var formData = new FormData($("#createProdukForm")[0]);
    $.ajax({
      url: `${base_url}ws/produk/insert/`,
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(respond) {
        if (respond["status"]) {
          $("#modalCreate").modal("hide");
          alert("Data Produk Berhasil Ditambahkan");
          reload_table();
          $("#createProdukForm").html(default_insert_form);
        } else {
          alert(respond["msg"]);
        }
      }
    });
  }

  function update_row(row) {
    var formData = new FormData($("#editProdukForm")[0]);
    $.ajax({
      url: `${base_url}ws/produk/update/`,
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(respond) {
        if (respond["status"]) {
          alert("Data Produk Berhasil Diubah");
          $("#modalEdit").modal("hide");
          reload_table();
        } else {
          alert(respond["msg"]);
        }
      }
    });
  }

  function delete_row(row) {
    var id_produk = content[row]["id_pk_produk"];
    $.ajax({
      url: `${base_url}ws/produk/delete/${id_produk}`,
      type: "DELETE",
      dataType: "JSON",
      success: function(respond) {
        alert("Data Produk Berhasil Dihapus");
        $("#modalDelete").modal("hide");
        $(`#produk_row${row}`).remove();
      }
    });
  }
</script>