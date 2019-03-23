<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
    if(!$this->session->userdata('employees')) {
        redirect('admin/login');
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?php echo $title; ?></title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url(); ?>assets/employee/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/employee/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/employee/css/argon.css?v=1.0.0" rel="stylesheet">

  <style>
    .padding-left-footer{
      padding-left: 300px;
    }
    .header-res {
      display: none;
    }
    .header-res-big {
      display: initial;
    }
    @media only screen and (max-width: 768px) {
      .scroll-navbar {
        max-width: 100%;
      }
      .header-res-big {
      display: none;
    }
      .main-content.after-login {
        padding-left: 0px !important;
        padding-top: 80px;
      }
      .header-res {
        display: initial;
      }
      .padding-left-footer {
        padding-left: 0px;
      }
    }
  </style>
</head>

<body>
  <!-- Sidenav -->
  <div class="scroll-navbar">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
      <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="admin/dashboard">
          <h1 class="header-res-big">Water Calculator</h1>
          <h3 class="header-res">Water Calculator</h3>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
          <li class="nav-item dropdown">
            <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-bell-55"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo base_url(); ?>assets/employee/img/theme/team-1-800x800.jpg">
                </span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="<?php echo base_url(); ?>assets/employee/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Form -->
          <form class="mt-4 mb-3 d-md-none">
            <div class="input-group input-group-rounded input-group-merge">
              <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <span class="fa fa-search"></span>
                </div>
              </div>
            </div>
          </form>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php echo ($title == 'Dashboard' ? 'active' : ''); ?>" href="<?php echo base_url(); ?>admin/dashboard">
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($title == 'Village' ? 'active' : ''); ?>" href="<?php echo base_url(); ?>admin/village">
                <i class="ni ni-planet text-blue"></i> Village
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($title == 'Bill' ? 'active' : ''); ?>" href="<?php echo base_url(); ?>admin/bill">
                <i class="ni ni-pin-3 text-orange"></i> Bill
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($title == 'Rate' ? 'active' : ''); ?>" href="<?php echo base_url(); ?>admin/rate">
                <i class="ni ni-settings text-purple"></i> Rate
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($title == 'Report' ? 'active' : ''); ?>" href="<?php echo base_url(); ?>admin/report">
                <i class="ni ni-collection text-yellow"></i> Report
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Main content -->
  <div class="main-content after-login">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html">Icons</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo base_url(); ?>assets/user/img/avatar/avatar-1.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $employee[0]->emp_name. ' ' . $employee[0]->emp_lastname; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?php echo base_url(); ?>admin/logout" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <?php if($content) echo $content; ?>
  <!-- Footer -->
  <div class="container-fluid">
  <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6 padding-left-footer">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="https://github.com/icecreamhotz" class="font-weight-bold ml-1" target="_blank">icecreamhot</a>
            </div>
          </div>
          <div class="col-xl-6" >
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://rmutl.ac.th/" class="nav-link" target="_blank">RMUTL</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Template by Creative Tim</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url(); ?>assets/employee/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/employee/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url(); ?>assets/employee/vendor/clipboard/dist/clipboard.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>assets/employee/js/argon.js?v=1.0.0"></script>

  <script src="<?php echo base_url(); ?>assets/employee/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/employee/js/jquery.nice-select.js"></script>
</body>
</html>