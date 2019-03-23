<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
    if($this->session->userdata('customers')) {
        redirect('home');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries 
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
  -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Waterfee Calculator</span></h4>
            <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
            <form method="POST" action="auth/login/login" class="needs-validation" novalidate="">
              <?php
                  if($this->session->flashdata('error') || $this->session->flashdata('logout')) {
              ?>
                <div class="alert <?php echo ($this->session->flashdata('error') ? 'alert-danger' : 'alert-success') ?> alert-has-icon">
                  <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                      <div class="alert-title">
                        <?php
                            echo ($this->session->flashdata('error') ? 'Error' : 'Success');
                        ?>    
                      </div>
                      <?php
                          echo ($this->session->flashdata('error') ? $this->session->flashdata('error') : $this->session->flashdata('logout'));
                      ?>
                    </div>
                  </div>
              <?php
                  }
              ?>
              <div class="form-group">
                <label for="email">Username</label>
                <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Please fill in your username
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                Don't have an account? <a href="register">Create new one</a>
              </div>
            </form>

          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?php echo base_url(); ?>assets/user/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Coffee More !</h1>
                <h5 class="font-weight-normal text-muted-transparent">Chaing Mai, Thailand</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
  <script src="<?php echo base_url(); ?>assets/user/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/user/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/user/js/custom.js"></script>
</body>
<script type="text/javascript">

  const BASE_URL = "http://localhost:8080/waterfee"

  setLogin = async (username, password) => {
    const login = await axios.post(`auth/login`, JSON.stringify({ 'username': username, 'password': password }))
    const { data } = await login
    if(data.status) {
      window.location.href = `${BASE_URL}/home`
    }
  }

</script>
</html>

<?php
  if($this->session->flashdata('data')) {
    $data = $this->session->flashdata('data');
    echo '<script type="text/javascript">setLogin("'. $data['username'] .'","'. $data['password'] .'");</script>';
  }
?>