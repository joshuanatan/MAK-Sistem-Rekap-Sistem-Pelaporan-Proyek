
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta");?>
    <?php $this->load->view("includes/core-head");?>
    <title>MAK-CRM | SiRUP</title>
  </head>
  <body class="animsition site-navbar-small ">
    
    <?php $this->load->view("includes/navbar");?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/structure/pagination.css">
    <!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Data SiRUP</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
          <li class="breadcrumb-item active">SiRUP</li>
        </ol>
      </div>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            
            <div class = "row">
              <div class = "form-group col-lg-1">
                <h5>&nbsp;</h5>
                <button type = "button" class = "btn btn-primary btn-sm" data-target="#insertModal" data-toggle="modal">Tambah Data</button>
              </div>
              <div class = "form-group col-lg-1">
                <h5>&nbsp;</h5>
                <button type = "button" class = "btn btn-primary btn-sm" data-target="#pencarianModal" data-toggle="modal">Lihat Pencarian</button>
              </div>
              <!--
              <div class = "form-group col-lg-3">
                <h5>Kolom Pengurutan</h5>
                <select class = "form-control"></select>
              </div>
              <div class = "form-group col-lg-1">
                <h5>Urutan</h5>
                <select class = "form-control">
                  <option value = "ASC">A-Z</option>
                  <option value = "DESC">Z-A</option>
                </select>
              </div>
              <div class = "form-group col-lg-3">
                <h5>Pencarian</h5>
                <input type = "text" class = "form-control">
              </div>
              <div class = "form-group col-lg-2">
                <h5>Kolom Pencarian</h5>
                <select class = "form-control">
                  <option value = "ASC">Semua</option>
                </select>
              </div>
              <div class = "form-group col-lg-1">
                <h5>Jumlah Data</h5>
                <select class = "form-control">
                  <option value = "20">20</option>
                  <option value = "30">30</option>
                  <option value = "50">50</option>
                  <option value = "100">100</option>
                </select>
              </div>
            -->
            </div>
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Paket</th>
                  <th>Pagu</th>
                  <th>Jenis Pengadaan</th>
                  <th>Metode Pemilihan</th>
                  <th>K/L/PD</th>
                  <th>Satuan Kerja</th>
                </tr>
              </thead>
              <tbody>
                <?php for($a = 0; $a<count($sirup); $a++):?>
                <tr>
                  <td><?php echo $sirup[$a]["sirup_rup"];?></td>
                  <td><?php echo $sirup[$a]["sirup_paket"];?></td>
                  <td><?php echo $sirup[$a]["sirup_total"];?></td>
                  <td><?php echo $sirup[$a]["sirup_jenis_pengadaan"];?></td>
                  <td><?php echo $sirup[$a]["sirup_metode_pemilihan"];?></td>
                  <td><?php echo $sirup[$a]["sirup_klpd"];?></td>
                  <td><?php echo $sirup[$a]["sirup_satuan_kerja"];?></td>
                </tr>
                <?php endfor;?>
              </tbody>
            </table>
            <!--
            <nav class = "d-flex justify-content-center">
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
            -->
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

