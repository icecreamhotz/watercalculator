<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<?php 
  $text = array(
    "Avengers END GAME,I Can't waittttttttttttttttt!!!",
    "Grab Food help my life :}",
    "Coco More.",
    "Hello, How are you ?",
    "if bored() playgame() else coding() :)",
    "Work hard, Pay hard",
    "Talk is cheap, show me the code"
  );
  $random_arr = array_rand($text);
  $text = $text[$random_arr];
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
          <h1 class="display-3">Dashboard</h1>
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
              <h3 class="mb-0">Wooooooooooooooooooooooooooooooooooooooooooooops!!</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <div style="margin:100px auto;">
                    <h1><?php echo $text; ?></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>