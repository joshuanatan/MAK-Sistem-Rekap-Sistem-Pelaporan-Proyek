
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
            </div>
            <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Paket</th>
                  <th>Pagu</th>
                  <th>Jenis Pengadaan</th>
                  <th>Metode</th>
                  <th>Pemilihan</th>
                  <th>K/L/PD</th>
                  <th>Satuan Kerja</th>
                  <th>Lokasi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
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

<div class="modal fade" id="insertModal">
  <div class="modal-dialog modal-simple modal-top">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="exampleModalTitle">Modal Title</h4>
      </div>
      <form autocomplete="off">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">First Name</label>
            <input type="text" class="form-control" name="inputFirstName" placeholder="First Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">First Name</label>
            <input type="text" class="form-control" name="inputFirstName" placeholder="First Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">First Name</label>
            <input type="text" class="form-control" name="inputFirstName" placeholder="First Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label" for="inputBasicFirstName">First Name</label>
            <textarea class="form-control" name="inputFirstName" placeholder="First Name" autocomplete="off"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="pencarianModal">
  <div class="modal-dialog modal-lg modal-simple modal-top">
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