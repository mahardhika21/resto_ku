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
</head>
<style>

</style>
<body>
  <?php echo $part['header']; 
      //echo '<pre>'.print_r($profile, true) .'</pre>';
  ?>
    
     <!-- MENU SECTION END-->
    <div class="content-wrapper" >
         <div class="container" >
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">DASHBOARD</h4>
                            </div>
        </div> 
             <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12 card">
        <h3>FORM UPDATE PASSWORD</h3>
        <?php if(!empty($message)){ ?>
        <div class="alert alert-info">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Info! </strong> <?php echo $message; ?> 
        </div>
<?php } ?>
        <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('home/backend/update_password'); ?>">
          <div class="form-group">
            <label class="col-lg-3 control-label">PASSWORD LAMA:</label>
            <div class="col-lg-8">
              <input class="form-control" type="Password" value=""  name="datum[old_password]" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">PASSWORD BARU :</label>
            <div class="col-lg-8">
              <input class="form-control" type="Password" value="" name="datum[new_password]" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">PASSWORD BARU ULANG :</label>
            <div class="col-lg-8">
              <input class="form-control" type="Password" value="" name="datum[re_new_assword]" required="">
            </div>
          </div>
         

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Update Password">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>

              </div>
                <div class="col-sm-12">

                </div>
              </div>

              </div>

                 <div class="col-md-4 col-sm-4 col-xs-12">
                 <div class="panel panel-primary " id="login_page">
                        <div class="panel-heading">
                             PANEL Admin
                        </div>
                        <div class="panel-body ">
                          <div class="card" style="padding: 10px;">
                            <div class="jumbotron">
  <h4>Halaman Update/memperbarui Password</h4> 
</div>
                         </div>

                     
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
    <script type="text/javascript"></script>
</body>
</html>
