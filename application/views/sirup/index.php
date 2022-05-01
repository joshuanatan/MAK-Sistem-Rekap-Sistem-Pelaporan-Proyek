<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta"); ?>
  <?php $this->load->view("includes/core-head"); ?>
  <title>MAK-CRM | SiRUP</title>
</head>

<body class="animsition site-navbar-small ">

  <?php $this->load->view("includes/navbar"); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/structure/pagination.css">
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Data Penarikan SiRUP LKPP</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">SiRUP</a></li>
        <li class="breadcrumb-item active">Data Penarikan</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body">
          <form action="<?php echo base_url(); ?>sirup/export" method="POST">

            <div class="row">
              <div class="form-group col-lg-1">
                <h5>&nbsp;</h5>
                <a href="<?php echo base_url(); ?>sirup/buatan" class="btn btn-primary btn-sm">Tambah Data</a>
              </div>
              <div class="form-group col-lg-1">
                <h5>&nbsp;</h5>
                <button type="button" class="btn btn-primary btn-sm" data-target="#pencarianModal" data-toggle="modal">Lihat Pencarian</button>
              </div>
              <div class="form-group col-lg-1">
                <h5>&nbsp;</h5>
                <button type="button" class="btn btn-primary btn-sm" onclick="refresh_sirup()">Perbaharui Data</button>
              </div>
              <div class="form-group col-lg-1">
                <h5>&nbsp;</h5>
              </div>

              <div class="form-group col-lg-2">
                <h5>Kolom Pengurutan</h5>
                <select class="form-control" name="kolom_pengurutan" onchange="change_kolom_pengurutan()" id="kolom_pengurutan">
                  <?php for ($a = 0; $a < count($field); $a++) : ?>
                    <option value="<?php echo $field[$a]["field_value"]; ?>"><?php echo $field[$a]["field_text"]; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="form-group col-lg-1">
                <h5>Urutan</h5>
                <select class="form-control" id="urutan_kolom" name="urutan" onchange="change_arah_pengurutan()" id="urutan_kolom">
                  <option value="ASC">A-Z</option>
                  <option value="DESC">Z-A</option>
                </select>
              </div>
              <div class="form-group col-lg-3">
                <h5>Pencarian</h5>
                <input type="text" class="form-control" name="pencarian_phrase" onclick="change_pencarian()" oninput="change_pencarian()" id="pencarian">
              </div>
              <div class="form-group col-lg-2">
                <h5>Kolom Pencarian</h5>
                <select class="form-control" onchange="change_pencarian_kolom()" name="kolom_pencarian" id="pencarian_kolom">
                  <option value="all">Semua</option>
                  <?php for ($a = 0; $a < count($field); $a++) : ?>
                    <option value="<?php echo $field[$a]["field_value"]; ?>"><?php echo $field[$a]["field_text"]; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            <button class="btn btn-success btn-sm" type="submit">Export Excel</button><br />
          </form>
          <br>
          <div class="form-group col-lg-2">
                <h5>Funnel Prospek</h5>
                <select class="form-control" name="sirup_funnel" onchange="change_sirup_funnel()" id="sirup_funnel">
                    <option value="0" selected>Default</option>
                    <option value="1">Sudah Funnel Propsek</option>
                    <option value="2">Belum Funnel Propsek</option>
                </select>
              </div>
          <div class="table-responsive">

            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>ID Sirup</th>
                  <th>Keyword</th>
                  <th>Paket</th>
                  <th>Pagu</th>
                  <th>Jenis Pekerjaan</th>
                  <th>Satuan Kerja</th>
                  <th>Volume Pekerjaan</th>
                  <th>Uraian Pekerjaan</th>
                  <th>Spesifikasi Pekerjaan</th>
                  <th>Tanggal Query</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="table_content_container">
              </tbody>
            </table>
          </div>
          <nav class="d-flex justify-content-center">
            <ul class="pagination">
              <li class="disabled page-item">
                <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="active page-item"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
              <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0)" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
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

