
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
                <button type = "button" class = "btn btn-primary btn-sm" data-target="#insertSirupModal" data-toggle="modal">Tambah Data</button>
              </div>
              <div class = "form-group col-lg-1">
                <h5>&nbsp;</h5>
                <button type = "button" class = "btn btn-primary btn-sm" data-target="#pencarianModal" data-toggle="modal">Lihat Pencarian</button>
              </div>
              <div class = "form-group col-lg-1">
              </div>
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
            <table class="table table-hover table-striped w-full">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Paket</th>
                  <th>Pagu</th>
                  <th>Jenis Pengadaan</th>
                  <th>Metode Pemilihan</th>
                  <th>K/L/PD</th>
                  <th>Satuan Kerja</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id = "table_content_container">
              </tbody>
            </table>
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

<div class="modal fade" id="insertSirupModal">
  <div class="modal-dialog modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="exampleModalTitle">Tambah Data SiRUP</h4>
      </div>
      <form id = "insert_form">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">Kode RUP</label>
            <input type = "text" class = "form-control" name = "kode_rup">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Paket</label>
            <input type = "text" class = "form-control" name = "nama_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama KLPD</label>
            <input type = "text" class = "form-control" name = "nama_klpd">
          </div>
          <div class="form-group">
            <label class="form-control-label">Satuan Kerja</label>
            <input type = "text" class = "form-control" name = "satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tahun Anggaran</label>
            <input type = "number" class = "form-control" name = "tahun_anggaran">
          </div>
          <div class="form-group">
            <label class="form-control-label">Lokasi Pekerjaan</label>
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
            <label class="form-control-label">Volume Pekerjaan</label>
            <input type = "text" class = "form-control" name = "volume_pekerjaan">
          </div>
          <div class="form-group">
            <label class="form-control-label">Uraian Pekerjaan</label>
            <textarea class="form-control" name = "uraian_pekerjaan"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Spesifikasi Pekerjaan</label>
            <textarea class="form-control" name = "spesifikasi_pekerjaan"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Produk Dalam Negeri</label>
            <select class = "form-control" name = "produk_dalam_negeri">
              <option value = "ya">YA</option>
              <option value = "tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Usaha Kecil</label>
            <select class = "form-control" name = "usaha_kecil">
              <option value = "ya">YA</option>
              <option value = "tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Pra DIPA/DPA</label>
            <select class = "form-control" name = "pra_dipa_dpa">
              <option value = "ya">YA</option>
              <option value = "tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Sumber Dana</label>
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
            <label class="form-control-label">Jenis Pengadaan</label>
            <input type = "text" class = "form-control" name = "jenis_pengadaan">
          </div>
          <div class="form-group">
            <label class="form-control-label">Total Pagu</label>
            <input type = "text" class = "form-control" name = "total_pagu">
          </div>
          <div class="form-group">
            <label class="form-control-label">Metode Pemilihan</label>
            <input type = "text" class = "form-control" name = "metode_pemilihan">
          </div>
          <div class="form-group">
            <label class="form-control-label">Pemanfaatan Barang/Jasa</label>
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
            <label class="form-control-label">Jadwal Pelaksanaan Kontrak</label>
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
            <label class="form-control-label">Jadwal Pemilihan Penyedia</label>
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
            <label class="form-control-label">Histori Paket</label>
            <input type = "text" class = "form-control" name = "histori_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Perbaharui Paket</label>
            <input type = "date" class = "form-control" name = "tgl_perbarui_paket">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick = "insert_row()">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="updateSirupModal">
  <div class="modal-dialog modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Update Data SiRUP</h4>
      </div>
      <form id = "update_form">
        <input type = "hidden" name = "id_sirup" id = "edit_id_sirup">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">Kode RUP</label>
            <input type = "text" class = "form-control" name = "kode_rup" id = "edit_kode_rup">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Paket</label>
            <input type = "text" class = "form-control" name = "nama_paket" id = "edit_nama_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama KLPD</label>
            <input type = "text" class = "form-control" name = "nama_klpd" id = "edit_nama_klpd">
          </div>
          <div class="form-group">
            <label class="form-control-label">Satuan Kerja</label>
            <input type = "text" class = "form-control" name = "satuan_kerja" id = "edit_satuan_kerja">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tahun Anggaran</label>
            <input type = "number" class = "form-control" name = "tahun_anggaran" id = "edit_tahun_anggaran">
          </div>
          <div class="form-group">
            <label class="form-control-label">Lokasi Pekerjaan</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>No.</th>
                <th>Provinsi</th>
                <th>Kabupaten/Kota</th>
                <th>Detail Lokasi</th>
                <th></th>
              </thead>
              <tbody>
                <tr id = "edit_lokasi_pekerjaan">
                  <td colspan = 5><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_lokasi_pekerjaan_edit()">Tambah Lokasi Pekerjaan</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label">Volume Pekerjaan</label>
            <input type = "text" class = "form-control" name = "volume_pekerjaan" id = "edit_volume_pekerjaan">
          </div>
          <div class="form-group">
            <label class="form-control-label">Uraian Pekerjaan</label>
            <textarea class="form-control" name = "uraian_pekerjaan" id = "edit_uraian_pekerjaan"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Spesifikasi Pekerjaan</label>
            <textarea class="form-control" name = "spesifikasi_pekerjaan" id = "edit_spesifikasi_pekerjaan"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Produk Dalam Negeri</label>
            <select class = "form-control" name = "produk_dalam_negeri" id = "edit_produk_dalam_negeri">
              <option value = "ya">YA</option>
              <option value = "tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Usaha Kecil</label>
            <select class = "form-control" name = "usaha_kecil" id = "edit_usaha_kecil">
              <option value = "ya">YA</option>
              <option value = "tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Pra DIPA/DPA</label>
            <select class = "form-control" name = "pra_dipa_dpa" id = "edit_pra_dipa_dpa">
              <option value = "ya">YA</option>
              <option value = "tidak">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Sumber Dana</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>No.</th>
                <th>Sumber Dana</th>
                <th>T.A</th>
                <th>KLPD</th>
                <th>MAK</th>
                <th>Pagu</th>
                <th></th>
              </thead>
              <tbody>
                <tr id = "edit_sumber_dana">
                  <td colspan = 7><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_sumber_dana_edit()">Tambah Sumber Dana</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label">Jenis Pengadaan</label>
            <input type = "text" class = "form-control" name = "jenis_pengadaan" id = "edit_jenis_pengadaan">
          </div>
          <div class="form-group">
            <label class="form-control-label">Total Pagu</label>
            <input type = "text" class = "form-control" name = "total_pagu" id = "edit_total_pagu">
          </div>
          <div class="form-group">
            <label class="form-control-label">Metode Pemilihan</label>
            <input type = "text" class = "form-control" name = "metode_pemilihan" id = "edit_metode_pemilihan">
          </div>
          <div class="form-group">
            <label class="form-control-label">Pemanfaatan Barang/Jasa</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>#</th>
                <th>Mulai</th>
                <th>Akhir</th>
                <th></th>
              </thead>
              <tbody>
                <tr id = "edit_pemanfaatan_barang">
                  <td colspan = 4><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_pemanfaatan_barang_edit()">Tambah Pemanfaatan Barang</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label">Jadwal Pelaksanaan Kontrak</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>#</th>
                <th>Mulai</th>
                <th>Akhir</th>
                <th></th>
              </thead>
              <tbody>
                <tr id = "edit_pelaksanaan_kontrak">
                  <td colspan = 4><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_pelaksanaan_kontrak_edit()">Tambah Pelaksanaan Kontrak</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label">Jadwal Pemilihan Penyedia</label>
            <table class = "table table-bordered table-stripped">
              <thead>
                <th>#</th>
                <th>Mulai</th>
                <th>Akhir</th>
                <th></th>
              </thead>
              <tbody>
                <tr id = "edit_jadwal_pemilihan">
                  <td colspan = 4><button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "add_pemilihan_penyedia_edit()">Tambah Jadwal Pemilihan</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label class="form-control-label">Histori Paket</label>
            <input type = "text" class = "form-control" name = "histori_paket" id = "edit_histori_paket">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Perbaharui Paket</label>
            <input type = "date" class = "form-control" name = "tgl_perbaharui_paket" id = "edit_tgl_perbarui_paket">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick = "update_row()">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="detailSirupModal">
  <div class="modal-dialog modal-center modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="exampleModalTitle">Detail Data SiRUP</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="form-control-label">Kode RUP</label>
          <input type = "text" class = "form-control" disabled id = "detail_kode_rup">
        </div>
        <div class="form-group">
          <label class="form-control-label">Nama Paket</label>
          <input type = "text" class = "form-control" disabled id = "detail_nama_paket">
        </div>
        <div class="form-group">
          <label class="form-control-label">Nama KLPD</label>
          <input type = "text" class = "form-control" disabled id = "detail_nama_klpd">
        </div>
        <div class="form-group">
          <label class="form-control-label">Satuan Kerja</label>
          <input type = "text" class = "form-control" disabled id = "detail_satuan_kerja">
        </div>
        <div class="form-group">
          <label class="form-control-label">Tahun Anggaran</label>
          <input type = "number" class = "form-control" disabled id = "detail_tahun_anggaran">
        </div>
        <div class="form-group">
          <label class="form-control-label">Lokasi Pekerjaan</label>
          <table class = "table table-bordered table-stripped">
            <thead>
              <th>No.</th>
              <th>Provinsi</th>
              <th>Kabupaten/Kota</th>
              <th>Detail Lokasi</th>
            </thead>
            <tbody id = "detail_lokasi_pekerjaan">
            </tbody>
          </table>
        </div>
        <div class="form-group">
          <label class="form-control-label">Volume Pekerjaan</label>
          <input type = "text" class = "form-control" disabled id = "detail_volume_pekerjaan">
        </div>
        <div class="form-group">
          <label class="form-control-label">Uraian Pekerjaan</label>
          <textarea class="form-control" disabled id = "detail_uraian_pekerjaan"></textarea>
        </div>
        <div class="form-group">
          <label class="form-control-label">Spesifikasi Pekerjaan</label>
          <textarea class="form-control" disabled id = "detail_spesifikasi_pekerjaan"></textarea>
        </div>
        <div class="form-group">
          <label class="form-control-label">Produk Dalam Negeri</label>
          <select class = "form-control" disabled id = "detail_produk_dalam_negeri">
            <option value = "ya">YA</option>
            <option value = "tidak">Tidak</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-control-label">Usaha Kecil</label>
          <select class = "form-control" disabled id = "detail_usaha_kecil">
            <option value = "ya">YA</option>
            <option value = "tidak">Tidak</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-control-label">Pra DIPA/DPA</label>
          <select class = "form-control" disabled id = "detail_pra_dipa_dpa">
            <option value = "ya">YA</option>
            <option value = "tidak">Tidak</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-control-label">Sumber Dana</label>
          <table class = "table table-bordered table-stripped">
            <thead>
              <th>No.</th>
              <th>Sumber Dana</th>
              <th>T.A</th>
              <th>KLPD</th>
              <th>MAK</th>
              <th>Pagu</th>
            </thead>
            <tbody id = "detail_sumber_dana">
            </tbody>
          </table>
        </div>
        <div class="form-group">
          <label class="form-control-label">Jenis Pengadaan</label>
          <input type = "text" class = "form-control" disabled id = "detail_jenis_pengadaan">
        </div>
        <div class="form-group">
          <label class="form-control-label">Total Pagu</label>
          <input type = "text" class = "form-control" disabled id = "detail_total_pagu">
        </div>
        <div class="form-group">
          <label class="form-control-label">Metode Pemilihan</label>
          <input type = "text" class = "form-control" disabled id = "detail_metode_pemilihan">
        </div>
        <div class="form-group">
          <label class="form-control-label">Pemanfaatan Barang/Jasa</label>
          <table class = "table table-bordered table-stripped">
            <thead>
              <th>#</th>
              <th>Mulai</th>
              <th>Akhir</th>
            </thead>
            <tbody id = "detail_pemanfaatan_barang">
            </tbody>
          </table>
        </div>
        <div class="form-group">
          <label class="form-control-label">Jadwal Pelaksanaan Kontrak</label>
          <table class = "table table-bordered table-stripped">
            <thead>
              <th>#</th>
              <th>Mulai</th>
              <th>Akhir</th>
            </thead>
            <tbody id = "detail_pelaksanaan_kontrak">
            </tbody>
          </table>
        </div>
        <div class="form-group">
          <label class="form-control-label">Jadwal Pemilihan Penyedia</label>
          <table class = "table table-bordered table-stripped">
            <thead>
              <th>#</th>
              <th>Mulai</th>
              <th>Akhir</th>
            </thead>
            <tbody id = "detail_jadwal_pemilihan">
            </tbody>
          </table>
        </div>
        <div class="form-group">
          <label class="form-control-label">Histori Paket</label>
          <input type = "text" class = "form-control" disabled id = "detail_histori_paket">
        </div>
        <div class="form-group">
          <label class="form-control-label">Tanggal Perbaharui Paket</label>
          <input type = "date" class = "form-control" disabled id = "detail_tgl_perbarui_paket">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id = "deleteSirupModal">
  <div class = "modal-dialog">
    <div class = "modal-content">
      <div class = "modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class = "modal-title"><h4>Konfirmasi Hapus</h4></div>
      </div>
      <div class = "modal-body">
        <h5 align = "center">Apakah yakin akan menghapus data SiRUP dengan Paket <i>"<span id = "konfirmasiHapusSirupPaket"></span>"</i></h5>
      </div>
      <div class = "modal-footer d-flex justify-content-center">
        <button id = "deleteButtonSirup" type = "button" class = "btn btn-danger btn-sm">Hapus</a>
      </div>
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
  function add_lokasi_pekerjaan_edit(){
    var count = $(".lokasi_pekerjaan_row_edit").length;
    var html = `
    <tr class = "lokasi_pekerjaan_row_edit">
      <td>
        <input type = "checkbox" checked name = "lokasi_pekerjaan_check[]" value = "${count}">
      </td>
      <td><input type = "text" class = "form-control" name = "provinsi${count}"></td>
      <td><input type = "text" class = "form-control" name = "kabupaten${count}"></td>
      <td><input type = "text" class = "form-control" name = "detail_lokasi${count}"></td>
    </tr>
    `;
    $("#edit_lokasi_pekerjaan").before(html);
  }
  function add_sumber_dana_edit(){
    var count = $(".sumber_dana_row_edit").length;
    var html = `
    <tr class = "sumber_dana_row_edit">
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
    $("#edit_sumber_dana").before(html);
  }
  function add_pemanfaatan_barang_edit(){
    var count = $(".pemanfaatan_barang_row_edit").length;
    var html = `
    <tr class = "pemanfaatan_barang_row_edit">
      <td>
        <input type = "checkbox" checked name = "pemanfaatan_barang_check[]" value = "${count}">
      </td>
      <td><input type = "text" class = "form-control" name = "mulai_pemanfaatan_barang${count}"></td>
      <td><input type = "text" class = "form-control" name = "akhir_pemanfaatan_barang${count}"></td>
    </tr>
    `;
    $("#edit_pemanfaatan_barang").before(html);
  }
  function add_pelaksanaan_kontrak_edit(){
    var count = $(".pelaksanaan_kontrak_row_edit").length;
    var html = `
    <tr class = "pelaksanaan_kontrak_row_edit">
      <td>
        <input type = "checkbox" checked name = "pelaksanaan_kontrak_check[]" value = "${count}">
      </td>
      <td><input type = "text" class = "form-control" name = "mulai_pelaksanaan_kontrak${count}"></td>
      <td><input type = "text" class = "form-control" name = "akhir_pelaksanaan_kontrak${count}"></td>
    </tr>
    `;
    $("#edit_pelaksanaan_kontrak").before(html);
  }
  function add_pemilihan_penyedia_edit(){
    var count = $(".pemilihan_penyedia_row_edit").length;
    var html = `
    <tr class = "pemilihan_penyedia_row_edit">
      <td>
        <input type = "checkbox" checked name = "pemilihan_penyedia_check[]" value = "${count}">
      </td>
      <td><input type = "text" class = "form-control" name = "mulai_pemilihan_penyedia${count}"></td>
      <td><input type = "text" class = "form-control" name = "akhir_pemilihan_penyedia${count}"></td>
    </tr>
    `;
    $("#edit_jadwal_pemilihan").before(html);
  }
</script>
<script>
  var content = "";

  function load_detail(row){
    $("#detail_kode_rup").val(content[row]["sirup_rup"]);
    $("#detail_nama_paket").val(content[row]["sirup_paket"]);
    $("#detail_nama_klpd").val(content[row]["sirup_klpd"]);
    $("#detail_satuan_kerja").val(content[row]["sirup_satuan_kerja"]);
    $("#detail_tahun_anggaran").val(content[row]["sirup_tahun_anggaran"]);
    $("#detail_volume_pekerjaan").val(content[row]["sirup_volume_pekerjaan"]);
    $("#detail_uraian_pekerjaan").val(content[row]["sirup_uraian_pekerjaan"]);
    $("#detail_spesifikasi_pekerjaan").val(content[row]["sirup_spesifikasi_pekerjaan"]);
    $("#detail_produk_dalam_negeri").val(content[row]["sirup_produk_dalam_negri"]);
    $("#detail_usaha_kecil").val(content[row]["sirup_usaha_kecil"]);
    $("#detail_pra_dipa_dpa").val(content[row]["sirup_pra_dipa"]);
    $("#detail_jenis_pengadaan").val(content[row]["sirup_jenis_pengadaan"]);
    $("#detail_total_pagu").val(content[row]["sirup_total"]);
    $("#detail_metode_pemilihan").val(content[row]["sirup_metode_pemilihan"]);
    $("#detail_histori_paket").val(content[row]["sirup_histori_paket"]);
    $("#detail_tgl_perbarui_paket").val(content[row]["sirup_tgl_perbarui_paket"]);

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_lokasi_pekerjaan/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["lokasi_pekerjaan"].split("|");
          if(split.length > 0){
            html += `
            <tr>
              <td>${a+1}</td>
              <td>${split[0]}</td>
              <td>${split[1]}</td>
              <td>${split[2]}</td>
            </tr>`;
          }
          else{
            html += `
            <tr>
              <td>${a+1}</td>
              <td colspan = 3>${respond[a]}</td>
            </tr>
            `;
          }
        }
        $("#detail_lokasi_pekerjaan").html(html);
      }
    });

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_sumber_dana/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["sumber_dana"].split("|");
          if(split.length > 0){
            html += `
            <tr>
              <td>${a+1}</td>
              <td>${split[0]}</td>
              <td>${split[1]}</td>
              <td>${split[2]}</td>
              <td>${split[3]}</td>
              <td>${split[4]}</td>
            </tr>
            `;
          }
          else{
            html += `
            <tr>
              <td>${a+1}</td>
              <td colspan = "5">${respond[a]}</td>
            </tr>
            `;
          }
        }
        $("#detail_sumber_dana").html(html);
      }
    });

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_pemanfaatan_barang/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["pemanfaatan_barang"].split("|");
          if(split.length > 0){
            html += `
            <tr>
              <td>${a+1}</td>
              <td>${split[0]}</td>
              <td>${split[1]}</td>
            </tr>`;
          }
          else{
            html += `
            <tr>
              <td>${a+1}</td>
              <td>${respond[a]}</td>
            </tr>
            `;
          }
        }
        $("#detail_pemanfaatan_barang").html(html);
      }
    });

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_pelaksanaan_kontrak/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["jadwal_pelaksanaan"].split("|");
          if(split.length > 0){
            html += `
            <tr>
              <td>${a+1}</td>
              <td>${split[0]}</td>
              <td>${split[1]}</td>
            </tr>`;
          }
          else{
            html += `
            <tr>
              <td>${a+1}</td>
              <td>${respond[a]}</td>
            </tr>
            `;
          }
        }
        $("#detail_pelaksanaan_kontrak").html(html);
      }
    });

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_jadwal_pemilihan/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["pemilihan_penyedia"].split("|");
          if(split.length > 0){
            html += `
            <tr>
              <td>${a+1}</td>
              <td>${split[0]}</td>
              <td>${split[1]}</td>
            </tr>`;
          }
          else{
            html += `
            <tr>
              <td>${a+1}</td>
              <td>${respond[a]}</td>
            </tr>
            `;
          }
        }
        $("#detail_jadwal_pemilihan").html(html);
      }
    });
    $("#detailSirupModal").modal("show");
  }
  function load_edit(row){
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
    $("#edit_total_pagu").val(content[row]["sirup_total"]);
    $("#edit_metode_pemilihan").val(content[row]["sirup_metode_pemilihan"]);
    $("#edit_histori_paket").val(content[row]["sirup_histori_paket"]);
    $("#edit_tgl_perbarui_paket").val(content[row]["sirup_tgl_perbarui_paket"]);

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_lokasi_pekerjaan/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["lokasi_pekerjaan"].split("|");
          if(split.length > 0){
            html += `
            <tr class = "lokasi_pekerjaan_row_edit" id = "lokasi_pekerjaan_row_edit${a}">
              <input type = "hidden" value = "${respond[a]["id_pk_lokasi_pekerjaan"]}" name = "edit_id_pk_lokasi_pekerjaan${a}" id = "id_lokasi_pekerjaan${a}">
              <td><input checked type = "checkbox" name = "edit_lokasi_pekerjaan[]" value = "${a}"></td>
              <td><input type = "text" class = "form-control" name = "edit_provinsi${a}" value = "${split[0]}"></td>
              <td><input type = "text" class = "form-control" name = "edit_kabupaten${a}" value = "${split[1]}"></td>
              <td><input type = "text" class = "form-control" name = "edit_detail_lokasi${a}" value = "${split[2]}"></td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_lokasi_pekerjaan_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>`;
          }
          else{
            html += `
            <tr class = "lokasi_pekerjaan_row_edit" id = "lokasi_pekerjaan_row_edit${a}">
              <td>${a+1}</td>
              <td colspan = 3>${respond[a]}</td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_lokasi_pekerjaan_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>
            `;
          }
        }
        $(".lokasi_pekerjaan_row_edit").remove();
        $("#edit_lokasi_pekerjaan").before(html);
      }
    });

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_sumber_dana/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["sumber_dana"].split("|");
          if(split.length > 0){
            html += `
            <tr class = "sumber_dana_row_edit" id = "sumber_dana_row_edit${a}">
              <input type = "hidden" value = "${respond[a]["id_pk_sumber_dana"]}" name = "edit_id_pk_sumber_dana${a}" id = "id_sumber_dana${a}">
              <td><input checked type = "checkbox" name = "edit_sumber_dana[]" value = "${a}"></td>
              <td><input type = "text" class = "form-control" name = "edit_sumber_dana${a}" value = "${split[0]}"></td>
              <td><input type = "text" class = "form-control" name = "edit_ta${a}" value = "${split[1]}"></td>
              <td><input type = "text" class = "form-control" name = "edit_klpd${a}" value = "${split[2]}"></td>
              <td><input type = "text" class = "form-control" name = "edit_mak${a}" value = "${split[3]}"></td>
              <td><input type = "text" class = "form-control" name = "edit_pagu${a}" value = "${split[4]}"></td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_sumber_dana_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>
            `;
          }
          else{
            html += `
            <tr class = "sumber_dana_row_edit" id = "sumber_dana_row_edit${a}>
              <td>${a+1}</td>
              <td colspan = "5">${respond[a]}</td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_sumber_dana_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>
            `;
          }
        }
        $(".sumber_dana_row_edit").remove();
        $("#edit_sumber_dana").before(html);
      }
    });

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_pemanfaatan_barang/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["pemanfaatan_barang"].split("|");
          if(split.length > 0){
            html += `
            <tr class = "pemanfaatan_barang_row_edit" id = "pemanfaatan_barang_row_edit${a}">
              <input type = "hidden" value = "${respond[a]["id_pk_pemanfaatan_barang"]}" name = "edit_id_pk_pemanfaatan_barang${a}" id = "id_pemanfaatan_barang${a}">
              <td><input type = "checkbox" name = "edit_pemanfaatan_barang[]" value = "${a}" checked></td>
              <td><input type = "text" class = "form-control" value = "${split[0]}" name = "edit_mulai_pemanfaatan_barang${a}"></td>
              <td><input type = "text" class = "form-control" value = "${split[1]}" name = "edit_akhir_pemanfaatan_barang${a}"></td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_pemanfaatan_barang_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>`;
          }
          else{
            html += `
            <tr class = "pemanfaatan_barang_row_edit" id = "pemanfaatan_barang_row_edit${a}">
              <td>${a+1}</td>
              <td>${respond[a]}</td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_pemanfaatan_barang_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>
            `;
          }
        }
        $(".pemanfaatan_barang_row_edit").remove();
        $("#edit_pemanfaatan_barang").before(html);
      }
    });

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_pelaksanaan_kontrak/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["jadwal_pelaksanaan"].split("|");
          if(split.length > 0){
            html += `
            <tr class = "pelaksanaan_kontrak_row_edit" id = "pelaksanaan_kontrak_row_edit${a}">
              <input type = "hidden" value = "${respond[a]["id_pk_jadwal_pelaksanaan"]}" name = "edit_id_pk_jadwal_pelaksanaan${a}" id = "id_pelaksanaan_kontrak${a}">
              <td><input type = "checkbox" name = "edit_jadwal_pelaksanaan[]" value = "${a}" checked></td>
              <td><input type = "text" class = "form-control" value = "${split[0]}" name = "edit_mulai_jadwal_pelaksanaan${a}"></td>
              <td><input type = "text" class = "form-control" value = "${split[1]}" name = "edit_akhir_jadwal_pelaksanaan${a}"></td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_pelaksanaan_kontrak_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>`;
          }
          else{
            html += `
            <tr class = "pelaksanaan_kontrak_row_edit" id = "pelaksanaan_kontrak_row_edit${a}">
              <td>${a+1}</td>
              <td>${respond[a]}</td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_pelaksanaan_kontrak_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>
            `;
          }
        }
        $(".pelaksanaan_kontrak_row_edit").remove();
        $("#edit_pelaksanaan_kontrak").before(html);
      }
    });

    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/get_detail_jadwal_pemilihan/"+content[row]["id_pk_sirup"],
      type:"GET",
      dataType:"JSON",
      success:function(respond){
        var html = "";
        for(var a = 0; a<respond.length; a++){
          var split = respond[a]["pemilihan_penyedia"].split("|");
          if(split.length > 0){
            html += `
            <tr class = "pemilihan_penyedia_row_edit" id = "pemilihan_penyedia_row_edit${a}">
              <input type = "hidden" value = "${respond[a]["id_pk_pemilihan_penyedia"]}" name = "edit_id_pk_pemilihan_penyedia${a}" id = "id_pemilihan_penyedia${a}">
              <td><input type = "checkbox" name = "edit_pemilihan_penyedia[]" value = "${a}" checked></td>
              <td><input type = "text" class = "form-control" value = "${split[0]}" name = "edit_mulai_pemilihan_penyedia${a}"></td>
              <td><input type = "text" class = "form-control" value = "${split[1]}" name = "edit_akhir_pemilihan_penyedia${a}"></td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_pemilihan_penyedia_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>`;
          }
          else{
            html += `
            <tr class = "pemilihan_penyedia_row_edit" id = "pemilihan_penyedia_row_edit${a}">
              <td>${a+1}</td>
              <td>${respond[a]}</td>
              <td><button type = "button" class = "btn btn-danger btn-sm" onclick = "delete_pemilihan_penyedia_row_edit(${a})"><i class = "icon md-delete"></i></button></td>
            </tr>
            `;
          }
        }
        $(".pemilihan_penyedia_row_edit").remove();
        $("#edit_jadwal_pemilihan").before(html);
      }
    });
    $("#updateSirupModal").modal("show");
  }
  function load_delete(row){
    $("#deleteSirupModal").modal("show");
    $("#konfirmasiHapusSirupPaket").html(content[row]["sirup_rup"]+" - "+content[row]["sirup_paket"]);
    $("#deleteButtonSirup").attr("onclick",`delete_row(${content[row]["id_pk_sirup"]})`)
  }
  function hapus(row){
    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/delete/"+content[row]["id_pk_sirup"],
      type:"DELETE",
      dataType:"JSON",
      success:function(respond){
        if(respond["status"] == "success"){
          $("#sirup_row"+row).remove();
          $("#deleteSirupModal").modal("hide");
        }
      }
    })
  }
</script>

<script>
  var base_url = "<?php echo base_url();?>";
  var kolom_pengurutan = "id_pk_sirup";
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
    var url = `<?php echo base_url();?>ws/sirup/get_data?kolom_pengurutan=${kolom_pengurutan}&arah_kolom_pengurutan=${arah_kolom_pengurutan}&pencarian_phrase=${pencarian_phrase}&kolom_pencarian=${kolom_pencarian}&current_page=${current_page}`;
    $.ajax({
      url:url,
      type:"GET",
      dataType:"JSON",
      success:function(respond){  
        var html = "";
        content = respond["data"];
        for(var a = 0; a<respond["data"].length; a++){
          html += `
          <tr id = "sirup_row${a}">
            <td>${respond["data"][a]["sirup_rup"]}</td>
            <td>${respond["data"][a]["sirup_paket"]}</td>
            <td>${respond["data"][a]["sirup_total"]}</td>
            <td>${respond["data"][a]["sirup_jenis_pengadaan"]}</td>
            <td>${respond["data"][a]["sirup_metode_pemilihan"]}</td>
            <td>${respond["data"][a]["sirup_klpd"]}</td>
            <td>${respond["data"][a]["sirup_satuan_kerja"]}</td>
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
  function insert_row(){
    var fd = new FormData($("#insert_form")[0]);
    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/insert",
      type:"POST",
      data:fd,
      contentType:false,
      processData:false,
      success:function(respond){
        $("#insertSirupModal").modal("hide");
        reload_table();
      }
    })
  }
  function update_row(){
    var fd = new FormData($("#update_form")[0]);
    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/update",
      type:"POST",
      data:fd,
      contentType:false,
      processData:false,
      success:function(respond){
        $("#updateSirupModal").modal("hide");
        reload_table();
      }
    })
  }
  function delete_lokasi_pekerjaan_row_edit(row){
    var id = $("#id_lokasi_pekerjaan"+row).val();
    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/delete_lokasi_pekerjaan/"+id,
      type:"DELETE",
      dataType:"JSON",
      success:function(respond){
        $("#lokasi_pekerjaan_row_edit"+row).remove();
      }
    })
  }
  function delete_sumber_dana_row_edit(row){
    var id = $("#id_sumber_dana"+row).val();
    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/delete_sumber_dana/"+id,
      type:"DELETE",
      dataType:"JSON",
      success:function(respond){
        $("#sumber_dana_row_edit"+row).remove();
      }
    })
  }
  function delete_pemanfaatan_barang_row_edit(row){
    var id = $("#id_pemanfaatan_barang"+row).val();
    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/delete_pemanfaatan_barang/"+id,
      type:"DELETE",
      dataType:"JSON",
      success:function(respond){
        $("#pemanfaatan_barang_row_edit"+row).remove();
      }
    })
  }
  function delete_pelaksanaan_kontrak_row_edit(row){
    var id = $("#id_pelaksanaan_kontrak"+row).val();
    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/delete_pelaksanaan_kontrak/"+id,
      type:"DELETE",
      dataType:"JSON",
      success:function(respond){
        $("#pelaksanaan_kontrak_row_edit"+row).remove();
      }
    })
  }
  function delete_pemilihan_penyedia_row_edit(row){
    var id = $("#id_pemilihan_penyedia"+row).val();
    $.ajax({
      url:"<?php echo base_url();?>ws/sirup/delete_pemilihan_penyedia/"+id,
      type:"DELETE",
      dataType:"JSON",
      success:function(respond){
        $("#pemilihan_penyedia_row_edit"+row).remove();
      }
    })
  }
  function delete_row(id_pk_sirup){
    $.ajax({
      url:`<?php echo base_url();?>ws/sirup/delete/${id_pk_sirup}`,
      type:"DELETE",
      success:function(respond){
        $("#deleteSirupModal").modal("hide");
        reload_table();
      }
    })
  }
</script>