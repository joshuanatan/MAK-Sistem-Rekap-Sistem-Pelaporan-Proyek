
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    
    <?php $this->load->view("includes/meta");?>
    
    <title>ITin Bisnis | Client</title>
    
    <?php $this->load->view("includes/core-head");?>
    
    <style>
      .scroll-detail-table-wrapper{
        overflow-y:scroll;
        height:200px;
      }
      .scroll-main-table-wrapper{
        overflow-y:scroll;
        height:400px;
      }
    </style>
  </head>
  <body class="animsition site-navbar-small dashboard">
    <?php $this->load->view("includes/navbar");?>

    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Master Client</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
          <li class="breadcrumb-item active">Client</li>
        </ol>
      </div>

      <div class="page-content container-fluid" style = "padding-bottom:0">
        <div class="row">
          <div class="col-xl-8 col-sm-12">
            <!-- Panel Kitchen Sink -->
            <div class="panel">
              <header class="panel-heading">
                <h3 class="panel-title">
                  Daftar Client
                  <span class="panel-desc">
                  </span>
                </h3>
              </header>

              <div class="panel-body">
                <button type = "button" class = "btn btn-primary btn-sm" data-toggle = "modal" data-target = "#tambah-client">Tambah Client</button>
                <div class = "scroll-main-table-wrapper">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nama Client</th>
                        <th>Contact Person Detail</th>
                        <th>Industri</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id = "client-table-container">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- End Panel Kitchen Sink -->
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="panel">
              <header class="panel-heading">
                <h3 class="panel-title">
                  Detail Client
                  <span class="panel-desc">
                  </span>
                </h3>
              </header>

              <div class="panel-body">
                <form autocomplete="off">
                  <div class="row">
                    <div class="form-group form-material col-md-12">
                      <label class="form-control-label" for="inputBasicFirstName">Nama Client</label>
                      <input type="text" class="form-control" disabled />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group form-material col-md-12">
                      <label class="form-control-label" for="inputBasicFirstName">Contact Detail</label>
                      <textarea class="form-control" disabled /></textarea>
                    </div>
                  </div>
                  <div class="row scroll-detail-table-wrapper">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <th>Project ID</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                        <tr>
                          <td><a href = "#">PRJ-WEB-001</a></td>
                          <td>12/20/2021</td>
                          <td>12/20/2021</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
        <?php $this->load->view("includes/footer");?>
    </div>
    <!-- End Page -->
    <?php $this->load->view("includes/core-script");?>
        
  </body>
</html>


<script src="<?php echo base_url();?>global/vendor/bootstrap-table/bootstrap-table.min.js"></script>
<script src="<?php echo base_url();?>global/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.js"></script>

<script src="<?php echo base_url();?>global/vendor/peity/jquery.peity.min.js"></script>
<script src="<?php echo base_url();?>global/js/Plugin/peity.js"></script>

<script src="<?php echo base_url();?>global/js/Plugin/asprogress.js"></script>
<script src="<?php echo base_url();?>global/vendor/asprogress/jquery-asProgress.js"></script>

<?php if($role === "admin"):?>
<div class="modal fade modal-fill-in" id="tambah-client" tabindex="-1">
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Tambah Client</h4>
      </div>
      <div class="modal-body">
        <form autocomplete="off" id = "create_client_form">
          <div class="form-group form-material col-md-12">
            <label class="form-control-label">Nama Client</label>
            <input type="text" class="form-control" name = "nama"/>
          </div>
          <div class="form-group form-material col-md-12">
            <label class="form-control-label">Industri</label>
            <input type="text" class="form-control" name = "industri"/>
          </div>
          <div class="form-group form-material col-md-12">
            <label class="form-control-label">Contact Person</label>
            <input type="text" class="form-control" name = "cp"/>
          </div>
          <div class="form-group form-material col-md-12">
            <label class="form-control-label">No Contact Person</label>
            <input type="text" class="form-control" name = "cp_no"/>
          </div>
          <div class="form-group form-material col-md-12">
            <label class="form-control-label">Email Contact Person</label>
            <input type="text" class="form-control" name = "cp_email"/>
          </div>
          <div class="form-group form-material col-md-12">
            <label class="form-control-label">Notes</label>
            <textarea class = "form-control" name = "notes"></textarea>
          </div>
          <button type = "button" id = "create_client_submit_button" class = "btn btn-primary btn-sm col-lg-12">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $("#create_client_submit_button").click(function(){
    var form = $("#create_client_form")[0];
    var formData = new FormData(form);
    $.ajax({
      url:"<?php echo base_url();?>client_api/input_client",
      type:"POST",
      data:formData,
      dataType:"JSON",
      contentType: false,
      processData: false, 
      success:function(respond){
        $("#tambah-client").modal("toggle");
        var html = `
        <tr>
          <td>${respond["data"]["nama"]} (New)</td>
          <td>${respond["data"]["industri"]}</td>
          <td>${respond["data"]["cp"]} ${respond["data"]["cp_no"]} ${respond["data"]["cp_email"]} </td>
          <td>
            <i class="icon md-edit" onclick = 'edit()' style = "cursor:pointer"></i>
            <i class="icon md-delete" style = "cursor:pointer"></i>
          </td>
        </tr>
        `;
        $("#client-table-container").append(html);
        $(".form-control").val("");
      }
    });
  });
</script>
<?php endif;?>
<script>
function edit(){
  alert("Test");
}
</script>