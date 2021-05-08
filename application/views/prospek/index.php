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
            <h3>Daftar Prospek</h3>
            <br>
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
            <a href="<?php echo base_url();?>prospek/add_prospek" type = "button" class = "btn btn-primary btn-sm">Tambah Prospek</a>
            <br>
            <br>
            <div class = "scroll-provinsi-table-wrapper">
              <table class="table table-hover table-striped w-full" id = "table_content_container">
                <thead>
                  <tr>
                    <th>ID Prospek</th>
                    <th>Rumah Sakit</th>
                    <th>Prospek Principle</th>
                    <th>Notes Kompetitor</th>
                    <th>Notes Prospek</th>
                    <th>Funnel</th>
                    <th>Total Price</th>
                    <th>Estimasi Pembelian</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tbody id = "table_content_container">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <h3>Detail Prospek</h3>
            <br>
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
    <script>
    var base_url = "<?php echo base_url();?>";
    reload_table();
    function reload_table(){
      var url = `<?php echo base_url();?>ws/prospek/get_data`;
      $.ajax({
        url:url,
        type:"GET",
        dataType:"JSON",
        success:function(respond){
          var html = "";
          content = respond["data"];
          for(var a = 0; a<respond["data"].length; a++){
            html += `
            <tr id = "prospek_row${a}">
              <td>${respond["data"][a]["id_pk_prospek"]}</td>
              <td>${respond["data"][a]["nama_rs"]}</td>
              <td>${respond["data"][a]["prospek_principle"]}</td>
              <td>${respond["data"][a]["notes_kompetitor"]}</td>
              <td>${respond["data"][a]["notes_prospek"]}</td>
              <td>${respond["data"][a]["funnel"]}</td>
              <td>${respond["data"][a]["total_price_prospek"]}</td>
              <td>${respond["data"][a]["estimasi_pembelian"]}</td>
              <td>
              <button type = "button" class = "btn btn-primary btn-sm" onclick = "load_edit(${a})"><i class = "icon md-edit"></i></button>
              <button type = "button" class = "btn btn-danger btn-sm" onclick = "load_delete(${a})"><i class = "icon md-delete"></i></button>
              </td>
            </tr>
            `;
          }
          $("#table_content_container").html(html);
          /*pagination(respond["page"]);*/
        }
      })

    }
      function load_delete(row){
        $("#delete_button").attr("onclick",`delete_row(${row})`);
        $("#modalDelete").modal("show");
      }
      function delete_row(row){
        var id_prospek = content[row]["id_pk_prospek"];
        $.ajax({
          url:`${base_url}ws/prospek/delete/${id_prospek}`,
          type:"DELETE",
          dataType:"JSON",
          success:function(respond){
            alert("Data Produk Berhasil Dihapus");
            $("#modalDelete").modal("hide");
            $(`#prospek_row${row}`).remove();
          }
        });
      }
    </script>
  </body>
</html>
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
        <button type="submit" class="btn btn-danger" data-dismiss="modal" id = "delete_button">Delete</button>
      </div>
    </div>
  </div>
</div>
</script>
