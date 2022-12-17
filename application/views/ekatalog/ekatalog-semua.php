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
        <li class="breadcrumb-item"><a href="javascript:void(0)">eKatalog</a></li>
        <li class="breadcrumb-item active">Semua Data</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body">
          <div class="row">
            <div class="form-group col-lg-1">
              <h5>&nbsp;</h5>
              <a href = "<?php echo base_url();?>ekatalog/buatan" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="form-group col-lg-1">
              <h5>&nbsp;</h5>
              <a href = "<?php echo base_url();?>ekatalog/export" class="btn btn-success btn-sm">Export Excel</a>
            </div>
            <div class="form-group col-lg-1"></div>
            <div class="form-group col-lg-3">
              <h5>Kolom Pengurutan</h5>
              <select class="form-control" onchange="change_kolom_pengurutan()" id="kolom_pengurutan">
                <option value="" selected>Pilih Kolom Pengurutan</option>
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
                  <th>Tanggal Buat & Ubah Online</th>
                  <th>Tanggal Ubah</th>
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
            <td>${format_number(respond["data"][a]["ekatalog_total_harga"])}</td>
            <td>${respond["data"][a]["format_tgl_buat_online"]} <br/><Br/>${respond["data"][a]["format_tgl_ubah_online"]}</td>
            <td>${respond["data"][a]["ekatalog_tgl_update"]} <br/><br/>${respond["data"][a]["user_username"]}</td>
            <td><button type = "button" onclick = "load_edit(${a})" class = "btn btn-light btn-sm" data-toggle="modal" data-target="#updateModal"><i class="icon md-search" aria-hidden="true"></i></button></td>
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