<div class="modal fade" id="insertModal">
  <div class="modal-dialog modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="exampleModalTitle">Tambah Data SiRUP</h4>
      </div>
      <form action = "<?php echo base_url();?>sirup/insert" method = "POST">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Kode RUP</label>
            <input type = "text" class = "form-control" name = "kode_rup">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Nama Paket</label>
            <input type = "text" class = "form-control" name = "nama_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Nama KLPD</label>
            <input type = "text" class = "form-control" name = "nama_klpd">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Satuan Kerja</label>
            <input type = "text" class = "form-control" name = "satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Tahun Anggaran</label>
            <input type = "number" class = "form-control" name = "tahun_anggaran">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Lokasi Pekerjaan</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>No.</th>
                <th>Provinsi</th>
                <th>Kabupaten/Kota</th>
                <th>Detail Lokasi</th>
              </thead>
              <tbody>
                <tr id = "add_lokasi_pekerjaan_button_container">
                  <td colspan = "4"><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_lokasi_pekerjaan_row()">Tambah Lokasi Pekerjaan</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Volume Pekerjaan</label>
            <input type = "text" class = "form-control" name = "volume_pekerjaan">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Uraian Pekerjaan</label>
            <textarea class="form-control" name = "uraian_pekerjaan"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Spesifikasi Pekerjaan</label>
            <textarea class="form-control" name = "spesifikasi_pekerjaan"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Produk Dalam Negeri</label>
            <select class = "form-control" name = "produk_dalam_negeri">
              <option value = "ya">YA</option>
              <option value = "tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Usaha Kecil</label>
            <select class = "form-control" name = "usaha_kecil">
              <option value = "ya">YA</option>
              <option value = "tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Pra DIPA/DPA</label>
            <select class = "form-control" name = "pra_dipa_dpa">
              <option value = "ya">YA</option>
              <option value = "tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Sumber Dana</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>No.</th>
                <th>Sumber Dana</th>
                <th>T.A</th>
                <th>KLPD</th>
                <th>MAK</th>
                <th>Pagu</th>
              </thead>
              <tbody>
                <tr id = "add_sumber_dana_button_container">
                  <td colspan = "6"><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_sumber_dana_row()">Tambah Sumber Dana</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Jenis Pengadaan</label>
            <input type = "text" class = "form-control" name = "jenis_pengadaan">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Total Pagu</label>
            <input type = "text" class = "form-control" name = "total_pagu">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Metode Pemilihan</label>
            <input type = "text" class = "form-control" name = "metode_pemilihan">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Pemanfaatan Barang/Jasa</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>#</th>
                <th>Mulai</th>
                <th>Akhir</th>
              </thead>
              <tbody>
                <tr id = "add_pemanfaatan_barang_button_container">
                  <td colspan = "3"><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_pemanfaatan_barang_row()">Tambah Pemanfaatan Barang/Jasa</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Jadwal Pelaksanaan Kontrak</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>#</th>
                <th>Mulai</th>
                <th>Akhir</th>
              </thead>
              <tbody>
                <tr id = "add_pelaksanaan_kontrak_button_container">
                  <td colspan = "3"><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_pelaksanaan_kontrak_row()">Tambah Pelaksanaan Kontrak</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Jadwal Pemilihan Penyedia</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>#</th>
                <th>Mulai</th>
                <th>Akhir</th>
              </thead>
              <tbody>
                <tr id = "add_jadwal_pemilihan_button_container">
                  <td colspan = "3"><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_pemilihan_penyedia_row()">Tambah Jadwal Pemilihan Penyedia</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Histori Paket</label>
            <input type = "text" class = "form-control" name = "histori_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">Tanggal Perbaharui Paket</label>
            <input type = "date" class = "form-control" name = "tgl_perbarui_paket">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="pencarianModal">
  <div class="modal-dialog modal-lg modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="exampleModalTitle">Daftar Pencarian</h4>
      </div>
      <form action = "<?php echo base_url();?>sirup/insert_pencarian" method = "POST">
        <div class="modal-body">
          <table class = "table table-bordered table-stripped table-hover">
            <thead>
              <th>#</th>
              <th>Tahun Pencarian</th>
              <th>Frase Pencarian</th>
              <th>Jenis Pengadaan</th>
              <th>Action</th>
            </thead>
            <tbody id = "daftar_pencarian_container">
              <?php for($a = 0; $a<count($pencarian_sirup); $a++):?>
                <tr class = "pencarian_row" id = "pencarian_row<?php echo $a;?>">
                  <td>
                    <input 
                      type = "checkbox" 
                      name = "edit[]" 
                      id = "edit_checkbox<?php echo $a;?>" 
                      value = "<?php echo $a;?>"
                    >
                    <input 
                      type = "hidden" 
                      value = "<?php echo $pencarian_sirup[$a]["id_pk_pencarian_sirup"];?>"
                      name = "id_pencarian<?php echo $a;?>"
                      id = "id_pencarian<?php echo $a;?>"
                    >
                  </td>
                  <td>
                    <input 
                      oninput = "activate_edit_check(<?php echo $a;?>)" 
                      type = "number" 
                      value = "<?php echo $pencarian_sirup[$a]["pencarian_sirup_tahun"];?>" 
                      name = "tahun_pencarian<?php echo $a;?>" 
                      class = "form-control"
                      id = "tahun_pencarian<?php echo $a;?>"
                    ></td>
                  <td>
                    <input 
                      oninput = "activate_edit_check(<?php echo $a;?>)" 
                      type = "text" 
                      value = "<?php echo $pencarian_sirup[$a]["pencarian_sirup_frase"];?>" 
                      name = "frase_pencarian<?php echo $a;?>" 
                      class = "form-control"
                      id = "frase_pencarian<?php echo $a;?>"
                    >
                  </td>
                  <td>
                    <select id = "jenis_pencarian<?php echo $a;?>" oninput = "activate_edit_check(<?php echo $a;?>)" name = "jenis_pencarian<?php echo $a;?>" class="form-control">
                      <option value="0">Semua Jenis Pengadaan</option>
                      <option value="1" <?php if($pencarian_sirup[$a]["pencarian_sirup_jenis"] == 1) echo "selected";?>>Barang</option>
                      <option value="3" <?php if($pencarian_sirup[$a]["pencarian_sirup_jenis"] == 3) echo "selected";?>>Jasa Konsultansi</option>
                      <option value="4" <?php if($pencarian_sirup[$a]["pencarian_sirup_jenis"] == 4) echo "selected";?>>Jasa Lainnya</option>
                      <option value="2" <?php if($pencarian_sirup[$a]["pencarian_sirup_jenis"] == 2) echo "selected";?>>Pekerjaan Konstruksi</option>
                    </select>
                  </td>
                  <td>
                    <button type = "button" class = "btn btn-danger btn-sm" onclick = "konfirmasi_delete_pencarian(<?php echo $a;?>)"><i class = "icon md-delete"></i></button>
                  </td>
                </tr>
              <?php endfor;?>
              <tr id = "daftar_pencarian_tambah_button">
                <td colspan = "5"><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_row_daftar_pencarian()">Tambah Pencarian</button></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
          <a href = "<?php echo base_url();?>routines/sirup/load_sirup" target = "_blank" class = "btn btn-primary">Query ke SiRUP</a>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  count_new_daftar_pencarian = $(".pencarian_row").length;
  function add_row_daftar_pencarian(){
    var html = `
    <tr class = "pencarian_row" id = "pencarian_row${count_new_daftar_pencarian}">
      <input type = "hidden" value = 0 id = "id_pencarian${count_new_daftar_pencarian}">
      <td><input checked type = "checkbox" name = "check[]" value = "${count_new_daftar_pencarian}"> (New)</td>
      <td><input id = "tahun_pencarian${count_new_daftar_pencarian}" type = "number" value = "<?php echo date("Y");?>" name = "tahun_pencarian${count_new_daftar_pencarian}" class = "form-control"></td>
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
  function activate_edit_check(row){
    $(`#edit_checkbox${row}`).attr("checked",true);
  }
  function konfirmasi_delete_pencarian(row){
    var tahun = $(`#tahun_pencarian${row}`).val();
    $("#konfirmasiHapusPencarianModalTahun").html(tahun);
    var frase = $(`#frase_pencarian${row}`).val();
    $("#konfirmasiHapusPencarianModalFrase").html(frase);
    var jenis = $(`#jenis_pencarian${row} option:selected`).text();
    $("#konfirmasiHapusPencarianModalJenis").html(jenis);
    
    $("#deleteButtonPencarian").attr("onclick",`hapus_pencarian(${row})`)
    $('#konfirmasiHapusPencarianModal').modal('show');
  }
  function hapus_pencarian(row){
    var id = $(`#id_pencarian${row}`).val();
    if(id == 0){
      $('#konfirmasiHapusPencarianModal').modal('hide');
      $(`#pencarian_row${row}`).remove();
    }
    else{
      $.ajax({
        url:"<?php echo base_url();?>ws/sirup/delete_pencarian/"+id,
        type:"DELETE",
        dataType:"JSON",
        success:function(respond){
          if(respond["status"] == "success"){
            alert(respond["msg"]);
            $('#konfirmasiHapusPencarianModal').modal('hide');
            $(`#pencarian_row${row}`).remove();
          }
          else{
            alert(respond["msg"]);
          }
        }
      })
    }
  }
