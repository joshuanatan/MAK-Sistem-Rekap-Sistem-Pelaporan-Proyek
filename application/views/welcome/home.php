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
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        Hi <strong><?php echo $this->session->nama_user;?></strong>, Selamat datang di MAK - CRM
      </div>
      
      <hr />
      <table>
        <tr>
          <th>Role</th>
          <th>:</th>
          <td style="padding-left:20px"><?php echo ucwords($this->session->user_role) ?></td>
        </tr>
        <tr>
          <th>Total Prospek</th>
          <th>:</th>
          <td align="right">Rp. <?php echo number_format($user_data['total_price']);?></td>
        </tr>
        <tr>
          <th>Sirup Funnel<th> 
          <th>:</th>
          <td><?php echo $user_data['funnel'];?></td>
        </tr>
        <tr>
          <th>Sirup Not Funnel<th> 
          <th>:</th>
          <td><?php echo $user_data['not_funnel'];?></td>
        </tr>
        <tr>
          <th>Total Prospek Pemerintah<th> 
          <th>:</th>
          <td align="right">Rp. <?php echo number_format($user_data['total_prospek_pemerintah']);?></td>
        </tr>
        <tr>
          <th>Total Prospek Swasta<th> 
          <th>:</th>
          <td align="right">Rp. <?php echo number_format($user_data['total_prospek_swasta']);?></td>
        </tr>
      </table>
    </div>
  </div>
  <?php $this->load->view("includes/footer"); ?>
  <?php $this->load->view("includes/core-script"); ?>
</body>

</html>