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
    <style>
        span.card-title {
            font-size: 0.855rem;
            margin-left: 0.555rem;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form method="post" action="<?php echo base_url(); ?>backend/bill/insert">
                                <input type="hidden" id="rate_id" name="rate_id">
                                <input type="hidden" id="vil_id" name="vil_id">
                                <h3 id="text-price"></h3>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="ni ni-sound-wave"></i>
                                            </span>
                                        </div>
                                        <input id="meter" 
                                            name="bill_metertotal" 
                                            class="form-control"
                                            placeholder="Meter" 
                                            type="text"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            onchange="onChangeMeter(this.value);"
                                        >
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

    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <h1 class="display-3">Bills</h1>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Calculate Bills</h3>
                    </div>
                    <div class="card-body">
                        <div class="row icon-examples">
                            <?php
                    if(is_array($villages) || is_object($villages)) {
                        foreach($villages as $vil) {
                ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h3 class="card-title">Home Number:
                                            <?php echo $vil->vil_homenumber; ?>
                                        </h3>
                                        <div>
                                            <i class="ni ni-circle-08"></i>
                                            <span class="card-title">
                                                <?php echo $vil->vil_name. ' ' .$vil->vil_lastname; ?>
                                            </span>
                                        </div>
                                        <div style="margin-top:15px;">
                                            <i class="ni ni-mobile-button"></i>
                                            <span class="card-title">
                                                <?php echo $vil->vil_telephone; ?>
                                            </span>
                                        </div>
                                        <div style="margin-top:15px;overflow:hidden;">
                                            <div style="float:left;">
                                                <i class="ni ni-sound-wave"></i>
                                                <span class="card-title">Last Meter</span>
                                            </div>
                                            <div style="float:right;">
                                                <span class="card-title" style="font-weight:800;">
                                                    <?php echo ($vil->bill_metertotal == 0 ? 0 : $vil->bill_metertotal) ?> U</span>
                                            </div>
                                        </div>
                                        <div style="margin-top:15px;clear:both;overflow:hidden">
                                            <div style="float:left;">
                                                <i class="ni ni-money-coins"></i>
                                                <span class="card-title">
                                                    <?php echo $vil->paytype_name; ?>
                                                </span>
                                            </div>
                                            <div style="float:right;">
                                                <span class="card-title" style="font-weight:800;">
                                                    <?php echo $vil->rate_price; ?> ฿
                                                    <?php echo ($vil->paytype_name == 'unit' ? 'per unit' : ''); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="text-center" style="clear:both;padding-top:30px">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-form" onClick="setBillModal('<?php echo $vil->rate_price. '\',\''. $vil->paytype_name .'\',\''. $vil->rate_id.'\',\''.$vil->vil_id;?>')">Check Bill</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script type="text/javascript">

    pricemeter = 0;

    setBillModal = (price, type, rate_id, vil_id) => {
        pricemeter = price

        $('#rate_id').val(rate_id)
        $('#vil_id').val(vil_id)

        $('#calculate_price').css('display', 'none')

        if(type === "unit") {
            $('#warning').css('display', 'none')
            $('#meter').prop('disabled', false)
            $('#text-price').text(`${price} ฿ per unit`)
        } else {
            $('#text-price').text(`${price} ฿`)
            $('#meter').attr('disabled', 'disabled')
            $('#warning').css('display', 'initial')
        }
    }

    onChangeMeter = (value) => {
        total = pricemeter * value
        $('#calculate_price').css('display', 'initial');
        $('#text_total').text(`Total : ${total} ฿`)
    }
</script>
</html>