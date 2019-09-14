<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SKPI</title>
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
                <h4 class="header-line">DAFTAR USER</h4>
                            </div>
        </div> 
             <div class="row">
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="row">
                   
                <div class="col-sm-12" >
                    <div class="panel panel-default card">
                        <div class="panel-heading">
                            Tabel Daftar User/Admin
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>email</th>
                                            <th>Level</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $no =1; 
                                      foreach($data as $val){ 
                                        if($uname != $val['username']){
                                      ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $val['username']; ?></td>
                                            <td><?php echo $val['email']; ?></td>
                                            <td><?php echo $val['level']; ?></td>
                                            <td class="center"><a class="btn btn-danger btn-sm delete"  data-title="<?php echo $val['username']; ?>" data-id_user="<?php echo $val['username']; ?>" data-id_user="<?php echo $val['level']; ?>">delete user <i class="fa fa-user fa-sm"></i></a>
                                            
                                            </td>
                                          
                                        </tr>
                                      <?php $no++; } } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

              </div>

                 <div class="col-md-5 col-sm-5 col-xs-12">
                 <div class="panel panel-primary " id="login_page">
                        <div class="panel-heading">
                           PANEL REGISTER USER
                        </div>
                        <div class="panel-body ">
                          <div class="card" style="padding: 10px;">
                            <div class="row">
                              <div class="col-sm-12">
                                <form  role="form" method="POST"  action="<?php echo site_url('admin/backend/add_user'); ?>">
  <?php if(!empty($message)){ ?>
        <div class="alert alert-<?php echo $message['code']; ?>">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Info! </strong> <?php echo $message['msg']; ?> 
        </div>
<?php } ?>
                                <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Username</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <input class="form-control" type="text" value=""  name="datum[username]" required="">
                                  </div>
                                </div>
                                <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Email</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <input class="form-control" type="text" value=""  name="datum[email]" required="">
                                  </div>
                                </div>
                                  <div class="form-group">
                                 
                                  <div class="col-sm-12">
                                  <label class="control-label">Level</label>
                                  </div>
                                  <div class="col-lg-12">
                                    <select class="form-control" name="datum[level]">
                                      <option value="admin">admin</option>
                                      <option value="user">user</option>
                                    </select>
                                  </div>
                                </div>
                               
         

          <div class="form-group" style="margin-top: 12px;">
          
            <div class="col-md-8">
              <button type="submit" class="btn btn-info" style="margin-top: 12px; margin-bottom: 12px;">Upload</button>
            </div>
          </div>
        </form>
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


    <div id="img_mdl" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body img_loc" style="margin: 0px;">
       <img  class="img-rounded img_loc" style="height: 100%; width: 100%;">
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
    <script type="text/javascript">
        $(document).ready(function() {
    $('#dataTables-example').DataTable();
} );
    </script>
    <script type="text/javascript">
      $('.img').on('click', function(){
        let url = '<?php echo base_url(); ?>';
        let img = $(this).data('img');
        $('.modal-title').html('SERTIFIKAT '+ $(this).data('title'));
        $('.img_loc').attr('src',url+'assets/img/sertifikat/'+img);
          $('#img_mdl').modal('show');
      });

      $('.delete').on('click', function(){
        let url = '<?php echo base_url(); ?>';
        let id = $(this).data('id_user');
        let level = $(this).data('level');
        let status = confirm("Apkah Anda akan menghapus user "+ $(this).data('username'));
        if(status == true){
         //alert(423);
            window.location.href=url+'admin/backend/delete_user/'+id+'/'+level;
        }

      });
    </script>
</body>
</html>