</script>
<div class = "modal fade" id = "konfirmasiHapusPencarianModal">
  <div class = "modal-dialog">
    <div class = "modal-content">
      <div class = "modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class = "modal-title"><h4>Konfirmasi Hapus</h4></div>
      </div>
      <div class = "modal-body">
        <h5 align = "center">Apakah yakin akan menghapus data pencarian dengan frase <i>"<span id = "konfirmasiHapusPencarianModalFrase"></span>"</i> tahun <i><span id = "konfirmasiHapusPencarianModalTahun"></span></i> jenis pengadaan <i><span id = "konfirmasiHapusPencarianModalJenis"></span></i></h5>
      </div>
      <div class = "modal-footer d-flex justify-content-center">
        <button id = "deleteButtonPencarian" type = "button" class = "btn btn-danger btn-sm">Hapus</a>
      </div>
    </div>
  </div>
</div>

<script>
  function add_lokasi_pekerjaan_row(){
    var count = $(".lokasi_pekerjaan_row").length;
    var html = `
    <tr class = "lokasi_pekerjaan_row">
      <td>
        <input type = "checkbox" checked name = "lokasi_pekerjaan_check[]" value = "${count}">
      </td>
      <td><input type = "text" class = "form-control" name = "provinsi${count}"></td>
      <td><input type = "text" class = "form-control" name = "kabupaten${count}"></td>
      <td><input type = "text" class = "form-control" name = "detail_lokasi${count}"></td>
    </tr>
    `;
    $("#add_lokasi_pekerjaan_button_container").before(html);
  }
  function add_sumber_dana_row(){
    var count = $(".sumber_dana_row").length;
    var html = `
    <tr class = "sumber_dana_row">
      <td>
        <input type = "checkbox" checked name = "sumber_dana_check[]" value = "${count}">
      </td>
      <td><input type = "text" class = "form-control" name = "sumber_dana${count}"></td>
      <td><input type = "text" class = "form-control" name = "ta${count}"></td>
      <td><input type = "text" class = "form-control" name = "klpd${count}"></td>
      <td><input type = "text" class = "form-control" name = "mak${count}"></td>
      <td><input type = "text" class = "form-control" name = "pagu${count}"></td>
    </tr>
    `;
    $("#add_sumber_dana_button_container").before(html);
  }
  function add_pemanfaatan_barang_row(){
    var count = $(".pemanfaatan_barang_row").length;
    var html = `
    <tr class = "pemanfaatan_barang_row">
      <td>
        <input type = "checkbox" checked name = "pemanfaatan_barang_check[]" value = "${count}">
      </td>
      <td><input type = "text" class = "form-control" name = "mulai_pemanfaatan_barang${count}"></td>
      <td><input type = "text" class = "form-control" name = "akhir_pemanfaatan_barang${count}"></td>
    </tr>
    `;
    $("#add_pemanfaatan_barang_button_container").before(html);
  }
  function add_pelaksanaan_kontrak_row(){
    var count = $(".pelaksanaan_kontrak_row").length;
    var html = `
    <tr class = "pelaksanaan_kontrak_row">
      <td>
        <input type = "checkbox" checked name = "pelaksanaan_kontrak_check[]" value = "${count}">
      </td>
      <td><input type = "text" class = "form-control" name = "mulai_pelaksanaan_kontrak${count}"></td>
      <td><input type = "text" class = "form-control" name = "akhir_pelaksanaan_kontrak${count}"></td>
    </tr>
    `;
    $("#add_pelaksanaan_kontrak_button_container").before(html);
  }
  function add_pemilihan_penyedia_row(){
    var count = $(".pemilihan_penyedia_row").length;
    var html = `
    <tr class = "pemilihan_penyedia_row">
      <td>
        <input type = "checkbox" checked name = "pemilihan_penyedia_check[]" value = "${count}">
      </td>
      <td><input type = "text" class = "form-control" name = "mulai_pemilihan_penyedia${count}"></td>
      <td><input type = "text" class = "form-control" name = "akhir_pemilihan_penyedia${count}"></td>
    </tr>
    `;
    $("#add_jadwal_pemilihan_button_container").before(html);
  }
</script>