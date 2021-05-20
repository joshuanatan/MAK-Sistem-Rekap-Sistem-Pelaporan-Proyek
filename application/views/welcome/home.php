<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta"); ?>

  <title>MAK-CRM | Home</title>

  <?php $this->load->view("includes/core-head"); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist/chartist.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
</head>

<body class="animsition site-navbar-small dashboard">
  <?php $this->load->view("includes/navbar"); ?>
  <div class="page">
    <div class="page-content container-fluid">
      Selamat datang di MAK - CRM
      <hr />
      <table>
        <tr>
          <th>Currently login user</th>
          <th>:</th>
          <td style="padding-left:20px"><?php echo strtoupper($this->session->nama_user); ?></td>
        </tr>
        <tr>
          <th>Roles</th>
          <th>:</th>
          <td style="padding-left:20px"><?php echo ucwords($this->session->user_role) ?></td>
        </tr>
      </table>
    </div>
  </div>
  <?php $this->load->view("includes/footer"); ?>
  <?php $this->load->view("includes/core-script"); ?>
</body>

</html>