<script>
  const refresh_sirup = () => {
    alert("Data sedang diperbaharui, silahkan tunggu beberapa saat");
    $.ajax({
      url:"<?php echo base_url();?>sch_sirup/execute_all_function",
      type:"GET",
      async:true,
    }).then(() => {
      window.location.reload();
    })
  }
</script>

<script>
  var base_url = "<?php echo base_url(); ?>";
  var kolom_pengurutan = "id_pk_sirup";
  var arah_kolom_pengurutan = "DESC";
  var pencarian_phrase = "";
  var kolom_pencarian = "all";
  var funnel = "0";
  var current_page = 1;
  var content = [];
  reload_table();

  function change_kolom_pengurutan() {
    var pengurutan = $("#kolom_pengurutan").val();
    kolom_pengurutan = pengurutan;
    reload_table();
  }

  function change_sirup_funnel() {
    var sirup_funnel = $("#sirup_funnel").val();
    funnel = sirup_funnel;
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
    var url = `<?php echo base_url(); ?>ws/sirup/get_data_system?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}&funnel=${funnel}`;
    $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        content = respond["data"];
        for (var a = 0; a < respond["data"].length; a++) {
          html += `
          <tr id = "sirup_row${a}">
            <td>${respond["data"][a]["sirup_rup"]}</td>
            <td>${respond["data"][a]["pencarian_sirup_frase"]}</td>
            <td>${respond["data"][a]["sirup_paket"]}</td>
            <td>${format_number(respond["data"][a]["sirup_total"])}</td>
            <td>${respond["data"][a]["sirup_jenis_pengadaan"]}</td>
            <td>${respond["data"][a]["sirup_satuan_kerja"]}</td>
            <td>${respond["data"][a]["sirup_volume_pekerjaan"]}</td>
            <td>${respond["data"][a]["sirup_uraian_pekerjaan"]}</td>
            <td>${respond["data"][a]["sirup_spesifikasi_pekerjaan"]}</td>
            <td>${respond["data"][a]["sirup_tgl_create"]}</td>
            <td><button type = "button" onclick = "load_edit(${a})" class = "btn btn-light btn-sm" data-toggle="modal" data-target="#updateSirupModal"><i class="icon md-search" aria-hidden="true"></i></button></td>
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

<div class="modal fade" id="updateSirupModal">
  <div class="modal-dialog modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Update Data SiRUP</h4>
      </div>
      <form id="update_form">
        <input type="hidden" name="id_sirup" id="edit_id_sirup">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">Kode RUP</label>
            <input type="text" class="form-control" readonly name="kode_rup" id="edit_kode_rup">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Paket</label>
            <input type="text" class="form-control" readonly name="nama_paket" id="edit_nama_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama KLPD</label>
            <input type="text" class="form-control" readonly name="nama_klpd" id="edit_nama_klpd">
          </div>
          <div class="form-group">
            <label class="form-control-label">Satuan Kerja</label>
            <input type="text" class="form-control" readonly name="satuan_kerja" id="edit_satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tahun Anggaran</label>
            <input type="number" class="form-control" readonly name="tahun_anggaran" id="edit_tahun_anggaran">
          </div>
          <div class="form-group">
            <label class="form-control-label">Lokasi Pekerjaan</label>
            <div class="table-responsive">
              <table class="table table-bordered table-stripped">
                <thead>
                  <th>Provinsi</th>
                  <th>Kabupaten/Kota</th>
                  <th>Detail Lokasi</th>
                </thead>
                <tbody id="edit_lokasi_pekerjaan">
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Volume Pekerjaan</label>
            <input type="text" class="form-control nf-input" readonly name="volume_pekerjaan" id="edit_volume_pekerjaan">
          </div>
          <div class="form-group">
            <label class="form-control-label">Uraian Pekerjaan</label>
            <textarea class="form-control" readonly name="uraian_pekerjaan" id="edit_uraian_pekerjaan"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Spesifikasi Pekerjaan</label>
            <textarea class="form-control" readonly name="spesifikasi_pekerjaan" id="edit_spesifikasi_pekerjaan"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Produk Dalam Negeri</label>
            <select class="form-control" readonly name="produk_dalam_negeri" id="edit_produk_dalam_negeri">
              <option value="ya">YA</option>
              <option value="tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Usaha Kecil</label>
            <select class="form-control" readonly name="usaha_kecil" id="edit_usaha_kecil">
              <option value="ya">YA</option>
              <option value="tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Pra DIPA/DPA</label>
            <select class="form-control" readonly name="pra_dipa_dpa" id="edit_pra_dipa_dpa">
              <option value="ya">YA</option>
              <option value="tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Sumber Dana</label>
            <div class="table-responsive">
              <table class="table table-bordered table-stripped">
                <thead>
                  <th>Sumber Dana</th>
                  <th>T.A</th>
                  <th>KLPD</th>
                  <th>MAK</th>
                  <th>Pagu</th>
                </thead>
                <tbody id="edit_sumber_dana">
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Jenis Pengadaan</label>
            <input type="text" class="form-control" readonly name="jenis_pengadaan" id="edit_jenis_pengadaan">
          </div>
          <div class="form-group">
            <label class="form-control-label">Total Pagu</label>
            <input type="text" class="form-control nf-input" readonly name="total_pagu" id="edit_total_pagu">
          </div>
          <div class="form-group">
            <label class="form-control-label">Metode Pemilihan</label>
            <input type="text" class="form-control" readonly name="metode_pemilihan" id="edit_metode_pemilihan">
          </div>
          <div class="form-group">
            <label class="form-control-label">Pemanfaatan Barang/Jasa</label>
            <div class="table-responsive">
              <table class="table table-bordered table-stripped">
                <thead>
                  <th>Mulai</th>
                  <th>Akhir</th>
                </thead>
                <tbody id="edit_pemanfaatan_barang">
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Jadwal Pelaksanaan Kontrak</label>
            <div class="table-responsive">
              <table class="table table-bordered table-stripped">
                <thead>
                  <th>Mulai</th>
                  <th>Akhir</th>
                </thead>
                <tbody id="edit_pelaksanaan_kontrak">
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Jadwal Pemilihan Penyedia</label>
            <div class="table-responsive">
              <table class="table table-bordered table-stripped">
                <thead>
                  <th>Mulai</th>
                  <th>Akhir</th>
                </thead>
                <tbody id="edit_jadwal_pemilihan">
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Histori Paket</label>
            <input type="text" class="form-control" readonly name="histori_paket" id="edit_histori_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Perbaharui Paket</label>
            <input type="text" class="form-control" readonly name="tgl_perbarui_paket" id="edit_tgl_perbarui_paket" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  var content = "";

  function load_edit(row) {
    $("#edit_id_sirup").val(content[row]["id_pk_sirup"]);
    $("#edit_kode_rup").val(content[row]["sirup_rup"]);
    $("#edit_nama_paket").val(content[row]["sirup_paket"]);
    $("#edit_nama_klpd").val(content[row]["sirup_klpd"]);
    $("#edit_satuan_kerja").val(content[row]["sirup_satuan_kerja"]);
    $("#edit_tahun_anggaran").val(content[row]["sirup_tahun_anggaran"]);
    $("#edit_volume_pekerjaan").val(content[row]["sirup_volume_pekerjaan"]);
    $("#edit_uraian_pekerjaan").val(content[row]["sirup_uraian_pekerjaan"]);
    $("#edit_spesifikasi_pekerjaan").val(content[row]["sirup_spesifikasi_pekerjaan"]);
    $("#edit_produk_dalam_negeri").val(content[row]["sirup_produk_dalam_negri"]);
    $("#edit_usaha_kecil").val(content[row]["sirup_usaha_kecil"]);
    $("#edit_pra_dipa_dpa").val(content[row]["sirup_pra_dipa"]);
    $("#edit_jenis_pengadaan").val(content[row]["sirup_jenis_pengadaan"]);
    $("#edit_total_pagu").val(format_number(content[row]["sirup_total"]));
    $("#edit_metode_pemilihan").val(content[row]["sirup_metode_pemilihan"]);
    $("#edit_histori_paket").val(content[row]["sirup_histori_paket"]);
    $("#edit_tgl_perbarui_paket").val(content[row]["sirup_tgl_perbarui_paket"]);

    $.ajax({
      url: "<?php echo base_url(); ?>ws/sirup/get_detail_lokasi_pekerjaan/" + content[row]["id_pk_sirup"],
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        for (var a = 0; a < respond.length; a++) {
          var split = respond[a]["lokasi_pekerjaan"].split("|");
          if (split.length > 1) {
            html += `
          <tr class = "lokasi_pekerjaan_row_edit" id = "lokasi_pekerjaan_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_lokasi_pekerjaan"]}" name = "edit_id_pk_lokasi_pekerjaan${a}" id = "id_lokasi_pekerjaan${a}">
            <input type = "hidden" name = "edit_lokasi_pekerjaan[]" value = "${a}">
            <td><input type = "text" class = "form-control" name = "edit_provinsi${a}" value = "${split[0]}"></td>
            <td><input type = "text" class = "form-control" name = "edit_kabupaten${a}" value = "${split[1]}"></td>
            <td><input type = "text" class = "form-control" name = "edit_detail_lokasi${a}" value = "${split[2]}"></td>
          </tr>`;
          } else {
            html += `
          <tr class = "lokasi_pekerjaan_row_edit" id = "lokasi_pekerjaan_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_lokasi_pekerjaan"]}" name = "edit_id_pk_lokasi_pekerjaan${a}" id = "id_lokasi_pekerjaan${a}">
            <td colspan = 3>${respond[a]["lokasi_pekerjaan"]}</td>
          </tr>
          `;
          }
        }
        $(".lokasi_pekerjaan_row_edit").remove();
        $("#edit_lokasi_pekerjaan").html(html);
      }
    });

    $.ajax({
      url: "<?php echo base_url(); ?>ws/sirup/get_detail_sumber_dana/" + content[row]["id_pk_sirup"],
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        for (var a = 0; a < respond.length; a++) {
          var split = respond[a]["sumber_dana"].split("|");
          if (split.length > 1) {
            html += `
          <tr class = "sumber_dana_row_edit" id = "sumber_dana_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_sumber_dana"]}" name = "edit_id_pk_sumber_dana${a}" id = "id_sumber_dana${a}">
            <input type = "hidden" name = "edit_sumber_dana[]" value = "${a}">
            <td><input type = "text" class = "form-control" readonly name = "edit_sumber_dana${a}" value = "${split[0]}"></td>
            <td><input type = "text" class = "form-control" readonly name = "edit_ta${a}" value = "${split[1]}"></td>
            <td><input type = "text" class = "form-control" readonly name = "edit_klpd${a}" value = "${split[2]}"></td>
            <td><input type = "text" class = "form-control" readonly name = "edit_mak${a}" value = "${split[3]}"></td>
            <td><input type = "text" class = "form-control nf-input" readonly name = "edit_pagu${a}" value = "${format_number(split[4])}"></td>
          </tr>
          `;
          } else {
            html += `
          <tr class = "sumber_dana_row_edit" id = "sumber_dana_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_sumber_dana"]}" readonly name = "edit_id_pk_sumber_dana${a}" id = "id_sumber_dana${a}">
            <td colspan = 5>${respond[a]["sumber_dana"]}</td>
          </tr>
          `;
          }
        }
        $(".sumber_dana_row_edit").remove();
        $("#edit_sumber_dana").html(html);
        init_nf();
      }
    });

    $.ajax({
      url: "<?php echo base_url(); ?>ws/sirup/get_detail_pemanfaatan_barang/" + content[row]["id_pk_sirup"],
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        for (var a = 0; a < respond.length; a++) {
          var split = respond[a]["pemanfaatan_barang"].split("|");
          if (split.length > 1) {
            html += `
          <tr class = "pemanfaatan_barang_row_edit" id = "pemanfaatan_barang_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_pemanfaatan_barang"]}" name = "edit_id_pk_pemanfaatan_barang${a}" id = "id_pemanfaatan_barang${a}">
            <input type = "hidden" name = "edit_pemanfaatan_barang[]" value = "${a}">
            <td><input type = "text" class = "form-control" value = "${split[0]}" readonly name = "edit_mulai_pemanfaatan_barang${a}"></td>
            <td><input type = "text" class = "form-control" value = "${split[1]}" readonly name = "edit_akhir_pemanfaatan_barang${a}"></td>
          </tr>`;
          } else {
            html += `
          <tr class = "pemanfaatan_barang_row_edit" id = "pemanfaatan_barang_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_pemanfaatan_barang"]}" readonly name = "edit_id_pk_pemanfaatan_barang${a}" id = "id_pemanfaatan_barang${a}">
            <td colspan = 2 >${respond[a]["pemanfaatan_barang"]}</td>
          </tr>
          `;
          }
        }
        $(".pemanfaatan_barang_row_edit").remove();
        $("#edit_pemanfaatan_barang").html(html);
      }
    });

    $.ajax({
      url: "<?php echo base_url(); ?>ws/sirup/get_detail_pelaksanaan_kontrak/" + content[row]["id_pk_sirup"],
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        for (var a = 0; a < respond.length; a++) {
          var split = respond[a]["jadwal_pelaksanaan"].split("|");
          if (split.length > 1) {
            html += `
          <tr class = "pelaksanaan_kontrak_row_edit" id = "pelaksanaan_kontrak_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_jadwal_pelaksanaan"]}" name = "edit_id_pk_jadwal_pelaksanaan${a}" id = "id_pelaksanaan_kontrak${a}">
            <input type = "hidden" name = "edit_jadwal_pelaksanaan[]" value = "${a}">
            <td><input type = "text" class = "form-control" value = "${split[0]}" readonly name = "edit_mulai_jadwal_pelaksanaan${a}"></td>
            <td><input type = "text" class = "form-control" value = "${split[1]}" readonly name = "edit_akhir_jadwal_pelaksanaan${a}"></td>
          </tr>`;
          } else {
            html += `
          <tr class = "pelaksanaan_kontrak_row_edit" id = "pelaksanaan_kontrak_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_jadwal_pelaksanaan"]}" readonly name = "edit_id_pk_jadwal_pelaksanaan${a}" id = "id_pelaksanaan_kontrak${a}">
            <td colspan = 2>${respond[a]["jadwal_pelaksanaan"]}</td>
          </tr>
          `;
          }
        }
        $(".pelaksanaan_kontrak_row_edit").remove();
        $("#edit_pelaksanaan_kontrak").html(html);
      }
    });

    $.ajax({
      url: "<?php echo base_url(); ?>ws/sirup/get_detail_jadwal_pemilihan/" + content[row]["id_pk_sirup"],
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var html = "";
        for (var a = 0; a < respond.length; a++) {
          var split = respond[a]["pemilihan_penyedia"].split("|");
          if (split.length > 1) {
            html += `
          <tr class = "pemilihan_penyedia_row_edit" id = "pemilihan_penyedia_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_pemilihan_penyedia"]}" name = "edit_id_pk_pemilihan_penyedia${a}" id = "id_pemilihan_penyedia${a}">
            <input type = "hidden" name = "edit_pemilihan_penyedia[]" value = "${a}">
            <td><input type = "text" class = "form-control" value = "${split[0]}" readonly name = "edit_mulai_pemilihan_penyedia${a}"></td>
            <td><input type = "text" class = "form-control" value = "${split[1]}" readonly name = "edit_akhir_pemilihan_penyedia${a}"></td>
          </tr>`;
          } else {
            html += `
          <tr class = "pemilihan_penyedia_row_edit" id = "pemilihan_penyedia_row_edit${a}">
            <input type = "hidden" value = "${respond[a]["id_pk_pemilihan_penyedia"]}" readonly name = "edit_id_pk_pemilihan_penyedia${a}" id = "id_pemilihan_penyedia${a}">
            <td colspan = 2>${respond[a]["pemilihan_penyedia"]}</td>
          </tr>
          `;
          }
        }
        $(".pemilihan_penyedia_row_edit").remove();
        $("#edit_jadwal_pemilihan").html(html);
      }
    });
    $("#updateSirupModal").modal("show");
  }
</script>
<div class="modal fade" id="pencarianModal">
  <div class="modal-dialog modal-lg modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="exampleModalTitle">Daftar Pencarian</h4>
      </div>
      <form action="<?php echo base_url(); ?>sirup/insert_pencarian" method="POST">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered table-stripped table-hover">
              <thead>
                <th>#</th>
                <th>Tahun Pencarian</th>
                <th>Frase Pencarian</th>
                <th>Jenis Pengadaan</th>
                <th>Action</th>
              </thead>
              <tbody id="daftar_pencarian_container">
                <?php for ($a = 0; $a < count($pencarian_sirup); $a++) : ?>
                  <tr class="pencarian_row" id="pencarian_row<?php echo $a; ?>">
                    <td>
                      <input type="checkbox" name="edit[]" id="edit_checkbox<?php echo $a; ?>" value="<?php echo $a; ?>">
                      <input type="hidden" value="<?php echo $pencarian_sirup[$a]["id_pk_pencarian_sirup"]; ?>" name="id_pencarian<?php echo $a; ?>" id="id_pencarian<?php echo $a; ?>">
                    </td>
                    <td>
                      <input oninput="activate_edit_check(<?php echo $a; ?>)" type="number" value="<?php echo $pencarian_sirup[$a]["pencarian_sirup_tahun"]; ?>" name="tahun_pencarian<?php echo $a; ?>" class="form-control" id="tahun_pencarian<?php echo $a; ?>">
                    </td>
                    <td>
                      <input oninput="activate_edit_check(<?php echo $a; ?>)" type="text" value="<?php echo $pencarian_sirup[$a]["pencarian_sirup_frase"]; ?>" name="frase_pencarian<?php echo $a; ?>" class="form-control" id="frase_pencarian<?php echo $a; ?>">
                    </td>
                    <td>
                      <select id="jenis_pencarian<?php echo $a; ?>" oninput="activate_edit_check(<?php echo $a; ?>)" name="jenis_pencarian<?php echo $a; ?>" class="form-control">
                        <option value="0">Semua Jenis Pengadaan</option>
                        <option value="1" <?php if ($pencarian_sirup[$a]["pencarian_sirup_jenis"] == 1) echo "selected"; ?>>Barang</option>
                        <option value="3" <?php if ($pencarian_sirup[$a]["pencarian_sirup_jenis"] == 3) echo "selected"; ?>>Jasa Konsultansi</option>
                        <option value="4" <?php if ($pencarian_sirup[$a]["pencarian_sirup_jenis"] == 4) echo "selected"; ?>>Jasa Lainnya</option>
                        <option value="2" <?php if ($pencarian_sirup[$a]["pencarian_sirup_jenis"] == 2) echo "selected"; ?>>Pekerjaan Konstruksi</option>
                      </select>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger btn-sm" onclick="konfirmasi_delete_pencarian(<?php echo $a; ?>)"><i class="icon md-delete"></i></button>
                    </td>
                  </tr>
                <?php endfor; ?>
                <tr id="daftar_pencarian_tambah_button">
                  <td colspan=5><button type="button" class="btn btn-primary btn-sm col-lg-12" onclick="add_row_daftar_pencarian()">Tambah Pencarian</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  count_new_daftar_pencarian = $(".pencarian_row").length;

  function add_row_daftar_pencarian() {
    var html = `
    <tr class = "pencarian_row" id = "pencarian_row${count_new_daftar_pencarian}">
      <input type = "hidden" value = 0 id = "id_pencarian${count_new_daftar_pencarian}">
      <td><input checked type = "checkbox" name = "check[]" value = "${count_new_daftar_pencarian}"> (New)</td>
      <td><input id = "tahun_pencarian${count_new_daftar_pencarian}" type = "number" value = "<?php echo date("Y"); ?>" name = "tahun_pencarian${count_new_daftar_pencarian}" class = "form-control"></td>
      <td><input id = "frase_pencarian${count_new_daftar_pencarian}" type = "text" name = "frase_pencarian${count_new_daftar_pencarian}" class = "form-control"></td>
      <td>
        <select id = "jenis_pencarian${count_new_daftar_pencarian}" name = "jenis_pencarian${count_new_daftar_pencarian}" class="form-control">
          <option value="0">Semua Jenis Pengadaan</option>
          <option value="1" >Barang</option>
          <option value="3" >Jasa Konsultansi</option>
          <option value="4" >Jasa Lainnya</option>
          <option value="2" >Pekerjaan Konstruksi</option>
        </select>
      </td>
      <td>
        <button type = "button" class = "btn btn-danger btn-sm" onclick = "konfirmasi_delete_pencarian(${count_new_daftar_pencarian})"><i class = "icon md-delete"></i></button>
      </td>
    </tr>
    `;
    $("#daftar_pencarian_tambah_button").before(html);
    count_new_daftar_pencarian++;
  }

  function activate_edit_check(row) {
    $(`#edit_checkbox${row}`).attr("checked", true);
  }

  function konfirmasi_delete_pencarian(row) {
    var tahun = $(`#tahun_pencarian${row}`).val();
    $("#konfirmasiHapusPencarianModalTahun").html(tahun);
    var frase = $(`#frase_pencarian${row}`).val();
    $("#konfirmasiHapusPencarianModalFrase").html(frase);
    var jenis = $(`#jenis_pencarian${row} option:selected`).text();
    $("#konfirmasiHapusPencarianModalJenis").html(jenis);

    $("#deleteButtonPencarian").attr("onclick", `hapus_pencarian(${row})`)
    $('#konfirmasiHapusPencarianModal').modal('show');
  }

  function hapus_pencarian(row) {
    var id = $(`#id_pencarian${row}`).val();
    var keyword = $(`#frase_pencarian${row}`).val();
    if (id == 0) {
      $('#konfirmasiHapusPencarianModal').modal('hide');
      $(`#pencarian_row${row}`).remove();
    } else {
      $.ajax({
        url: "<?php echo base_url(); ?>ws/sirup/delete_pencarian/" + id + "/" + keyword ,
        type: "DELETE",
        dataType: "JSON",
        success: function(respond) {
          if (respond["status"] == "success") {
            alert(respond["msg"]);
            $('#konfirmasiHapusPencarianModal').modal('hide');
            $(`#pencarian_row${row}`).remove();
          } else {
            alert(respond["msg"]);
          }
        }
      })
    }
  }
</script>

<div class="modal fade" id="konfirmasiHapusPencarianModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="modal-title">
          <h4>Konfirmasi Hapus</h4>
        </div>
      </div>
      <div class="modal-body">
        <h5 align="center">Apakah yakin akan menghapus data pencarian dengan frase <i>"<span id="konfirmasiHapusPencarianModalFrase"></span>"</i> tahun <i><span id="konfirmasiHapusPencarianModalTahun"></span></i> jenis pengadaan <i><span id="konfirmasiHapusPencarianModalJenis"></span></i></h5>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button id="deleteButtonPencarian" type="button" class="btn btn-danger btn-sm">Hapus</a>
      </div>
    </div>
  </div>
</div>