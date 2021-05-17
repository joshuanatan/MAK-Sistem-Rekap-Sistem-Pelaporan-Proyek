<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
        data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
    </button>
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
        data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
    </button>
    <a class="navbar-brand navbar-brand-center" href="/index.html">
        <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?php echo base_url();?>assets/images/logo.png"
        title="Remark">
        <img class="navbar-brand-logo navbar-brand-logo-special" src="<?php echo base_url();?>assets/images/logo-colored.png"
        title="Remark">
        <span class="navbar-brand-text hidden-xs-down"> Remark</span>
    </a>
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
        data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon md-search" aria-hidden="true"></i>
    </button>
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
        <li class="nav-item hidden-sm-down" id="toggleFullscreen">
          <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
            <span class="sr-only">Toggle fullscreen</span>
          </a>
        </li>
      </ul>
      <!-- End Navbar Toolbar -->

      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
        <li class="nav-item dropdown">
          <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
            <span class="avatar avatar-online">
                <img src="<?php echo base_url();?>global/portraits/5.jpg" alt="...">
                <i></i>
            </span>
          </a>
          <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Profile</a>
            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-card" aria-hidden="true"></i> Billing</a>
            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav> 
<?php if(strtolower($this->session->user_role) == "administrator"):?>   
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
                <a class="animsition-link" href="<?php echo base_url();?>produk">
                  <span class="site-menu-title">Produk</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="<?php echo base_url();?>provinsi">
                  <span class="site-menu-title">Provinsi & Kabupaten</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">Rumah Sakit</span>
        </a>
        <div class="dropdown-menu">
          <div class="site-menu-scroll-wrap is-list">
            <ul class="site-menu-sub site-menu-normal-list">  
              <li class="site-menu-item">
                <a class="animsition-link" href="<?php echo base_url();?>rumah_sakit">
                  <span class="site-menu-title">Daftar Rumah Sakit</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="<?php echo base_url();?>penyelenggara">
                  <span class="site-menu-title">Penyelenggara Rumah Sakit</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="<?php echo base_url();?>jenis_rs">
                  <span class="site-menu-title">Jenis Rumah Sakit</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>sirup" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">SiRUP</span>
        </a>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>ekatalog" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">E-Katalog</span>
        </a>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>user" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">User</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<?php elseif(strtolower($this->session->user_role) == "supervisor"):?>
<div class="site-menubar">
  <div class="site-menubar-body">
    <ul class="site-menu" data-plugin="menu">
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>sirup" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">SiRUP</span>
        </a>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>prospek" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">Prospek</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<?php elseif(strtolower($this->session->user_role) == "sales manager"):?>
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
                <a class="animsition-link" href="<?php echo base_url();?>produk">
                  <span class="site-menu-title">Produk</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="<?php echo base_url();?>provinsi">
                  <span class="site-menu-title">Provinsi & Kabupaten</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a data-toggle="dropdown" href="javascript:void(0)" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">Rumah Sakit</span>
        </a>
        <div class="dropdown-menu">
          <div class="site-menu-scroll-wrap is-list">
            <ul class="site-menu-sub site-menu-normal-list">  
              <li class="site-menu-item">
                <a class="animsition-link" href="<?php echo base_url();?>rumah_sakit">
                  <span class="site-menu-title">Daftar Rumah Sakit</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="<?php echo base_url();?>penyelenggara">
                  <span class="site-menu-title">Penyelenggara Rumah Sakit</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a class="animsition-link" href="<?php echo base_url();?>jenis_rs">
                  <span class="site-menu-title">Jenis Rumah Sakit</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>sirup" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">SiRUP</span>
        </a>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>ekatalog" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">E-Katalog</span>
        </a>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>prospek" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">Prospek</span>
        </a>
      </li>
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>user" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">User</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<?php else:?>
<div class="site-menubar">
  <div class="site-menubar-body">
    <ul class="site-menu" data-plugin="menu">
      <li class="dropdown site-menu-item has-sub">
        <a href="<?php echo base_url();?>prospek" data-dropdown-toggle="false">
          <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
          <span class="site-menu-title">Prospek</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<?php endif;?>