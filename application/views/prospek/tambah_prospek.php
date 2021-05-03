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
      <div class="page-content col-lg-6 col-sm-12 ">
        <div class="panel">
          <div class="panel-body">
            <div class="modal" id="edit_kabupaten">
              <h4 class="title">Tambah Prospek</h4>
            </div>
            <input type="hidden" class="form-control" name="id_kabupaten" id = "id_kabupaten_edit">
            <div class="form-group">
              <label class="form-control-label">Produk  <strong><a href = "<?php echo base_url();?>produk" target = "_blank">Buka Produk</a></label>
              <select class = "form-control" id = "status_kabupaten_edit" name = "status">
                <option value = "">Kasur</option>
                <option value = "">Rak meja</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Quantity</label>
              <input type="text" class="form-control" name="kabupaten" placeholder="Quantity" id = "nama_kabupaten_edit">
            </div>
          <div class="form-group">
            <label class="form-control-label">Keterangan Produk</label>
            <textarea type="text" class="form-control" name="kabupaten" placeholder="Keterangan Produk" id = "nama_kabupaten_edit"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Notes Kompetitor</label>
            <textarea type="text" class="form-control" name="kabupaten" placeholder="Notes Kompetitor" id = "nama_kabupaten_edit"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Notes Prospek</label>
            <textarea type="text" class="form-control" name="kabupaten" placeholder="Notes Prospek" id = "nama_kabupaten_edit"></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">Funnel</label>
            <select class = "form-control" id = "status_kabupaten_edit" name = "funnel">
              <option value="Belum Ditentukan">Belum Ditentukan</option>
              <option value = "">Lead</option>
              <option value = "">Prospek</option>
              <option value = "">Hot Prospek</option>
              <option value = "aktif">Win</option>
              <option value = "aktif">Loss</option>
            </select>
          </div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" onclick = "submit_changes_kabupaten()">Save changes</button>
        </div>
      </div>
      </div>

      <?php $this->load->view("includes/footer")?>
    <?php $this->load->view("includes/core-script")?>
    <script src="<?php echo base_url();?>global/vendor/asrange/jquery-asRange.min.js"></script>
    <script src="<?php echo base_url();?>global/vendor/bootbox/bootbox.js"></script>

  </body>
</html>
