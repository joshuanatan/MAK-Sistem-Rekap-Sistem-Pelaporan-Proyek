<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta") ?>

  <title>MAK-CRM | Master User</title>

  <?php $this->load->view("includes/core-head") ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/fonts/font-awesome/font-awesome.css">


</head>

<body class="animsition site-navbar-small">
  <?php $this->load->view("includes/navbar") ?>

  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Profile</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome/home">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </div>

    <div class="page-content">
      <div class="panel">
        <table class="table w-full">
          <tr>
            <td>Username</td>
            <td>:</td>
            <td><?php echo $datauser[0]["user_username"]; ?></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo $datauser[0]["user_role"]; ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $datauser[0]["user_email"]; ?></td>
          </tr>
          <tr>
            <td>Telepon</td>
            <td>:</td>
            <td><?php echo $datauser[0]["user_telepon"]; ?></td>
          </tr>
          <tr>
            <td>Bergabung Sejak</td>
            <td>:</td>
            <td><?php echo $datauser[0]["user_tgl_create"]; ?></td>
          </tr>
          <tr>
            <td colspan="3"><button type="button" class="btn btn-primary btn-sm" name="password" data-toggle="modal" data-target="#modalUpdatePass">Change Password</button></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  </div>
  <!-- End Page -->

  <div class="modal fade" id="modalUpdatePass">
    <div class="modal-dialog modal-simple modal-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <form action="<?php echo base_url(); ?>profile/change_pass" method="post" autocomplete="off">
          <div class="modal-body">
            <input type="hidden" class="form-control" name="iduser" value="<?php echo $datauser[0]["id_pk_user"] ?>">
            <input type="hidden" class="form-control" name="dbpass" value="<?php echo $datauser[0]["user_password"] ?>">
            <div class="form-group">
              <label class="form-control-label">Enter Old Password</label>
              <input type="password" class="form-control" name="oldpass" placeholder="Enter Old Password">
            </div>
            <div class="form-group">
              <label class="form-control-label">Enter New Password</label>
              <input type="password" class="form-control" name="newpass" placeholder="Enter New Password">
            </div>
            <div class="form-group">
              <label class="form-control-label">Confirm New Password</label>
              <input type="password" class="form-control" name="confirmnewpass" placeholder="Confirm New Password">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php $this->load->view("includes/footer") ?>
  <?php $this->load->view("includes/core-script") ?>
</body>

</html>