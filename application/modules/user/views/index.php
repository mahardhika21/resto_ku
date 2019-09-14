<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>sistem online</title>
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
  <?php echo $part['header']; ?>
    
     <!-- MENU SECTION END-->
    <div class="content-wrapper" >
         <div class="container" >
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">DASHBOARD</h4>
                            </div>
        </div> 
             <div class="row">
              

                 <div class="col-md-4 col-sm-4 col-xs-12">
                 <div class="panel panel-primary " id="login_page">
                        <div class="panel-heading">
                            Login User SISOL
                        </div>
                        <div class="panel-body chat-widget-main">
                         <div class="jumbotron">
  <h4>Halaman dasboard</h4> 
</div>

                      <div class="card" hidden="" id="reset">
                            <form class="form-signin" style="padding: 15px;">
                              <h4 class="form-signin-heading text-center"><i class="fa fa-lock fa-lg"> Lupa Paassword</i></h4>
                              <div class="form-group" >
                              <label for="inputEmail" class="sr-only">Emai</label>
            
                              <input type="email"  class="form-control form-control-sm" placeholder="Email Yang terdaftar " required="" autofocus="" required="" id="email_reset">
                              </div>
                                 <div class="checkbox">
                                <label>
                                  <a id="login_pass"> Login?</a>
                                </label>
                              </div>
                                <a id="reset_password" class="btn btn-lg btn-primary btn-block btn-sm">RESET PASSWORD</a>
                            </form>
                      </div>

                        </div>
                    </div>
                   </div>
                   <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                     <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="https://mypresta.eu/content/uploads/2014/04/c68b66e804d626330b8332da809549e1.jpg" alt="" style="height: 280px" />
                            </div>
                            <div class="item">
                                <img src="https://www.newsprout.com.au/wp-content/uploads/2015/07/NewSprout-TrueCloud-VPS-Hosting-slider-background.jpg" alt="" style="height: 280px" />
                            </div>
                            <div class="item">
                                <img src="http://www.hostimus.xyz/wp-content/uploads/2019/02/slider-41.jpg" alt="" style="height: 280px" />
                            </div>
                        </div>
                        <!--INDICATORS-->
                         <ol class="carousel-indicators">
                            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example" data-slide-to="1"></li>
                            <li data-target="#carousel-example" data-slide-to="2"></li>
                        </ol>
                        <!--PREVIUS-NEXT BUTTONS-->
                         <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                    </div>
              </div>
                <div class="col-sm-12">

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
