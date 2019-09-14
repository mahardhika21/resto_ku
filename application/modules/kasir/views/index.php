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
              

                 <div class="col-md-3 col-sm-3 col-xs-12">
                 <div class="panel panel-primary " id="login_page">
                        <div class="panel-heading">
                            KASIR PANEL
                        </div>
                        <div class="panel-body chat-widget-main">
                         <div class="jumbotron">
  <h4>Halaman dasboard Kasir</h4> 
</div>

                     

                        </div>
                    </div>
                   </div>
                   <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="row">

                   <div class="col-md-3 col-lg-6 col-sm-12 col-xs-12 card" >
        <h3>FORM PEMBAYARAN MAKANAN</h3>
        
        <form method="POST" class="form-horizontal" role="form" action="<?php echo site_url('waiter/backend/update_profile'); ?>">
          <div class="form-group">
            <label class="col-lg-3 control-label">NOMOR PEMESANAN:</label>
            <div class="col-lg-8">
          
               <input class="form-control" type="text" name="datum[reservation_number]" id="reservation_number" value="">
              <a class="btn btn-success cek-reserv" style="margin-top: 3px;">Cek Pemesanan</a>
            </div>
          </div>
          <div id="list_resev_dt" hidden="">
              <div class="form-group">
            <label class="col-lg-3 control-label">Nomor Kursi Pemesan :</label>
            <div class="col-lg-8">
              <input type="hidden" name="id_reservation" id="id_reservation" >
              <input class="form-control" type="text" name="datum[chari]" id="chair_set" value="">
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-3 control-label">Harga Total Menu :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="datum[chari]" id="amount" value="">
            </div>
          </div>
           <div class="form-group">
            <label class="col-lg-3 control-label">Detail Pesanan  :</label>
            <div class="col-lg-8">
             <ol id="detai-reservation"></ol>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Jumlah Bayar :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="datum[chari]" id="amount_pay" value="">
            </div>
          </div>
           <div class="form-group" hidden="">
            <label class="col-lg-3 control-label">kembalian :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="datum[chari]" id="amount_change" value="">
            </div>
          </div>
          </div>
          
          

          
          <div class="form-group" id="submit-btn" hidden="">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <a class="btn btn-primary pay-submit" style="margin-top: 3px;">submit</a>
             
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
    <script type="text/javascript"></script>
    <script type="text/javascript">
      $('.cek-reserv').on('click', function(){
          let num = $('#reservation_number').val();
          get_reseervation(num);

      });

      function get_reseervation(data)
      {
          let url = '<?php echo base_url(); ?>';

          $.ajax({
              url : url +'kasir/backend/ajax_detail_reservation',
              type : 'POST',
              dataType : 'JSON',
              data     : {data:data},
              success  : function(resp)
              {

                    console.log(resp);
                     
                     if(resp.success == 'true')
                     {
                      if(resp.data[0].status_resev == 'booked')
                      {
                         $('#list_resev_dt').show();
                         $('#chair_set').val(resp.data[0].chair_reserv);
                         $('#amount').val(resp.data[0].amount_resev);
                         $('#detai-reservation').html(resp.data[0].list_reserv);
                         $('#id_reservation').val(resp.data[0].id_reservation);
                          $('#submit-btn').show();
                      }
                      else if(resp.data[0].status_resev == 'complete')
                      {
                        alert('Pesanan sudah dibayarkan');
                      }else{
                        alert('pesanan sudah dibatalkan/tidak akttif');
                      }  
                        
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


      function pay_reservation(data,id)
      {
          let url = '<?php echo base_url(); ?>';

          $.ajax({
              url : url +'kasir/backend/ajax_pay_reservation',
              type : 'POST',
              dataType : 'JSON',
              data     : {data:data,id:id},
              success  : function(resp)
              {

                    console.log(resp);
                     
                     if(resp.success == 'true')
                     {
                      
                      alert(resp.message);
                      window.location.href = url+'kasir/reservation';
                        
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



      $('.pay-submit').on('click', function(){
        let amount = $('#amount').val();
        let id     = $('#id_reservation').val();
        let pay    = $('#amount_pay').val();
        if(amount>pay)
        {
              Swal.fire({
                  type  : 'error',
                  title : 'pembayaran gagal',
                  text  : 'nominal pembayarn kurang dari harag bayar',
                 // footer: '<a href>Why do I have this issue?</a>'
                });
        }
        else
        {
             swal({
            title: 'Are you sure?',
            text: "apakah anda yakin ingin Melajutkan proses pembayaran?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes,  it!',
            closeOnConfirm: false
          }).then(function(isConfirm) {
            if (typeof isConfirm['dismiss'] === 'undefined') {
              console.log("yes");

             let payment = new Object();
                 payment.status_resev  = 'complete';
                 payment.pay_amount    = pay;
                 payment.change_amount = parseInt(pay) - parseInt(amount);

                 pay_reservation(payment, id);
               
             }else{
                console.log('no')
             }
     })  
        }

      })
    </script>
 
</body>
</html>
