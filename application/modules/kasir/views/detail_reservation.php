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
              

                 <div class="col-md-3 col-sm-4 col-xs-12">
                 <div class="panel panel-primary " id="login_page">
                        <div class="panel-heading">
                            WAITER (PELAYAN)/KASIR PANEL
                        </div>
                        <div class="panel-body chat-widget-main">
                         <div class="jumbotron">
  <h4>Halaman EDIT RESERVATION PELAYAN/WAITER</h4> 
</div>

                      <div class="card" hidden="" id="reset">
                        <?php if(!empty($message)){ ?>
                <div class="alert alert-<?php echo $message['code']; ?>">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Info! </strong> <?php echo $message['msg']; ?> 
                </div>
                          <?php } ?>
                         
                      </div>

                        </div>
                    </div>
                   </div>
                   <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="row">

                   <div class="col-md-3 col-lg-6 col-sm-12 col-xs-12 card" >
        <h3>FORM EDIT PEMESANAN MAKANAN</h3>
        
        <form method="POST" class="form-horizontal" role="form" action="<?php echo site_url('kasir/backend/update_reserv'); ?>">
          <div class="form-group">
            <label class="col-lg-3 control-label">MENU RESTO:</label>
          
          </div>
          <div id="list_menu_dt">
            <?php
              $no =0;
             foreach ($detail_res as $dt){ 
                //echo '<pre>'.print_r($dt, true).'</pre>';
              ?>
              
              <div class="form-group" id="fm<?php echo $no; ?>">

                <label class="col-lg-3 control-label">Menu :</label> <div class="col-lg-5"><input type="text" class="form-control menu-list-data" readonly name="[list_menu]" data-id_menu="<?php echo $dt->id_menu; ?>" data-price="<?php echo $dt->det_price; ?>"  data-type_menu="<?php echo $dt->desc_reserv; ?>" value="<?php echo $dt->name_menu; ?>" id="nomor_menu"></div></div>
            <?php $no++; } ?>
          </div>
           <div class="form-group">
            <label class="col-lg-3 control-label">Nomor Pemesanan :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="datum[chari]" id="chair_set" value="<?php echo $reser[0]->chair_reserv; ?>">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-3 control-label">Nomor Kursi Pemesan :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="datum[chari]" id="chair_set" value="<?php echo $reser[0]->reservation_number; ?>">
            </div>
          </div>
            <div class="form-group">
            <label class="col-lg-3 control-label">Total bayar :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="datum[amount_resev]" id="amount_resev" value="<?php echo $reser[0]->amount_resev; ?>" readonly>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha1/0.6.0/sha1.min.js"></script>
  

 
</body>
</html>
