<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta"); ?>
  <?php $this->load->view("includes/core-head"); ?>
  <title>MAK-CRM | Master E-Katalog</title>
</head>

<body class="animsition site-navbar-small ">

  <?php $this->load->view("includes/navbar"); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/structure/pagination.css">
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">E-Katalog</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome/home">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
        <li class="breadcrumb-item active">E-Katalog</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-lg-1">
              <h5>&nbsp;</h5>
              <button type="button" class="btn btn-primary btn-sm" data-target="#createModal" data-toggle="modal">Tambah Data</button>
            </div>
            <div class="form-group col-lg-2"></div>
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
          <div class="table-responsive">
            <table class="table table-hover dataTable table-striped w-full">
              <thead>
                <tr>
                  <th>ID Paket</th>
                  <th>Paket</th>
                  <th>Satuan Kerja</th>
                  <th>Total Produk</th>
                  <th>Instansi</th>
                  <th>Status Paket</th>
                  <th>Posisi Paket</th>
                  <th>Total Harga</th>
                  <th>Tanggal Buat</th>
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
        <button class="btn btn-primary" id="button_delete">Delete</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="createModal">
  <div class="modal-dialog modal-simple modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Tambah E-Katalog</h4>
      </div>
      <form id="createForm">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">Komoditas</label>
            <input type="text" class="form-control" name="komoditas">
          </div>
          <div class="form-group">
            <label class="form-control-label">ID Paket</label>
            <input type="text" class="form-control" name="id_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Paket</label>
            <input type="text" class="form-control" name="nama_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Instansi</label>
            <input type="text" class="form-control" name="instansi">
          </div>
          <div class="form-group">
            <label class="form-control-label">Satuan Kerja</label>
            <input type="text" class="form-control" name="satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label">NPWP Satuan Kerja</label>
            <input type="text" class="form-control" name="npwp_satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat Satuan Kerja</label>
            <textarea class="form-control" name="alamat_satuan_kerja"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat Pengiriman</label>
            <textarea class="form-control" name="alamat_pengiriman"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Dibuat</label>
            <input type="date" class="form-control" name="tgl_buat_online">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Diubah</label>
            <input type="date" class="form-control" name="tgl_ubah_online">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tahun Anggaran</label>
            <input type="text" class="form-control" name="tahun_anggaran">
          </div>
          <div class="form-group">
            <label class="form-control-label">Total Produk</label>
            <input type="int" class="form-control" name="total_produk">
          </div>
          <div class="form-group">
            <label class="form-control-label">Total Harga</label>
            <input type="int" class="form-control" name="total_harga">
          </div>
          <div class="form-group">
            <label class="form-control-label">Status Paket</label>
            <input type="text" class="form-control" name="status_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Posisi Paket</label>
            <input type="text" class="form-control" name="posisi_paket">
          </div>
          <table class="table table-bordered table-hover">
            <thead>
              <th>Nama Produk</th>
              <th>Kuantitas</th>
              <th>Mata Uang</th>
              <th>Harga Satuan</th>
              <th>Perkiraan Ongkos Kirim</th>
              <th>Total Harga</th>
              <th>Catatan</th>
              <th>Action</th>
            </thead>
            <tbody>
              <tr id="tambah_row_produk_ekatalog_container">
                <td colspan="8"><button type="button" class="btn btn-primary btn-sm col-lg-12" onclick="tambah_row_produk_ekatalog()">Tambah Produk E-Katalog</button></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" onclick="create_ekatalog_row()" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="updateModal">
  <div class="modal-dialog modal-simple modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Update E-Katalog</h4>
      </div>
      <form id="updateForm">
        <div class="modal-body">
          <input type="hidden" name="id_ekatalog" id="edit_id_katalog">
          <div class="form-group">
            <label class="form-control-label">Komoditas</label>
            <input type="text" class="form-control" name="komoditas" id="edit_komoditas">
          </div>
          <div class="form-group">
            <label class="form-control-label">ID Paket</label>
            <input type="text" class="form-control" name="id_paket" id="edit_id_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Paket</label>
            <input type="text" class="form-control" name="nama_paket" id="edit_nama_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Instansi</label>
            <input type="text" class="form-control" name="instansi" id="edit_instansi">
          </div>
          <div class="form-group">
            <label class="form-control-label">Satuan Kerja</label>
            <input type="text" class="form-control" name="satuan_kerja" id="edit_satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label">NPWP Satuan Kerja</label>
            <input type="text" class="form-control" name="npwp_satuan_kerja" id="edit_npwp_satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat Satuan Kerja</label>
            <textarea class="form-control" name="alamat_satuan_kerja" id="edit_alamat_satuan_kerja"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat Pengiriman</label>
            <textarea class="form-control" name="alamat_pengiriman" id="edit_alamat_pengiriman"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Dibuat</label> <strong><span id="edit_tgl_buat_online_info"></span></strong>
            <input type="date" class="form-control" name="tgl_buat_online" id="edit_tgl_buat_online">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Diubah</label> <strong><span id="edit_tgl_ubah_online_info"></span></strong>
            <input type="date" class="form-control" name="tgl_ubah_online" id="edit_tgl_ubah_online">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tahun Anggaran</label>
            <input type="text" class="form-control" name="tahun_anggaran" id="edit_tahun_anggaran">
          </div>
          <div class="form-group">
            <label class="form-control-label">Total Produk</label>
            <input type="int" class="form-control" name="total_produk" id="edit_total_produk">
          </div>
          <div class="form-group">
            <label class="form-control-label">Total Harga</label> <strong><span id="edit_total_harga_info"></span></strong>
            <input type="int" class="form-control" name="total_harga" id="edit_total_harga">
          </div>
          <div class="form-group">
            <label class="form-control-label">Status Paket</label>
            <input type="text" class="form-control" name="status_paket" id="edit_status_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Posisi Paket</label>
            <input type="text" class="form-control" name="posisi_paket" id="edit_posisi_paket">
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <th>Nama Produk</th>
                <th>Kuantitas</th>
                <th>Mata Uang</th>
                <th>Harga Satuan</th>
                <th>Perkiraan Ongkos Kirim</th>
                <th>Total Harga</th>
                <th>Catatan</th>
                <th>Action</th>
              </thead>
              <tbody>
                <tr id="edit_tambah_row_produk_ekatalog_container">
                  <td colspan="8"><button type="button" class="btn btn-primary btn-sm col-lg-12" onclick="edit_tambah_row_produk_ekatalog()">Tambah Produk E-Katalog</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" onclick="update_ekatalog_row()" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  var create_ekatalog_form = $("#createForm").html();

  function create_ekatalog_row() {
    var fd = new FormData($("#createForm")[0]);
    $.ajax({
      url: "<?php echo base_url(); ?>ws/ekatalog/insert",
      type: "POST",
      dataType: "JSON",
      data: fd,
      contentType: false,
      processData: false,
      success: function(respond) {
        $("#createForm").html(create_ekatalog_form);
        $("#createModal").modal("hide");
        reload_table();
      }
    });
  }
  var content_ekatalog_produk = "";

  function load_edit(row) {
    $("#edit_id_katalog").val(content[row]["id_pk_ekatalog"]);
    $("#edit_komoditas").val(content[row]["ekatalog_komoditas"]);
    $("#edit_id_paket").val(content[row]["ekatalog_id_paket"]);
    $("#edit_nama_paket").val(content[row]["ekatalog_nama_paket"]);
    $("#edit_instansi").val(content[row]["ekatalog_instansi"]);
    $("#edit_satuan_kerja").val(content[row]["ekatalog_satuan_kerja"]);
    $("#edit_npwp_satuan_kerja").val(content[row]["ekatalog_npwp_satuan_kerja"]);
    $("#edit_alamat_satuan_kerja").val(content[row]["ekatalog_alamat_satuan_kerja"]);
    $("#edit_alamat_pengiriman").val(content[row]["ekatalog_alamat_pengiriman"]);
    $("#edit_tgl_buat_online").val(content[row]["ekatalog_tgl_buat_online"]);
    $("#edit_tgl_ubah_online").val(content[row]["ekatalog_tgl_ubah_online"]);
    $("#edit_tgl_buat_online_info").text(content[row]["ekatalog_tgl_buat_online"]);
    $("#edit_tgl_ubah_online_info").text(content[row]["ekatalog_tgl_ubah_online"]);
    $("#edit_tahun_anggaran").val(content[row]["ekatalog_tahun_anggaran"]);
    $("#edit_total_produk").val(content[row]["ekatalog_total_produk"]);
    $("#edit_total_harga").val(content[row]["ekatalog_total_harga"]);
    $("#edit_total_harga_info").text(content[row]["ekatalog_total_harga_online"]);
    $("#edit_status_paket").val(content[row]["ekatalog_status_paket"]);
    $("#edit_posisi_paket").val(content[row]["ekatalog_posisi_paket"]);

    $(".produk_ekatalog_row").remove();
    $.ajax({
      url: `<?php echo base_url(); ?>ws/ekatalog/get_ekatalog_produk/${content[row]["id_pk_ekatalog"]}`,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        content_ekatalog_produk = respond;
        var html = "";
        for (var a = 0; a < respond.length; a++) {
          html += `
          <tr class = "produk_ekatalog_row" id = "produk_ekatalog_row${a}">
            <input type = "hidden" name = "edit_produk_ekatalog[]" value = "${a}">
            <input type = "hidden" name = "id_ekatalog_produk${a}" value = "${respond[a]["id_pk_ekatalog_produk"]}">
            <td>
              <textarea class = "form-control" name = "ekatalog_produk_nama_produk${a}">${respond[a]["ekatalog_produk_nama_produk"]}</textarea>
            </td>
            <td>
              <label>online: ${respond[a]["ekatalog_produk_kuantitas_online"]}</label>
              <input type = "text" class = "form-control" value = "${respond[a]["ekatalog_produk_kuantitas"]}" name = "ekatalog_produk_kuantitas${a}"></td>
            <td>
              <label>online: ${respond[a]["ekatalog_produk_mata_uang_online"]}</label>
              <input type = "text" class = "form-control" value = "${respond[a]["ekatalog_produk_mata_uang"]}" name = "ekatalog_produk_mata_uang${a}"></td>
            <td>
              <label>online: ${respond[a]["ekatalog_produk_harga_satuan_online"]}</label>
              <input type = "text" class = "form-control" value = "${respond[a]["ekatalog_produk_harga_satuan"]}" name = "ekatalog_produk_harga_satuan${a}"></td>
            <td>
              <label>online: ${respond[a]["ekatalog_produk_perkiraan_ongkos_kirim_online"]}</label>
              <input type = "text" class = "form-control" value = "${respond[a]["ekatalog_produk_perkiraan_ongkos_kirim"]}" name = "ekatalog_produk_perkiraan_ongkos_kirim${a}"></td>
            <td>
              <label>online: ${respond[a]["ekatalog_produk_total_harga_online"]}</label>
              <input type = "text" class = "form-control" value = "${respond[a]["ekatalog_produk_total_harga"]}" name = "ekatalog_produk_total_harga${a}"></td>
            <td>
              <textarea class = "form-control" name = "ekatalog_produk_catatan${a}">${respond[a]["ekatalog_produk_catatan"]}</textarea>
            </td>
            <td>
              <button type = "button" class = "btn btn-danger btn-sm" onclick = "hapus_row_ekatalog_produk(${a})"><i class = "icon md-delete"></i></button>
            </td>
          </tr>
          `;
        }
        $("#edit_tambah_row_produk_ekatalog_container").before(html);
      }
    })

    $("#updateModal").modal("show");
  }

  function update_ekatalog_row() {

    var fd = new FormData($("#updateForm")[0]);
    $.ajax({
      url: "<?php echo base_url(); ?>ws/ekatalog/update",
      type: "POST",
      dataType: "JSON",
      data: fd,
      contentType: false,
      processData: false,
      success: function(respond) {
        $("#updateModal").modal("hide");
        reload_table();
      }
    });
  }

  function load_delete(row) {
    $("#button_delete").attr("onclick", `delete_ekatalog_row(${row})`);
    $("#deleteModal").modal("show");
  }

  function delete_ekatalog_row(row) {
    var id_ekatalog = content[row]["id_pk_ekatalog"];
    $.ajax({
      url: `<?php echo base_url(); ?>ws/ekatalog/delete/${id_ekatalog}`,
      type: "DELETE",
      dataType: "JSON",
      success: function(respond) {
        $("#deleteModal").modal("hide");
        $(`#ekatalog_row${row}`).remove();
      }
    });
  }
