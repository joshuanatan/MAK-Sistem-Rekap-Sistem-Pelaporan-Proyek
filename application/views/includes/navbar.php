<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-bar"></span>
    </button>
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
      <i class="icon md-more" aria-hidden="true"></i>
    </button>
    <a class="navbar-brand navbar-brand-center" href="<?php echo base_url(); ?>welcome/home">
      <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?php echo base_url(); ?>assets/images/logo.png" title="PT. Mega Andalan Kalasan">
      <img class="navbar-brand-logo navbar-brand-logo-special" src="<?php echo base_url(); ?>assets/images/logo-colored.png" title="PT. Mega Andalan Kalasan">
      <span class="navbar-brand-text hidden-xs-down"> PT. Mega Andalan Kalasan</span>
    </a>
  </div>

  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
      <ul class="nav navbar-toolbar">
        <li class="nav-item hidden-float" id="toggleMenubar">
          <a class="nav-link" data-toggle="menubar" href="#" role="button">
            <i class="icon hamburger hamburger-arrow-left">
              <span class="sr-only">Toggle menubar</span>
              <span class="hamburger-bar"></span>
            </i>
          </a>
        </li>
      </ul>
      <!-- End Navbar Toolbar -->

      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
        <li class="nav-item dropdown">
          <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
            <span class="avatar">
              <img src="<?php echo base_url(); ?>global/portraits/5.jpg" alt="...">
              <i></i>
            </span>
          </a>
          <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" onclick="load_profile()" data-toggle="modal" data-target="#modal_update_profile" role="menuitem" style="cursor:pointer"><i class="icon md-account" aria-hidden="true"></i> Profil</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#modal_update_password" role="menuitem" style="cursor:pointer"><i class="icon md-key" aria-hidden="true"></i> Ubah Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url(); ?>welcome/logout" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php if (strtolower($this->session->user_role) == "administrator") : ?>
  <div class="site-menubar">
    <div class="site-menubar-body">
      <ul class="site-menu" data-plugin="menu">
        <li class="dropdown site-menu-item has-sub">
          <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
            <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
            <span class="site-menu-title">Master</span>
          </a>
          <div class="dropdown-menu">
            <div class="site-menu-scroll-wrap is-list">
              <ul class="site-menu-sub site-menu-normal-list">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>produk">
                    <span class="site-menu-title">Produk</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>provinsi">
                    <span class="site-menu-title">Provinsi & Kabupaten</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
            <i class="site-menu-icon md-store-24" aria-hidden="true"></i>
            <span class="site-menu-title">Rumah Sakit</span>
          </a>
          <div class="dropdown-menu">
            <div class="site-menu-scroll-wrap is-list">
              <ul class="site-menu-sub site-menu-normal-list">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>rumah_sakit">
                    <span class="site-menu-title">Daftar Rumah Sakit</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>penyelenggara">
                    <span class="site-menu-title">Penyelenggara Rumah Sakit</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>jenis_rs">
                    <span class="site-menu-title">Jenis Rumah Sakit</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>sirup" data-dropdown-toggle="false">
            <i class="site-menu-icon md-collection-bookmark" aria-hidden="true"></i>
            <span class="site-menu-title">SiRUP</span>
          </a>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>ekatalog" data-dropdown-toggle="false">
            <i class="site-menu-icon md-inbox" aria-hidden="true"></i>
            <span class="site-menu-title">E-Katalog</span>
          </a>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>user" data-dropdown-toggle="false">
            <i class="site-menu-icon md-account" aria-hidden="true"></i>
            <span class="site-menu-title">User</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
<?php elseif (strtolower($this->session->user_role) == "supervisor") : ?>
  <div class="site-menubar">
    <div class="site-menubar-body">
      <ul class="site-menu" data-plugin="menu">
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>sirup" data-dropdown-toggle="false">
            <i class="site-menu-icon md-collection-bookmark" aria-hidden="true"></i>
            <span class="site-menu-title">SiRUP</span>
          </a>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>prospek" data-dropdown-toggle="false">
            <i class="site-menu-icon md-assignment-check" aria-hidden="true"></i>
            <span class="site-menu-title">Prospek</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
