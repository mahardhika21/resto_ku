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
    <link href="<?php echo base_url() .'assets/js/dataTables/dataTables.bootstrap.css'; ?>" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
   <!--  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script> -->
</head>
<style>

</style>
<body>
  <?php echo $part['header']; 
     //  echo '<pre>'.print_r($data, true) .'</pre>';
    // echo '<pre>'.print_r($sertifikat, true) .'</pre>';
  ?>
    
     <!-- MENU SECTION END-->
    <div class="content-wrapper" >
         <div class="container" >
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">DAFTAR MENU</h4>
                            </div>
        </div> 
             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                   
                <div class="col-sm-12" >
                    <div class="panel panel-default card">
                        <div class="panel-heading">
                            Tabel Daftar   Reservation <a class="btn btn-info" href="<?php echo base_url().'base/reservation_report'; ?>">Download Laporan</a>
                        </div>
                        <div class="panel-body">
                            <?php if(!empty($message)){ ?>
                                        <div class="alert alert-<?php echo $message['code']; ?>">
                                           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                          <strong>Info! </strong> <?php echo $message['msg']; ?> 
                                        </div>
                                <?php } ?>
                            <div class="table-responsive">
                                 <table id="table-data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                  <tr>
                                     <th>reservation number</th>
                                    <th>chair reserv</th>
                                    <th>Harga</th>
                                     <th>Detail reservation</th>
                                    <th>Status</th>
                                    <th style="width:189px;">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
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
    </div>
    
     <!-- CONTENT-WRAPPER SECTION END-->
   <?php echo $part['footer']; ?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
   <div id="insert_data" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insert Data Menu</h4>
      </div>
      <div class="modal-body">
           <div class="panel panel-primary " id="login_page">
                        <div class="panel-heading">
                           PANEL 
                        </div>
                        <div class="panel-body ">
                          <div class="card" style="padding: 10px;">
                            <div class="row">
                              <div class="col-sm-12">
                                <form  role="form" method="POST"  action="<?php echo site_url('admin/backend/insert_data_menu'); ?>" enctype='multipart/form-data'>

                                <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Nama Menu</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <input type="hidden" name="status_img" id="status_img" value="false">
                                    <input class="form-control" type="text" value=""  name="datum[name_menu]" required="">
                                  </div>
                                </div>
                                <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Deskripsi Menu</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <textarea class="form-control" name="datum[desc_menu]"></textarea>
                                  </div>
                                </div>
                                 <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Type Menu</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <select class="form-control" name="datum[type_menu]">
                                      <option value="makanan">makanan</option>
                                      <option value="minuman">minuman</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Harga</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <input class="form-control" type="number" value=""  name="datum[price_menu]" required="">
                                  </div>
                                </div>

                                <div class="form-group">
                        <label class="form-label">Foto Menu</label>
                          Cari<input type="file" id="imgInp" name="imgInp">
                        <div class="messages"></div>
                      </div>
                      <div class="form-group">
                       
                                    <img id='img-upload' style="max-height: 260px;" />
                        
                      </div>
                               
         

                            <div class="form-group" style="margin-top: 12px;">
                            
                              <div class="col-md-8">
                                <button type="submit" class="btn btn-info" style="margin-top: 12px; margin-bottom: 12px;">Tambah Menu</button>
                              </div>
                            </div>
                           </form>
                              </div>
                            </div>
                         </div>

                     
                        </div>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<div id="edit_data" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data Menu</h4>
      </div>
      <div class="modal-body">
           <div class="panel panel-primary " id="login_page">
                        <div class="panel-heading">
                           PANEL 
                        </div>
                        <div class="panel-body ">
                          <div class="card" style="padding: 10px;">
                            <div class="row">
                              <div class="col-sm-12">
                                <form  role="form" method="POST"  action="<?php echo site_url('admin/backend/update_data_menu'); ?>" enctype='multipart/form-data'>

                                <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Nama Menu</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <input type="hidden" name="status_img2" id="status_img2" value="false">
                                    <input type="hidden" name="id_menu" id="id_menu">
                                    <input class="form-control" type="text" value=""  name="datum[name_menu]" id="name_menu" required="">
                                  </div>
                                </div>
                                <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Deskripsi Menu</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <textarea class="form-control" name="datum[desc_menu]" id="desc_menu"></textarea>
                                  </div>
                                </div>
                                 <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Type Menu</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <select class="form-control" name="datum[type_menu]" id="type_menu">
                                      <option value="makanan">makanan</option>
                                      <option value="minuman">minuman</option>
                                    </select>
                                  </div>
                                </div>
                                 <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Status</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <select class="form-control" name="datum[status_menu]" id="status_menu">
                                     
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Harga</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <input class="form-control" type="number" value="" id="price_menu" name="datum[price_menu]" id="price_menu" required="">
                                  </div>
                                </div>

                                <div class="form-group">
                        <label class="form-label">Foto Menu</label>
                          Cari<input type="file" id="imgInp2" name="imgInp2">
                        <div class="messages"></div>
                      </div>
                      <div class="form-group">
                                    <input type="hidden" name="img_old"  id="img_name">
                                    <img id='img-upload2' style="max-height: 260px;" />
                        
                      </div>
                               
         

                            <div class="form-group" style="margin-top: 12px;">
                            
                              <div class="col-md-8">
                                <button type="submit" class="btn btn-info" style="margin-top: 12px; margin-bottom: 12px;">Update Menu</button>
                              </div>
                            </div>
                           </form>
                              </div>
                            </div>
                         </div>

                     
                        </div>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url() .'assets/js/bootstrap.js'; ?>"></script>
      <!-- CUSTOM SCRIPTS  -->
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha1/0.6.0/sha1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
     <script src="<?php echo base_url() .'assets/js/dataTables/jquery.dataTables.js'; ?>"></script>
    <script src="<?php echo base_url() .'assets/js/dataTables/dataTables.bootstrap.js'; ?>"></script>

    
    </script>
    <script type="text/javascript">
       var save_method; //for save method string
       var table;
        $(document).ready(function() {
          table = $('#table-data').DataTable({ 
            
            "processing": true, 
            "serverSide": true, 
            "ajax": {
              "url": "<?php echo site_url('waiter/backend/ajax_list_reservation')?>",
              "type": "POST"
            },

            "columnDefs": [
            { 
              "targets": [ -1 ], //last column
              "orderable": false, //set not orderable
            },
            ],

          });
        });
    </script>
    <script type="text/javascript">
      function nonaktif(id)
         {

          swal({
            title: 'Are you sure?',
            text: "apakah anda yakin ingin membatalkan pessanan ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
          }).then(function(isConfirm) {
            if (typeof isConfirm['dismiss'] === 'undefined') {
              console.log("yes");

              // console.log(isConfirm.dismiss);
         // ajax delete data to database
               $.ajax({
                url : "<?php echo site_url('waiter/backend/ajax_canceled_reservation')?>/",
                type: "POST",
                dataType: "JSON",
                data    : {id:id},
                success: function(resp)
                {
                         
                    if(resp.success == 'true')
                    {
                      reload_table();
                         swal(
                          'Deleted!',
                          'data reservation berhasil di batalkan',
                          'success'
                          );
                    }else{
                      Swal.fire({
                        type  : 'error',
                        title : 'proses gagal',
                        text  : resp.message,
                       // footer: '<a href>Why do I have this issue?</a>'
                      });
                    }
                         
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                          alert('Error adding / update data');
                         //reload_table();
                        }
                    });

               
             }else{
                console.log('no')
             }
     })  
    }

     function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                    $('#status_img').val('true');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

     


        function edit_menu(id)
        {
            window.location.href='waiter/edit_reservation/'+id;
        }


        function detail(id)
        {
           window.location.href='waiter/detail_reservation/'+id;
        }

    </script>

</body>
</html>
