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
        <div class="">
          <form method="post" action="<?php echo base_url();?>prospek/insert">
            <div class="">
              <div class="panel">
                <div class="panel-body">
                  <h4 class="title">Tambah Prospek</h4>
                  <?php if ($this->session->user_role == "Sales Engineer"):?>
                  <div class="form-group">
                    <label class="form-control-label">Rumah Sakit</label>
                    <select class = "form-control"  name = "id_fk_rs" id="dataRumahSakit">
                      <option value="Belum Ditentukan" selected disabled hidden>-- Silahkan Pilih Rumah Sakit --</option>
                      <?php for($a = 0; $a < count($datars); $a++):?>
                      <option value = "<?php echo $datars[$a]["id_pk_rs"];?>"><?php echo $datars[$a]["rs_nama"];?></option>
                      <?php endfor;?>
                    </select>
                  </div>
                  <?php endif;?>
                  <?php if ($this->session->user_role == "Supervisor" || $this->session->user_role == "Area Sales Manager"):?>
                  <div class="form-group">
                    <label class="form-control-label">Kabupaten</label>
                    <select class = "form-control"  name = "kabupaten" onchange="showRumahSakit()" id="kabupaten">
                      <option value="Belum Ditentukan" selected disabled hidden>-- Silahkan Pilih Kabupaten --</option>
                      <?php for($a = 0; $a < count($datakabupaten); $a++):?>
                      <option value = "<?php echo $datakabupaten[$a]["id_pk_kabupaten"];?>"><?php echo $datakabupaten[$a]["kabupaten_nama"];?></option>
                      <?php endfor;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Rumah Sakit</label>
                    <select class = "form-control" name = "id_fk_rs" id="dataRumahSakit">

                    </select>
                  </div>
                  <?php endif;?>
                  <?php if ($this->session->user_role == "Sales Manager"):?>
                  <div class="form-group">
                    <label class="form-control-label">Provinsi</label>
                    <select class = "form-control"  name = "provinsi" onchange="showKabupaten()" id="provinsi">
                      <option value="Belum Ditentukan" selected disabled hidden>-- Silahkan Pilih Provinsi --</option>
                      <?php for($a = 0; $a < count($dataprovinsi); $a++):?>
                      <option value = "<?php echo $dataprovinsi[$a]["id_pk_provinsi"];?>"><?php echo $dataprovinsi[$a]["provinsi_nama"];?></option>
                      <?php endfor;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Kabupaten</label>
                    <select class = "form-control"  name = "kabupaten" onchange="showRumahSakit()" id="kabupaten">

                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Rumah Sakit</label>
                    <select class = "form-control" name = "id_fk_rs" id="dataRumahSakit">

                    </select>
                  </div>
                  <?php endif;?>
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
                    <input class="form-control" type="date" name="estimasi_pembelian">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Funnel</label>
                    <select class = "form-control" name = "funnel" onchange="funnelProspek()" id="prospek">
                      <option value="Belum Ditentukan" selected>Belum Ditentukan</option>
                      <option value = "Lead">Lead</option>
                      <option value = "Prospek">Prospek</option>
                      <option value = "Hot Prospek">Hot Prospek</option>
                      <option value = "Win">Win</option>
                      <option value = "Loss">Loss</option>
                    </select>
                  </div>
                  <div class="form-group" id="funnelPercentage">

                  </div>
                  <div class="form-group" id="noEkatalog">

                  </div>
                  <div class="form-group" id="noteLoss">

                  </div>
                  <div class="form-group" id="noteSirup">

                  </div>
                  <label class="form-control-label">Detail Produk</label>
                  <div class = "table-responsive">
                    <table class="table table-hover table-striped w-full" id="table_content_container">
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
                  </div>
                  <button type="button" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>


          </form>
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
      var base_url = "<?php echo base_url();?>";
      function showRumahSakit() {
        var base_url = "<?php echo base_url();?>";
        var id_kabupaten = $("#kabupaten").val();
        $.ajax({
          url:`${base_url}ws/prospek/get_rs/${id_kabupaten}`,
          type:"GET",
          dataType:"JSON",
          success:function(respond){

            var html = "";
            for(var a = 0; a<respond["data_rs"].length; a++){
              html += `
                <option value = '${respond["data_rs"][a]["id_pk_rs"]}'>${respond["data_rs"][a]["rs_nama"]}</option>
              `;
            }
            $("#dataRumahSakit").html(html);
          }
        });
      }

      function showKabupaten() {
        var id_provinsi = $("#provinsi").val();
        $.ajax({
          url:`${base_url}ws/prospek/get_kabupaten/${id_provinsi}`,
          type:"GET",
          dataType:"JSON",
          success:function(respond){
            var html = "";
            for(var a = 0; a<respond["data_kabupaten"].length; a++){
              html += `
                <option value = '${respond["data_kabupaten"][a]["id_pk_kabupaten"]}'>${respond["data_kabupaten"][a]["kabupaten_nama"]}</option>
              `;
            }
            $("#kabupaten").html(html);
          }
        });
      }

      function funnelProspek() {
        var prospek = $("#prospek").val();
        var id_rs = $("#dataRumahSakit").val();
        $.ajax({
          url:`${base_url}ws/prospek/get_rs_kategori/${id_rs}`,
          type:"GET",
          dataType:"JSON",
          success:function(respond){
            if (prospek == "Prospek" && "<?php echo $this->session->user_role;?>" == "Supervisor" && respond["data_rs_kategori"][0]["rs_kategori"] == "Pemerintah"){
              var html4 = "";
              $("#noteSirup").show();
              html4 += `
                <label class="form-control-label">No SiRUP</label>
                <input type="text" class="form-control" name="no_sirup">
              `;
                $("#funnelPercentage").html("");
                $("#noEkatalog").html("");
                $("#noteLoss").html("");
            } else if (prospek == "Win" && "<?php echo $this->session->user_role;?>" == "Sales Manager" && respond["data_rs_kategori"][0]["rs_kategori"] == "Pemerintah"){
              var html2 = "";
              $("#noEkatalog").show();
              html2 += `
                <label class="form-control-label">No E Katalog</label>
                <input type="text" class="form-control" name="nomorekatalog">
              `;
                $("#funnelPercentage").html("");
                $("#noteLoss").html("");
                $("#noteSirup").html("");
            } else if (prospek == "Loss"){
              var html3 = "";
              $("#noteLoss").show();
              html3 += `
                <label class="form-control-label">Note</label>
                <textarea type="text" class="form-control" name="note_loss"></textarea>
              `;
                $("#funnelPercentage").html("");
                $("#noEkatalog").html("");
                $("#noteSirup").html("");
            } else if (prospek == "Prospek") {
               var html1 = "";
               $("#funnelPercentage").show();
               html1 += `
                 <label class="form-control-label">Funnel</label>
                 <select class="form-control" name="funnel_percentage">
                   <option value = "25%">25%</option>
                   <option value = "50%">50%</option>
                   <option value = "75%">75%</option>
                 </select>
               `;
               $("#noEkatalog").html("");
               $("#noteLoss").html("");
               $("#noteSirup").html("");
            } else {
              $("#funnelPercentage").html("");
              $("#noEkatalog").html("");
              $("#noteLoss").html("");
              $("#noteSirup").html("");
            }
            $("#funnelPercentage").html(html1);
            $("#noEkatalog").html(html2);
            $("#noteLoss").html(html3);
            $("#noteSirup").html(html4);
          }
        });
      }

      function tambahRowProduk(){
        var html = `
          <tr id = "tambahRowProduk${row}">
            <td>
              <input type ='hidden' name='data_produk[]' value='${row}'>
              <select class = 'form-control' name = 'id_fk_produk${row}' id = 'nama_produk_insert${row}'>
              <?php for($a = 0; $a < count($dataproduk); $a++):?>
                <option value = "<?php echo $dataproduk[$a]["id_pk_produk"];?>"><?php echo $dataproduk[$a]["produk_nama"];?></option>
              <?php endfor;?>
              </select>
            </td>
            <td><input type = 'number' class = 'form-control' name = 'detail_quantity${row}' id = 'qty_produk_insert${row}' min="0"></td>
            <td>
              <textarea class = 'form-control' name = 'detail_keterangan${row}' id ='keterangan_produk_insert${row}'></textarea>
            </td>
            <td>
              <button type = 'button' class = 'btn btn-danger btn-sm' onclick = 'deleteProdukData(this)'><i class = 'icon md-delete'></i></button>
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
    </script>
  </body>
</html>
