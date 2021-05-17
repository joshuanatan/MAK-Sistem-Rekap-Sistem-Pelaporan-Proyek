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
              <table class="table table-hover table-striped w-full">
                <thead>
                  <tr>
                    <th>Provinsi</th>
                    <th>Kabupaten</th>
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
                <tbody id = "table_content_container">
                </tbody>
              </table>
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
    var user_role = "<?php echo $this->session->user_role?>";
    var user_id = "<?php echo $this->session->id_user?>";
    reload_table();

    function reload_table(){
      var url = `<?php echo base_url();?>ws/prospek/get_data`;
      $.ajax({
        url:url,
        type:"POST",
        dataType:"JSON",
        success:function(respond){
          var html = "";
          content = respond["data"];
          for(var a = 0; a<respond["data"].length; a++){
            var htmlEditButton = "";
            var htmlDeleteButton = "";
            if ((respond["data"][a]["flag_sirup"] == 1 && user_role == "Supervisor") || (respond["data"][a]["flag_ekatalog"] == 1 && user_role == "Sales Manager") || (respond["data"][a]["prospek_id_create"] == user_id)) {
              htmlEditButton = `<a target="_blank" href="<?php echo base_url();?>prospek/edit_prospek/${respond["data"][a]["id_pk_prospek"]}" type = "button" class = "btn btn-primary btn-sm"><i class = "icon md-edit"></i></a>`;
            }
            if (respond["data"][a]["prospek_id_create"] == user_id) {
              htmlDeleteButton = `<button type = "button" class = "btn btn-danger btn-sm" onclick = "load_delete(${a})"><i class = "icon md-delete"></i></button>`;
            }
            html += `
            <tr id = "prospek_row${a}">
              <td>${respond["data"][a]["nama_provinsi"]}</td>
              <td>${respond["data"][a]["nama_kabupaten"]}</td>
              <td>${respond["data"][a]["nama_rs"]}</td>
              <td>${respond["data"][a]["prospek_principle"]}</td>
              <td>${respond["data"][a]["notes_kompetitor"]}</td>
              <td>${respond["data"][a]["notes_prospek"]}</td>
              <td>${respond["data"][a]["funnel"]}</td>
              <td>${respond["data"][a]["total_price_prospek"]}</td>
              <td>${respond["data"][a]["estimasi_pembelian"]}</td>
              <td>
                <a href="<?php echo base_url();?>prospek/detail_prospek/${respond["data"][a]["id_pk_prospek"]}" type = "button" class = "btn btn-light btn-sm" id="load_button"><i class="icon md-search" aria-hidden="true"></i></button>
                ${htmlEditButton}
                ${htmlDeleteButton}
              </td>
            </tr>
            `;
          }
          $("#table_content_container").html(html);
          /*pagination(respond["page"]);*/
        }
      });
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
