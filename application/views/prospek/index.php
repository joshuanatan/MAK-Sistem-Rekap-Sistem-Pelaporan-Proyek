<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta") ?>
    <title>MAK-CRM | Prospek</title>
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
        <h1 class="page-title">Prospek</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
          <li class="breadcrumb-item active">Prospek</li>
        </ol>
      </div>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <div class = "row">
              <div class = "form-group col-lg-3">
                <h5>Kolom Pengurutan</h5>
                <select class="form-control" name="">
                  <option value="">Nama</option>
                </select>
              </div>
              <div class = "form-group col-lg-2">
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
              <div class = "form-group col-lg-4">
                <h5>Kolom Pencarian</h5>
                <select class = "form-control" onchange = "change_pencarian_kolom()" id = "pencarian_kolom">
                  <option value = "all">Semua</option>
                </select>
              </div>
            </div>
            <button type = "button" class = "btn btn-primary btn-sm" onclick = "tambahRowProvinsi()">Tambah Prospek</button>
            <br>
            <br>
            <div class = "scroll-provinsi-table-wrapper">
              <table class="table table-hover table-striped w-full" id = "table_content_container">
                <thead>
                  <tr>
                    <th>ID Prospek</th>
                    <th>Notes Kompetitor</th>
                    <th>Notes Prospek</th>
                    <th>Funnel</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=0; $i < 50; $i++):?>
                    <tr>
                      <td>10</td>
                      <td>Informa: harga lebih murah</td>
                      <td>Hampir deal, untuk harga bisa di nego lagi</td>
                      <td>Prospek</td>
                      <td><?php echo number_format(8600000)?></td>
                      <td><button type = "button" class = "btn btn-primary btn-sm">Show</button> <button type = "button" class = "btn btn-primary btn-sm"><i class = "icon md-edit"></i></button>
                      <button type = "button"class = "btn btn-danger btn-sm"><i class = "icon md-delete"></i></button></td>
                    </tr>
                  <?php endfor; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <h3>Detail Barang</h3>
              <table class="table table-hover table-striped w-full">
                <thead>
                  <tr>
                    <th>Nama Produk</th>
                    <th>Quantity</th>
                    <th>Harga Produk</th>
                    <th>Keterangan Produk</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Kasur Rumah Sakit Flawless</td>
                    <td>8</td>
                    <td>1000000</td>
                    <td>Kasur untuk rumah sakit militer di Jawa Barat</td>
                    <td><button type = "button" class = "btn btn-primary btn-sm"><i class = "icon md-edit"></i></button>
                    <button type = "button"class = "btn btn-danger btn-sm"><i class = "icon md-delete"></i></button></td></td>
                  </tr>
                  <tr>
                    <td>Lampu Tidur Rumah Sakit</td>
                    <td>2</td>
                    <td>100000</td>
                    <td>Lampu Tidur untuk rumah sakit militer di Jawa Barat</td>
                    <td><button type = "button" class = "btn btn-primary btn-sm"><i class = "icon md-edit"></i></button>
                    <button type = "button"class = "btn btn-danger btn-sm"><i class = "icon md-delete"></i></button></td></td>
                  </tr>
                  <tr>
                    <td>Rak Meja</td>
                    <td>4</td>
                    <td>120000</td>
                    <td>Rak Meja untuk rumah sakit militer di Jawa Barat</td>
                    <td><button type = "button" class = "btn btn-primary btn-sm"><i class = "icon md-edit"></i></button>
                    <button type = "button"class = "btn btn-danger btn-sm"><i class = "icon md-delete"></i></button></td></td>
                  </tr>
                </tbody>
              </table>
            </div>
              <nav class = "d-flex justify-content-center">
                <ul class="pagination" id = "pagination">
                </ul>
              </nav>
          </div>
        </div>
            </div>
          </div>
        </div>
      </div>

      <?php $this->load->view("includes/footer")?>
    <?php $this->load->view("includes/core-script")?>
    <script src="<?php echo base_url();?>global/vendor/asrange/jquery-asRange.min.js"></script>
    <script src="<?php echo base_url();?>global/vendor/bootbox/bootbox.js"></script>

  </body>
</html>
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
</script>