<div class="modal fade" id="updateModal">
  <div class="modal-dialog modal-simple modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Detail E-Katalog</h4>
      </div>
      <form id="updateForm">
        <div class="modal-body">
          <input type="hidden" name="id_ekatalog" id="edit_id_katalog">
          <div class="form-group">
            <label class="form-control-label">Komoditas</label>
            <input type="text" class="form-control" readonly name="komoditas" id="edit_komoditas">
          </div>
          <div class="form-group">
            <label class="form-control-label">ID Paket</label>
            <input type="text" class="form-control" readonly name="id_paket" id="edit_id_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Paket</label>
            <input type="text" class="form-control" readonly name="nama_paket" id="edit_nama_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Instansi</label>
            <input type="text" class="form-control" readonly name="instansi" id="edit_instansi">
          </div>
          <div class="form-group">
            <label class="form-control-label">Satuan Kerja</label>
            <input type="text" class="form-control" readonly name="satuan_kerja" id="edit_satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label">NPWP Satuan Kerja</label>
            <input type="text" class="form-control" readonly name="npwp_satuan_kerja" id="edit_npwp_satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat Satuan Kerja</label>
            <textarea class="form-control" readonly name="alamat_satuan_kerja" id="edit_alamat_satuan_kerja"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat Pengiriman</label>
            <textarea class="form-control" readonly name="alamat_pengiriman" id="edit_alamat_pengiriman"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Dibuat</label> <strong><span id="edit_tgl_buat_online_info"></span></strong>
            <input type="date" class="form-control" readonly name="tgl_buat_online" id="edit_tgl_buat_online">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Diubah</label> <strong><span id="edit_tgl_ubah_online_info"></span></strong>
            <input type="date" class="form-control" readonly name="tgl_ubah_online" id="edit_tgl_ubah_online">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tahun Anggaran</label>
            <input type="text" class="form-control" readonly name="tahun_anggaran" id="edit_tahun_anggaran">
          </div>
          <div class="form-group">
            <label class="form-control-label">Total Produk</label>
            <input type="int" class="form-control nf-input" readonly name="total_produk" id="edit_total_produk">
          </div>
          <div class="form-group">
            <label class="form-control-label">Total Harga</label> <strong><span id="edit_total_harga_info"></span></strong>
            <input type="int" class="form-control nf-input" readonly name="total_harga" id="edit_total_harga">
          </div>
          <div class="form-group">
            <label class="form-control-label">Status Paket</label>
            <input type="text" class="form-control" readonly name="status_paket" id="edit_status_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Posisi Paket</label>
            <input type="text" class="form-control" readonly name="posisi_paket" id="edit_posisi_paket">
          </div>
          <div class="table-responsive">
            <label class="form-control-label">PP/Comittee/Pemesan</label>
            <table class="table table-bordered table-hover">
              <tr>
                <td>Nama</td>
                <td><input type="text" class="form-control" readonly name="nama_pp" id="edit_nama_pp"></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><input type="text" class="form-control" readonly name="position_pp" id="edit_position_pp"></td>
              </tr>
              <tr>
                <td>NIP</td>
                <td><input type="text" class="form-control" readonly name="nip_pp" id="edit_nip_pp"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input type="text" class="form-control" readonly name="email_pp" id="edit_email_pp"></td>
              </tr>
              <tr>
                <td>No. Telp</td>
                <td><input type="text" class="form-control" readonly name="phone_number_pp" id="edit_phone_number_pp"></td>
              </tr>
            </table>
          </div>
          <div class="table-responsive">
            <label class="form-control-label">PPK/Buyer/Pembeli</label>
            <table class="table table-bordered table-hover">
              <tr>
                <td>Nama</td>
                <td><input type="text" class="form-control" readonly name="nama_buyer" id="edit_nama_buyer"></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><input type="text" class="form-control" readonly name="position_buyer" id="edit_position_buyer"></td>
              </tr>
              <tr>
                <td>NIP</td>
                <td><input type="text" class="form-control" readonly name="nip_buyer" id="edit_nip_buyer"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input type="text" class="form-control" readonly name="email_buyer" id="edit_email_buyer"></td>
              </tr>
              <tr>
                <td>No. Telp</td>
                <td><input type="text" class="form-control" readonly name="phone_number_buyer" id="edit_phone_number_buyer"></td>
              </tr>
            </table>
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
              </thead>
              <tbody id = "detail_list_produk">
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
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
    $("#edit_total_harga").val(format_number(content[row]["ekatalog_total_harga"]));
    $("#edit_total_harga_info").text(content[row]["ekatalog_total_harga_online"]);
    $("#edit_status_paket").val(content[row]["ekatalog_status_paket"]);
    $("#edit_posisi_paket").val(content[row]["ekatalog_posisi_paket"]);
    $("#edit_nama_pp").val(content[row]["ekatalog_nama_pp"]);
    $("#edit_position_pp").val(content[row]["ekatalog_position_pp"]);
    $("#edit_nip_pp").val(content[row]["ekatalog_nip_pp"]);
    $("#edit_email_pp").val(content[row]["ekatalog_email_pp"]);
    $("#edit_phone_number_pp").val(content[row]["ekatalog_phone_number_pp"]);
    $("#edit_nama_buyer").val(content[row]["ekatalog_nama_buyer"]);
    $("#edit_position_buyer").val(content[row]["ekatalog_position_buyer"]);
    $("#edit_nip_buyer").val(content[row]["ekatalog_nip_buyer"]);
    $("#edit_email_buyer").val(content[row]["ekatalog_email_buyer"]);
    $("#edit_phone_number_buyer").val(content[row]["ekatalog_phone_number_buyer"]);

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
            <input type = "hidden" readonly name = "edit_produk_ekatalog[]" value = "${a}">
            <input type = "hidden" readonly name = "id_ekatalog_produk${a}" value = "${respond[a]["id_pk_ekatalog_produk"]}">
            <td>
              <textarea class = "form-control" readonly name = "ekatalog_produk_nama_produk${a}">${respond[a]["ekatalog_produk_nama_produk"]}</textarea>
            </td>
            <td>
              <input type = "text" class = "form-control" value = "${respond[a]["ekatalog_produk_kuantitas_online"]}" readonly name = "ekatalog_produk_kuantitas${a}"></td>
            <td>
              <input type = "text" class = "form-control" value = "${respond[a]["ekatalog_produk_mata_uang"]}" readonly name = "ekatalog_produk_mata_uang${a}"></td>
            <td>
              <input type = "text" class = "form-control nf-input" value = "${format_number(respond[a]["ekatalog_produk_harga_satuan"])}" readonly name = "ekatalog_produk_harga_satuan${a}"></td>
            <td>
              <input type = "text" class = "form-control nf-input" value = "${format_number(respond[a]["ekatalog_produk_perkiraan_ongkos_kirim"])}" readonly name = "ekatalog_produk_perkiraan_ongkos_kirim${a}"></td>
            <td>
              <input type = "text" class = "form-control nf-input" value = "${format_number(respond[a]["ekatalog_produk_total_harga"])}" readonly name = "ekatalog_produk_total_harga${a}"></td>
            <td>
              <textarea class = "form-control" readonly name = "ekatalog_produk_catatan${a}">${respond[a]["ekatalog_produk_catatan"]}</textarea>
            </td>
          </tr>
          `;
        }
        $("#detail_list_produk").html(html);
        init_nf();
      }
    });
    $("#updateModal").modal("show");
  }
</script>