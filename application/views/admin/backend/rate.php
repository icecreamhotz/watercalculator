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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <?php
                    if($this->session->flashdata('data')) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-inner--text"><strong>Success! </strong><?php echo $this->session->flashdata('data')['message'] ?> !</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    }
                ?>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $rates[0]->paytype_name; ?></h5>
                                        <span class="h2 font-weight-bold mb-0"><?php echo $rates[0]->rate_price; ?> ฿ per unit</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fab fa-bitcoin"></i>
                                        </div>
                                    </div>
                                </div>
                                <form method="post" action="<?php echo base_url(); ?>backend/rate/edit">
                                    <input name="rate_idone" type="hidden" value="<?php echo $rates[0]->rate_id; ?>">
                                    <input name="rate_idtwo" type="hidden" value="<?php echo $rates[1]->rate_id; ?>">
                                    <input name="paytype_idone" type="hidden" value="<?php echo $rates[0]->paytype_id; ?>">
                                    <input name="paytype_idtwo" type="hidden" value="<?php echo $rates[1]->paytype_id; ?>">
                                    <h3 id="text-price"></h3>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="ni ni-money-coins"></i>
                                                </span>
                                            </div>
                                            <input id="meter1" name="rate_one" class="form-control" placeholder="Rate" type="text" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)">
                                        </div>
                                    </div>
                                    <div id="warning" style="display:none;">
                                        <h5 style="color:#f44336;">*Tip</h5>
                                        <h6 style="color:#ef5350;">If village using package payment method you can press submit only.</h6>
                                    </div>
                                    <div id="calculate_price" style="display:none;">
                                        <h5 style="color:#00e676;" id="text_total"></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $rates[1]->paytype_name; ?></h5>
                                            <span class="h2 font-weight-bold mb-0"><?php echo $rates[1]->rate_price; ?> ฿</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-money-check-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 id="text-price"></h3>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="ni ni-money-coins"></i>
                                                </span>
                                            </div>
                                            <input id="meter2" name="rate_two" class="form-control" placeholder="Rate" type="text" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)">
                                        </div>
                                    </div>
                                    <div id="warning" style="display:none;">
                                        <h5 style="color:#f44336;">*Tip</h5>
                                        <h6 style="color:#ef5350;">If village using package payment method you can press submit only.</h6>
                                    </div>
                                    <div id="calculate_price" style="display:none;">
                                        <h5 style="color:#00e676;" id="text_total"></h5>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>