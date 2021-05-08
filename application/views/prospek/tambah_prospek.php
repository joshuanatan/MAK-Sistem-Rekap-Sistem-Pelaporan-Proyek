<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <?php $this->load->view("includes/meta") ?>
    <title>MAK-CRM | Prospek</title>
    <?php $this->load->view("includes/core-head") ?>
    <link rel="stylesheet" href="<?php echo base_url();?>global/fonts/font-awesome/font-awesome.css">

    <style>
      .scroll-produk-table-wrapper{
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
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>Prospek">Prospek</a></li>
          <li class="breadcrumb-item active">Tambah Prospek</li>
        </ol>
      </div>
      <div class="page-content container-fluid">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <div class="panel">
              <div class="panel-body">
                <h4 class="title">Tambah Prospek</h4>
                <input type="hidden" class="form-control" name="id_prospek">
                <div class="form-group">
                  <form method="post">
                  <label class="form-control-label">Rumah Sakit</label>
                  <select class = "form-control"  name = "id_fk_rs">
                    <option value="Belum Ditentukan" selected disabled hidden>-- Silahkan Pilih Rumah Sakit --</option>
                    <?php for($a = 0; $a < count($datars); $a++):?>
                    <option value = "<?php echo $datars[$a]["id_pk_rs"];?>"><?php echo $datars[$a]["rs_nama"];?></option>
                    <?php endfor;?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Prospek Principle</label>
                  <input type="text" class="form-control" name="prospek_principle" placeholder="Prospek Principle">
                </div>
                <div class="form-group">
                  <label class="form-control-label">Notes Kompetitor</label>
                  <textarea type="text" class="form-control" name="notes_kompetitor" placeholder="Notes Kompetitor"></textarea>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Notes Prospek</label>
                  <textarea type="text" class="form-control" name="notes_prospek" placeholder="Notes Prospek"></textarea>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Estimasi Pembelian</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" data-plugin="datepicker" data-multidate="true">
                    </div>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Funnel</label>
                  <select class = "form-control" name = "funnel">
                    <option value="Belum Ditentukan" selected>Belum Ditentukan</option>
                    <option value = "">Lead</option>
                    <option value = "">Prospek</option>
                    <option value = "">Hot Prospek</option>
                    <option value = "aktif">Win</option>
                    <option value = "aktif">Loss</option>
                  </select>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick = "submitProspekData()">Save changes</button>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-sm-12">
            <div class="panel">
              <div class="panel-body">
                <h4 class="title">Detail Produk</h4>
                <div class = "scroll-produk-table-wrapper">
                  <table class="table table-hover table-striped w-full" id = "table_content_container">
                    <thead>
                      <tr>
                        <th>Produk <strong><a href = "<?php echo base_url();?>produk" target = "_blank">Buka Produk</a></th>
                        <th>Quantity</th>
                        <th>Keterangan Produk</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id = "tambah_produk_button_container">
                        <td colspan = 4>
                          <button type = "button" class = "btn btn-primary btn-sm col-lg-12" onclick = "tambahRowProduk()">Tambah Produk</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </form>
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
    </div>

    <?php $this->load->view("includes/footer")?>
    <?php $this->load->view("includes/core-script")?>
    <script src="<?php echo base_url();?>global/vendor/asrange/jquery-asRange.min.js"></script>
    <script src="<?php echo base_url();?>global/vendor/bootbox/bootbox.js"></script>

    <script>
      var active_provinsi = "";
      var active_id_provinsi = "";
      function load_kabupaten_provinsi(provinsi,id_provinsi){
        active_provinsi = provinsi;
        active_id_provinsi = id_provinsi;
        reload_table1();
      }
    </script>
    <script>
      var row = 0;
      var edited_row = 0;
      var deleted_row = 0;
    </script>
    <script>
      function tambahRowProduk(){
        var html = `
          <tr id = "tambahRowProduk${row}">
            <td>
            <select class = 'form-control' name = id_fk_produk id = 'nama_produk_insert${row}'>
            <?php for($a = 0; $a < count($dataproduk); $a++):?>
              <option value = "<?php echo $dataproduk[$a]["id_pk_produk"];?>"><?php echo $dataproduk[$a]["produk_nama"];?></option>
            <?php endfor;?>
            </td>
            <td><input type = 'number' class = 'form-control' name = detail_quantity id = 'qty_produk_insert${row}' min="0"></td>
            <td>
              <textarea class = 'form-control' name = detail_keterangan id ='keterangan_produk_insert${row}'></textarea>
            </td>
            <td>
              <button type = "button" class = "btn btn-danger btn-sm" onclick = "deleteProdukData(this)"><i class = "icon md-delete"></i></button>
            </td>
          </tr>
        `;
        $("#tambah_produk_button_container").before(html);
        row++;
      }

      function deleteProdukData(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("table_content_container").deleteRow(i);
      }

      function submitProspekData(row){
        var nama_produk = $("#qty_produk_insert"+row).val();
        var qty_produk = $("#qty_produk_insert"+row).val();
        var keterangan_produk = $("#keterangan_produk_insert"+row).val();
        $.ajax({
          url:"<?php echo base_url();?>ws/prospek/create",
          type:"POST",
          dataType:"JSON",
          data:{
            "nama_produk":nama_produk,
            "qty_produk": qty_produk,
            "keterangan_produk": keterangan_produk
          },
          success:function(respond){
            if(respond["status"] == "success"){
              $("#tambahRowProduk"+row).remove();
              reload_table();
            }
          }
        });
      }
      function load_edit(row){
        edited_row = row;
        var id_provinsi = $("#id_provinsi"+row).val();
        var nama_provinsi = $("#nama_provinsi"+row).val();
        var status_provinsi = $("#status_provinsi"+row).val();
        $("#id_provinsi_edit").val(id_provinsi);
        $("#nama_provinsi_edit").val(nama_provinsi);
        $("#status_provinsi_edit").val(status_provinsi);
      }
      function submit_changes(){
        var id_provinsi_edit = $("#id_provinsi_edit").val();
        var nama_provinsi_edit = $("#nama_provinsi_edit").val();
        var status_provinsi_edit = $("#status_provinsi_edit").val();
        $.ajax({
          url:"<?php echo base_url();?>ws/provinsi/update",
          type:"POST",
          dataType:"JSON",
          data:{
            "id":id_provinsi_edit,
            "nama":nama_provinsi_edit,
            "status":status_provinsi_edit,
            "id_edit":<?php echo $this->session->id_user?>
          },
          success:function(respond){
            if(respond["status"] == "success"){
              reload_table();
            }
            $("#edit_provinsi").modal("hide");
          }
        });
      }
      function load_delete(row){
        deleted_row = row;
        var id = $("#id_provinsi"+row).val();
        $("#id_provinsi_delete").val(id);
      }
      function submit_delete(){
        var id = $("#id_provinsi_delete").val();
        $.ajax({
          url:"<?php echo base_url();?>ws/provinsi/delete?id="+id+"&id_delete=<?php echo $this->session->id_user;?>",
          type:"delete",
          dataType:"JSON",
          success:function(respond){
            if(respond["status"] == "success"){
              $("#provinsi_row"+deleted_row).remove();
              reload_table();
              $("#delete_provinsi").modal("hide");
            }
          }
        });
      }
    </script>
    <script>
      var row_kabupaten = 0;
      function tambahRowKabupaten(){
        var html = `
          <tr id = "tambahRowKabupaten${row_kabupaten}">
            <td><input type = 'text' class = 'form-control' id = 'nama_kabupaten_insert${row_kabupaten}'></td>
            <td>
              <select class = 'form-control' id = 'status_kabupaten_insert${row_kabupaten}'>
                <option value = "aktif">AKTIF</option>
                <option value = "nonaktif">NONAKTIF</option>
            </td>
            <td>
              <button type = "button" class = "btn btn-danger btn-sm" onclick = "submitKabupatenData(${row_kabupaten})"><i class = "icon md-delete"></i></button>
            </td>
          </tr>
        `;
        $("#tambah_kabupaten_button_container").before(html);
        row_kabupaten++;
      }
      function submitKabupatenData(row){
        var nama_kabupaten = $("#nama_kabupaten_insert"+row).val();
        var status_kabupaten = $("#status_kabupaten_insert"+row).val();
        var id_provinsi = active_id_provinsi;
        $.ajax({
          url:"<?php echo base_url();?>ws/kabupaten/create",
          type:"POST",
          dataType:"JSON",
          data:{
            "nama_kabupaten":nama_kabupaten,
            "status_kabupaten": status_kabupaten,
            "id_provinsi": id_provinsi,
            "id_create":<?php echo $this->session->id_user;?>
          },
          success:function(respond){
            if(respond["status"] == "success"){
              reload_table1();
            }
          }
        });
      }
      function load_edit_kabupaten(row){
        edited_row = row;
        var id_prospek = $("#id_prospek"+row).val();
        var nama_kabupaten = $("#nama_kabupaten"+row).val();
        var status_kabupaten = $("#status_kabupaten"+row).val();
        $("#id_kabupaten_edit").val(id_prospek);
        $("#nama_prospek_edit").val(nama_kabupaten);
        $("#status_prospek_edit").val(status_kabupaten);
      }
      function submit_changes_kabupaten(){
        var id_kabupaten_edit = $("#id_kabupaten_edit").val();
        var nama_prospek_edit = $("#nama_prospek_edit").val();
        var status_prospek_edit = $("#status_prospek_edit").val();
        $.ajax({
          url:"<?php echo base_url();?>ws/kabupaten/update",
          type:"POST",
          dataType:"JSON",
          data:{
            "id":id_kabupaten_edit,
            "nama":nama_prospek_edit,
            "status":status_prospek_edit,
            "id_edit":<?php echo $this->session->id_user?>
          },
          success:function(respond){
            if(respond["status"] == "success"){
              reload_table1();
            }
            $("#edit_kabupaten").modal("hide");
          }
        });
      }
      function load_delete_kabupaten(row){
        deleted_row = row;
        var id = $("#id_prospek"+row).val();
        $("#id_kabupaten_delete").val(id);
      }
      function submit_delete_kabupaten(){
        var id = $("#id_kabupaten_delete").val();
        $.ajax({
          url:"<?php echo base_url();?>ws/kabupaten/delete?id="+id+"&id_delete=<?php echo $this->session->id_user;?>",
          type:"delete",
          dataType:"JSON",
          success:function(respond){
            if(respond["status"] == "success"){
              $("#kabupaten_row"+deleted_row).remove();
              $("#delete_kabupaten").modal("hide");
              reload_table1();
            }
          }
        });
      }
    </script>
  </body>
</html>
