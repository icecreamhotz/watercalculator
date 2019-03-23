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
    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="bill_homenumber"></h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Village Name</h3>
                    <p id="vil_name"></p>
                    <h3>Village Telephone</h3>
                    <p id="vil_telephone"></p>
                    <h3>Last Meter</h3>
                    <p id="last_meter"></p>
                    <h3>Now Meter</h3>
                    <p id="now_meter"></p>
                    <h3>Meter Total</h3>
                    <p id="meter_total"></p>
                    <h3>Payment Method</h3>
                    <p id="payment_method"></p>
                    <h3>Rate Price</h3>
                    <p id="rate_price"></p>
                    <h3>Responsible Employee</h3>
                    <p id="responsible_employee"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <h1 class="display-3">Report</h1>
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
                        <h3 class="mb-0">Bills Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row icon-examples">
                            <div class="table-responsive"   >
                                <table class="table align-items-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Last meter</th>
                                            <th scope="col">Now meter</th>
                                            <th scope="col">Meter Total</th>
                                            <th scope="col">Paytype</th>
                                            <th scope="col">Rate Price</th>
                                            <th scope="col">Employee Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">More</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(is_array($bills) || is_object($bills)) {
                                                foreach($bills as $value) {
                                                    $name = $value->vil_name. ' '. $value->vil_lastname;
                                                    $emp = $value->emp_name. ' '. $value->emp_lastname;
                                                    $totalmeter = ($value->metertotal + $value->bill_metertotal);
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $name ?>
                                            </th>
                                            <td>
                                                <?php echo $value->metertotal; ?>
                                            </td>
                                            <td>
                                                <?php echo $value->bill_metertotal; ?>
                                            </td>
                                            <td>
                                                <?php echo $totalmeter; ?>
                                            </td>
                                            <td>
                                                <?php echo $value->paytype_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $value->rate_price; ?>
                                            </td>
                                            <td>
                                                <?php echo $emp; ?>
                                            </td>
                                            <td>
                                                <?php echo date( "Y-m-d", strtotime($value->created_at)); ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-default" onClick="setInformationBills('<?php echo $name. '\',\''. $value->vil_telephone .'\',\''. $value->metertotal.'\',\''.$value->bill_metertotal.'\',\''.$totalmeter.'\',\''.$value->paytype_name.'\',\''.$value->rate_price.'\',\''.$emp.'\',\''.$value->vil_homenumber; ?>')">
                                                    <span class="btn-inner--icon">
                                                        <i class="ni ni-archive-2"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script type="text/javascript">
    setInformationBills = (vil_name, vil_tel, last_me, now_me, meter_total, payment_met, rate_price, res_emp, home_number) => {
        $('#bill_homenumber').text(`Home Number : ${home_number}`)
        $('#vil_name').text(vil_name)
        $('#vil_telephone').text(vil_tel)
        $('#last_meter').text(last_me)
        $('#now_meter').text(now_me)
        $('#meter_total').text(meter_total)
        $('#payment_method').text(payment_met)
        $('#rate_price').text(rate_price)
        $('#responsible_employee').text(res_emp)
    }
</script>
</html>