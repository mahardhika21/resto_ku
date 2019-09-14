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
                            WAITER (PELAYAN) PANEL
                        </div>
                        <div class="panel-body chat-widget-main">
                         <div class="jumbotron">
  <h4>Halaman dasboard PELAYAN/WAITER</h4> 
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
        <h3>FORM PEMESANAN MAKANAN</h3>
        
        <form method="POST" class="form-horizontal" role="form" action="<?php echo site_url('waiter/backend/update_profile'); ?>">
          <div class="form-group">
            <label class="col-lg-3 control-label">MENU RESTO:</label>
            <div class="col-lg-8">
              <select class="form-control" id="list_menu">
                <?php foreach($menu as $dt)
                { ?>
                  <option value="<?php echo $dt->id_menu; ?>" data-type="<?php echo $dt->type_menu; ?>" data-price="<?php echo $dt->price_menu; ?>" data-menu="<?php echo $dt->name_menu; ?>"><?php echo $dt->name_menu; ?></option>
               <?php } ?>
                
              </select>
              <a class="btn btn-success add-menu" style="margin-top: 3px;">Tambah Menu</a>
            </div>
          </div>
          <div id="list_menu_dt">

          </div>
          
          
          <div class="form-group">
            <label class="col-lg-3 control-label">Nomor Kursi Pemesan :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="datum[chari]" id="chair_set" value="">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <a class="btn btn-primary menu-test" style="margin-top: 3px;">submit</a>
             
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha1/0.6.0/sha1.min.js"></script>
    <script type="text/javascript">
      $('.add-menu').on('click', function()
      {
        //alert(3);
          let  id = $('#list_menu').val();
          let  name_menu =$('#list_menu').find(':selected').attr('data-menu')
          let  no_menu   = $('#nomor_menu').val();
          let  price     = $('#list_menu').find(':selected').attr('data-price');
          let type_menu  = $('#list_menu').find(':selected').attr('data-type');

          let rand = Math.ceil(Math.random() * 10000);
          let d    = new Date();
          let ms   = d.getMilliseconds()+''+rand;
          let name_fm = "fm"+sha1(ms);

          
          let fm = '<div class="form-group" id="'+name_fm+'"><label class="col-lg-3 control-label">Menu :</label> <div class="col-lg-5"><input type="text" class="form-control menu-list-data" readonly name="[list_menu]['+name_fm+']" data-id_menu="'+id+'" data-price="'+price+'"  data-type_menu="'+type_menu+'" value="'+name_menu+'" id="nomor_menu"><a class="btn btn-danger del-menu" data-id_fm="'+name_fm+'" style="margin-top: 3px;" >Delete Menu</a></div></div>';

            $('#list_menu_dt').append(fm);

        // alert(id + ' '+ name_menu +' '+no_menu);
      });

      $('#list_menu_dt').on('click','.del-menu', function(e){
        //alert(666);
          let id_fm = $(this).data('id_fm');
           //alert(id_fm);
          $('#'+id_fm).remove();
      });


      $('.menu-test').on('click', function(e){
         let menu_list = $('.menu-list-data');

          console.log(menu_list);
          //alert('33');

          let reservation = new Object();
          reservation.menu = [];
          reservation.id_menu = [];
          reservation.price = [];
          reservation.type_menu = [];
          reservation.total_menu = menu_list.length;
          reservation.chair_reserv = $('#chair_set').val();

          for($i=0; $i<menu_list.length; $i++)
          {
            reservation.menu.push(menu_list[$i].defaultValue);
            reservation.id_menu.push(menu_list[$i].dataset.id_menu);
             reservation.price.push(menu_list[$i].dataset.price);
              reservation.type_menu.push(menu_list[$i].dataset.type_menu);
          }

          console.log(reservation);
          ajax_insert_reserv(reservation);
      });


      function ajax_insert_reserv(data)
      {
          let url = '<?php echo base_url(); ?>';

          $.ajax({
              url : url +'/waiter/backend/insert_reservation',
              type : 'POST',
              dataType : 'JSON',
              data     : {data:data},
              success  : function(resp)
              {
                     
                     if(resp.success == 'true')
                     {
                      alert(resp.message);
                       window.location.href =url+'waiter/reservation';
                     }
                     else
                     {
                      alert(resp.message);
                     }
                    
              }, error : function(resp)
              {
                  alert('error, kesalahan jaringan')
              }
          });
      }
    </script>

 
</body>
</html>