</script>
<script id="script core">
  var base_url = "<?php echo base_url(); ?>";
  var kolom_pengurutan = "id_pk_ekatalog";
  var arah_kolom_pengurutan = "DESC";
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
    var url = `<?php echo base_url(); ?>ws/ekatalog/get_data?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        content = respond["data"];
        for (var a = 0; a < respond["data"].length; a++) {
          html += `
          <tr class = "ekatalog_row" id = "ekatalog_row${a}">
            <td>${respond["data"][a]["ekatalog_id_paket"]}</td>
            <td>${respond["data"][a]["ekatalog_nama_paket"]}</td>
            <td>${respond["data"][a]["ekatalog_satuan_kerja"]}</td>
            <td>${respond["data"][a]["ekatalog_total_produk"]}</td>
            <td>${respond["data"][a]["ekatalog_instansi"]}</td>
            <td>${respond["data"][a]["ekatalog_status_paket"]}</td>
            <td>${respond["data"][a]["ekatalog_posisi_paket"]}</td>
            <td>${respond["data"][a]["ekatalog_total_harga"]}</td>
            <td>${respond["data"][a]["ekatalog_tgl_buat_online"]}</td>
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
  function tambah_row_produk_ekatalog() {
    var count = $(".produk_ekatalog_row").length;
    var html = `
      <tr class = "produk_ekatalog_row" id = "produk_ekatalog_row${count}">
        <input type = "hidden" name = "produk_ekatalog[]" value = "${count}">
        <td>
          <textarea class = "form-control" name = "ekatalog_produk_nama_produk${count}"></textarea>
        </td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_kuantitas${count}"></td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_mata_uang${count}"></td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_harga_satuan${count}"></td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_perkiraan_ongkos_kirim${count}"></td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_total_harga${count}"></td>
        <td>
          <textarea class = "form-control" name = "ekatalog_produk_catatan${count}"></textarea>
        </td>
        <td>
          <button type = "button" class = "btn btn-danger btn-sm" onclick = "hapus_tambah_row_produk_ekatalog(${count})"><i class = "icon md-delete"></i></button>
        </td>
      </tr>
    `;
    $("#tambah_row_produk_ekatalog_container").before(html);
  }

  function hapus_tambah_row_produk_ekatalog(row) {
    $("#produk_ekatalog_row" + row).remove();
  }

  function hapus_row_ekatalog_produk(row) {
    var id_ekatalog_produk = content_ekatalog_produk[row]["id_pk_ekatalog_produk"];
    $.ajax({
      url: `<?php echo base_url(); ?>ws/ekatalog/delete_ekatalog_produk/${id_ekatalog_produk}`,
      type: "DELETE",
      dataType: "JSON",
      success: function(respond) {
        $("#produk_ekatalog_row" + row).remove();
      }
    })
  }

  function edit_tambah_row_produk_ekatalog() {
    var count = $(".produk_ekatalog_row").length;
    var html = `
      <tr class = "produk_ekatalog_row" id = "produk_ekatalog_row${count}">
        <input type = "hidden" name = "produk_ekatalog[]" value = "${count}">
        <td>
          <textarea class = "form-control" name = "ekatalog_produk_nama_produk${count}"></textarea>
        </td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_kuantitas${count}"></td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_mata_uang${count}"></td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_harga_satuan${count}"></td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_perkiraan_ongkos_kirim${count}"></td>
        <td><input type = "text" class = "form-control" name = "ekatalog_produk_total_harga${count}"></td>
        <td>
          <textarea class = "form-control" name = "ekatalog_produk_catatan${count}"></textarea>
        </td>
        <td>
          <button type = "button" class = "btn btn-danger btn-sm" onclick = "hapus_edit_tambah_row_produk_ekatalog(${count})"><i class = "icon md-delete"></i></button>
        </td>
      </tr>
    `;
    $("#edit_tambah_row_produk_ekatalog_container").before(html);
  }

  function hapus_edit_tambah_row_produk_ekatalog(row) {
    $("#produk_ekatalog_row" + row).remove();
  }
</script>