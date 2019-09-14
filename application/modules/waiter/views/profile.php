<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $title; ?></title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url() .'assets/css/bootstrap.css' ?>" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="<?php echo base_url() .'assets/css/font-awesome.css'; ?>" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url() .'assets/css/style.css'; ?>" rel="stylesheet" />
    <link href="<?php echo base_url() .'assets/css/custom.css'; ?>" rel="stylesheet" />

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
   <!--  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script> -->
   <script src="<?php echo base_url() .'assets/js/datum.js'; ?>"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.min.css">
</head>
<style>

</style>
<body>
  <?php echo $part['header']; 
     // echo '<pre>'.print_r($profile, true) .'</pre>';
  ?>
    
     <!-- MENU SECTION END-->
    <div class="content-wrapper" >
         <div class="container" >
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">PROFILE</h4>
                            </div>
        </div> 
             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12" style=" ">
                <div class="row">

                   <div class="col-md-3 col-lg-6 col-sm-12 col-xs-12 card" >
        <h3>FORM PROFILE WAITER</h3>
        
        <form method="POST" class="form-horizontal" role="form" action="<?php echo site_url('waiter/backend/update_profile'); ?>">
          <div class="form-group">
            <label class="col-lg-3 control-label">USSERNAME:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $profile[0]['username']; ?>" readonly="" name="datum[username]">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="datum[name]" value="<?php echo $profile[0]['name']; ?>">
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-3 control-label">Phone :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="datum[phone]" value="<?php echo $profile[0]['phone']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Simpan">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>

              </div>

              </div>

              </div>

               
                 </div>
    </div>
    </div>
    
     <!-- CONTENT-WRAPPER SECTION END-->
   <?php echo $part['footer']; ?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url() .'assets/js/bootstrap.js'; ?>"></script>
    
      <!-- CUSTOM SCRIPTS  -->
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha1/0.6.0/sha1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.min.js"></script>
    <script type="text/javascript">
     // let fakout = $('#fak').val();

     // pilih(fakout);
      //pilih('FST');
     $( "#fak" ).change(function() {
          let fak = $(this).val();
          pilih(fak);
      });

       $('.birth-date').datepicker({
        language: 'en',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        timeFormat: 'hh:ii aa',
        minDate: new Date(new Date().setFullYear(new Date().getFullYear() - 150)),
        maxDate: new Date(new Date().setFullYear(new Date().getFullYear() - 12))
      });
    </script>
</body>
</html>