<?php elseif (strtolower($this->session->user_role) == "sales manager") : ?>
  <div class="site-menubar">
    <div class="site-menubar-body">
      <ul class="site-menu" data-plugin="menu">
        <li class="dropdown site-menu-item has-sub">
          <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
            <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
            <span class="site-menu-title">Master</span>
          </a>
          <div class="dropdown-menu">
            <div class="site-menu-scroll-wrap is-list">
              <ul class="site-menu-sub site-menu-normal-list">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>produk">
                    <span class="site-menu-title">Produk</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>provinsi">
                    <span class="site-menu-title">Provinsi & Kabupaten</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
            <i class="site-menu-icon md-store-24" aria-hidden="true"></i>
            <span class="site-menu-title">Rumah Sakit</span>
          </a>
          <div class="dropdown-menu">
            <div class="site-menu-scroll-wrap is-list">
              <ul class="site-menu-sub site-menu-normal-list">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>rumah_sakit">
                    <span class="site-menu-title">Daftar Rumah Sakit</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>penyelenggara">
                    <span class="site-menu-title">Penyelenggara Rumah Sakit</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>jenis_rs">
                    <span class="site-menu-title">Jenis Rumah Sakit</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>sirup" data-dropdown-toggle="false">
            <i class="site-menu-icon md-collection-bookmark" aria-hidden="true"></i>
            <span class="site-menu-title">SiRUP</span>
          </a>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>ekatalog" data-dropdown-toggle="false">
            <i class="site-menu-icon md-inbox" aria-hidden="true"></i>
            <span class="site-menu-title">E-Katalog</span>
          </a>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>prospek" data-dropdown-toggle="false">
            <i class="site-menu-icon md-assignment-check" aria-hidden="true"></i>
            <span class="site-menu-title">Prospek</span>
          </a>
        </li>
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>user" data-dropdown-toggle="false">
            <i class="site-menu-icon md-account" aria-hidden="true"></i>
            <span class="site-menu-title">User</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
<?php else : ?>
  <div class="site-menubar">
    <div class="site-menubar-body">
      <ul class="site-menu" data-plugin="menu">
        <li class="dropdown site-menu-item has-sub">
          <a href="<?php echo base_url(); ?>prospek" data-dropdown-toggle="false">
            <i class="site-menu-icon md-assignment-check" aria-hidden="true"></i>
            <span class="site-menu-title">Prospek</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
<?php endif; ?>
<div class="alert alert-success alert-dismissible" role="alert">
  Currently login: <strong><?php echo $this->session->nama_user;?></strong> <strong>[ <?php echo $this->session->user_role;?> ]</strong>
</div>
<div class="modal fade" id="modal_update_profile">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Update Profil</h4>
      </div>
      <form id="update_profile_form">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">Username</label>
            <input type="text" class="form-control" name="username" id="profile_username" placeholder="username">
          </div>
          <div class="form-group">
            <label class="form-control-label">Email</label>
            <input type="email" class="form-control" name="email" id="profile_email" placeholder="Email">
          </div>
          <div class="form-group">
            <label class="form-control-label">Telepon</label>
            <input type="text" class="form-control" name="telepon" id="profile_telepon" placeholder="Telepon">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="update_profile()">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_update_password">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Update Password</h4>
      </div>
      <form id="update_password_form">
        <div class="modal-body">
          <div class="form-group">
            <label class="form-control-label">Password Saat Ini</label>
            <input type="password" class="form-control" name="pass_now" placeholder="Password Saat Ini">
          </div>
          <div class="form-group">
            <label class="form-control-label">Password Baru</label>
            <input type="password" class="form-control" name="new_pass" placeholder="Password Baru">
          </div>
          <div class="form-group">
            <label class="form-control-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" name="conf_pass" placeholder="Konfirmasi Password Baru">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="update_password()">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function update_profile() {
    var fd = new FormData($("#update_profile_form")[0]);
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/update_profile/`,
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(respond) {
        alert(respond["msg"]);
        if (respond["status"]) {
          $("#modal_update_profile").modal("hide");
        }
      }
    });
  }

  var form = document.getElementById("update_password_form").innerHTML;

  function update_password() {
    var fd = new FormData($("#update_password_form")[0]);
    $.ajax({
      url: `<?php echo base_url(); ?>ws/user/update_password/`,
      type: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(respond) {
        alert(respond["msg"]);
        if (respond["status"]) {
          $("#modal_update_password").modal("hide");
          $("#update_password_form").html(form);
        }
      }
    });
  }

  function load_profile() {
    $.ajax({
      url: "<?php echo base_url(); ?>ws/user/profile_detail",
      type: "GET",
      dataType: "JSON",
      success: function(respond) {
        var content = respond["data"];
        $("#profile_username").val(content[0]["user_username"]);
        $("#profile_email").val(content[0]["user_email"]);
        $("#profile_telepon").val(content[0]["user_telepon"]);
      }
    })
  }
</script>