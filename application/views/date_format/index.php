<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
  <?php $this->load->view("includes/meta"); ?>
  <?php $this->load->view("includes/core-head"); ?>
  <title>MAK-CRM | Date</title>
</head>

<body class="animsition site-navbar-small ">

  <?php $this->load->view("includes/navbar"); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/structure/pagination.css">
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Date Format</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>welcome/home">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
        <li class="breadcrumb-item active">Date</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <form class="" action="<?php echo base_url(); ?>date_format/change_date" method="post">
          <input type="text" name="tanggal">
          <input type="submit">
        </form>
      </div>
    </div>
  </div>
  <!-- End Page -->
  <?php $this->load->view("includes/footer"); ?>
  <!-- Core  -->
  <?php $this->load->view("includes/core-script"); ?>
  </body>
</html>
