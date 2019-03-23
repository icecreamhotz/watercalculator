<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" href="<?php echo base_url(); ?>assets/employee/css/nice-select.css" rel="stylesheet">
</head>

<body>
  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form method="post" action="<?php echo base_url(); ?>backend/village/insert">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="ni ni-circle-08"></i>
                      </span>
                    </div>
                    <input name="vil_name" class="form-control" placeholder="Village Name" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="ni ni-caps-small"></i>
                      </span>
                    </div>
                    <input name="vil_lastname" class="form-control" placeholder="Village Lastname" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="ni ni-tablet-button"></i>
                      </span>
                    </div>
                    <input name="vil_telephone" class="form-control" placeholder="Village Telephone" 
                      type="text"
                      onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                      maxlength="10"
                    >
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="ni ni-building"></i>
                      </span>
                    </div>
                    <input name="vil_homenumber" class="form-control" placeholder="Village Homenumber" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <select name="paytype_id" id="ud_paytype">
                          <?php
                            foreach($paytypes as $value) {
                              echo '<option value="'.$value->paytype_id.'">'.$value->paytype_name.'</option>';
                            }
                          ?>
                    </select>
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

  <div class="modal fade" id="edit-form" tabindex="-1" role="dialog" aria-labelledby="edit-form" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <form method="post" action="<?php echo base_url(); ?>backend/village/update">
                  <input id="ud_id" name="vil_id" type="hidden">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ni ni-circle-08"></i>
                        </span>
                      </div>
                      <input id="ud_name" name="vil_name" class="form-control" placeholder="Village Name" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ni ni-caps-small"></i>
                        </span>
                      </div>
                      <input id="ud_lastname" name="vil_lastname" class="form-control" placeholder="Village Lastname" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ni ni-tablet-button"></i>
                        </span>
                      </div>
                      <input id="ud_telephone" name="vil_telephone" class="form-control" placeholder="Village Telephone" 
                        type="text"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        maxlength="10"
                      >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ni ni-building"></i>
                        </span>
                      </div>
                      <input id="ud_homenumber" name="vil_homenumber" class="form-control" placeholder="Village Homenumber" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <select name="paytype_id" id="ud_paytype">
                          <?php
                            foreach($paytypes as $value) {
                              echo '<option value="'.$value->paytype_id.'">'.$value->paytype_name.'</option>';
                            }
                          ?>
                    </select>
                  </div>
                  <div class="text-center" style="clear:both;">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
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
        <h1 class="display-3">Villages</h1>
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
            <h3 class="mb-0">Informations</h3>
          </div>
          <div class="card-body">
            <div class="row icon-examples">
              <div class="col-lg-12">
                <button class="btn btn-icon btn-3 btn-success" type="button" data-toggle="modal" data-target="#modal-form">
                  <span class="btn-inner--icon">
                    <i class="ni ni-fat-add"></i>
                  </span>
                  <span class="btn-inner--text">Add village</span>
                </button>
              </div>
              <?php
                if($this->session->flashdata('data')) {
              ?>
              <div class="col-lg-12" style="padding-top:15px;">
                <div class="alert alert-<?php echo $this->session->flashdata('data')['class'] ?> alert-dismissible fade show" role="alert" style="margin-bottom:0px;">
                  <span class="alert-inner--text">
                    <strong><?php echo $this->session->flashdata('data')['title'] ?></strong>
                    <?php echo $this->session->flashdata('data')['message'] ?>
                  </span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
              <?php
                }
              ?>
              <div class="table-responsive" style="margin-top:25px;">
                <table class="table align-items-center">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Telephone</th>
                      <th scope="col">Homenumber</th>
                      <th scope="col">Paytype</th>
                      <th scope="col">Lasted Update</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        if(is_array($villages) || is_object($villages)) {
                          foreach($villages as $value) {
                      ?>
                    <tr>
                      <th scope="row">
                        <?php echo $value->vil_name. ' '. $value->vil_lastname; ?>
                      </th>
                      <td>
                        <?php echo $value->vil_telephone; ?>
                      </td>
                      <td>
                        <?php echo $value->vil_homenumber; ?>
                      </td>
                      <td>
                        <?php 
                          $paytype_name = "";
                          foreach($paytypes as $v) {
                            if($v->paytype_id == $value->paytype_id) {
                              $paytype_name = $v->paytype_name;
                            }
                          }
                          echo $paytype_name;
                        ?>
                      </td>
                      <td>
                        <?php 
                          echo time2str($value->updated_at);
                        ?>
                      </td>
                      <td>
                        <button class="btn btn-icon btn-2 btn-warning btn-sm" type="button"  data-toggle="modal" data-target="#edit-form" onclick="setValueUpdate('<?php echo $value->vil_id.'\',\''.$value->vil_name.'\',\''.$value->vil_lastname.'\',\''.$value->vil_telephone.'\',\''.$value->vil_homenumber.'\',\''.$value->paytype_id.'\',\''.$paytype_name;?>')">
                          <span class="btn-inner--icon">
                            <i class="ni ni-ruler-pencil"></i>
                          </span>
                        </button>
                      </td>
                      <td>
                        <button class="btn btn-icon btn-2 btn-danger btn-sm" type="button" onClick="deleteVillage('<?php echo $value->vil_id ?>')">
                          <span class="btn-inner--icon">
                            <i class="ni ni-fat-delete"></i>
                          </span>
                        </button>
                      </td>
                    </tr>
                    <?php
                        } // foreach
                      } else {
                        echo '<tr>';
                        echo '<td colspan="17">';
                              echo '<div class="alert alert-danger" role="alert">';
                              echo    '<span class="alert-inner--text"><strong>Error!</strong> Now data is empty, Please add some village for see information.</span>';
                              echo '</div>';
                              echo '</td>';
                        echo '</tr>';
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
  <!-- Select -->
  <script src="<?php echo base_url(); ?>assets/employee/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/employee/js/jquery.nice-select.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    $('select').niceSelect();
  });

  setValueUpdate = (id, name, lastname, telephone, homenumber, paytype_id, paytype_name) => {
    $('#ud_id').val(id)
    $('#ud_name').val(name)
    $('#ud_lastname').val(lastname)
    $('#ud_telephone').val(telephone)
    $('#ud_homenumber').val(homenumber)

    $(`#ud_paytype`).val(paytype_id)
    $(`#ud_paytype option[value='${paytype_id}']`).attr('selected', 'selected');
    
    $(`.current`).text(paytype_name)
    $(".list [data-value ='"+paytype_id+"']").addClass('selected focus');
  }

  deleteVillage = (vil_id) => {
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this village information!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = `<?php echo base_url(); ?>admin/village/delete/${vil_id}`
      }
    });
  }

</script>
</html>