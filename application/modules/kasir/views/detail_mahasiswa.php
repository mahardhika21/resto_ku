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
      // echo '<pre>'.print_r($profile, true) .'</pre>';
    // echo '<pre>'.print_r($sertifikat, true) .'</pre>';
  ?>
    
     <!-- MENU SECTION END-->
    <div class="content-wrapper" >
         <div class="container" >
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">SERTIFIKAT MAHASISWA</h4>
                            </div>
        </div> 
        <?php // echo '<pre>'.print_r($data, true) .'</pre>'; ?>
             <div class="row">
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="row">
                   
                <div class="col-sm-12" >
                    <div class="panel panel-default card">
                        <div class="panel-heading">
                            Tabel Daftar Sertifikat
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Judul</th>
                                            <th>Info</th>
                                            <th>Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      if(count($data['terms_skpi'])>0){
                                      $no =1; 
                                      foreach($data['terms_skpi'] as $term){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $term['title']; ?></td>
                                            <td><?php echo $term['info']; ?></td>
                                            <td class="center"><a class="btn btn-success btn-sm img" data-img="<?php echo $term['path']; ?>" data-title="<?php echo $term['title']; ?>">view gambar Ertifikat <i class="fa fa-file-image-o fa-sm"></i></a>
                                              
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
                           Detail Mahasiswa
                        </div>
                        <div class="panel-body ">
                          <div class="card" style="padding: 10px;">
                            <div class="row">
                              <div class="col-sm-12">
                                <table class="table table-striped table-responsive">
                                    <tbody>
                                    <tr>
                                       <td>Nim</td>
                                       <td>:</td>
                                       <td><?php echo $data['mahasiswa'][0]['nim']; ?></td>
                                    </tr>
                                      <tr>
                                       <td>Nama</td>
                                       <td>:</td>
                                       <td><?php echo $data['mahasiswa'][0]['nama']; ?></td>
                                    </tr>
                                    <tr>
                                       <td>Tanggal Lahir</td>
                                       <td>:</td>
                                       <td><?php echo $data['mahasiswa'][0]['tanggal_lahir']; ?></td>
                                    </tr>
                                    <tr>
                                       <td>Jenis Kelamin</td>
                                       <td>:</td>
                                       <td><?php echo $data['mahasiswa'][0]['jenkel']; ?></td>
                                    </tr>
                                    <tr>
                                       <td>Fakultas</td>
                                       <td>:</td>
                                       <td><?php echo $data['mahasiswa'][0]['fakultas']; ?></td>
                                    </tr>
                                    <tr>
                                       <td>Prodi</td>
                                       <td>:</td>
                                       <td><?php echo $data['mahasiswa'][0]['prodi']; ?></td>
                                    </tr>
                                    <tr>
                                       <td>Tahun Masuk</td>
                                       <td>:</td>
                                       <td><?php echo $data['mahasiswa'][0]['tahun_masuk']; ?></td>
                                    </tr>
                                    <tr>
                                       <td>Alamat</td>
                                       <td>:</td>
                                       <td><?php echo $data['mahasiswa'][0]['alamat']; ?></td>
                                    </tr>
                                     <tr>
                                       <td>Judul Skripsi</td>
                                       <td>:</td>
                                       <td><?php if(count($data['skripsi'])>0) { echo $data['skripsi'][0]['judul'];} ?></td>
                                    </tr>
                                     <tr>
                                       <td>Link Drive</td>
                                       <td>:</td>
                                       <td><?php if(count($data['skripsi'])>0) { echo '<a class="btn btn-info btn-sm" href="$data["skripsi"][0]["url_file"]">Link Drive</a>';} ?></td>
                                    </tr>
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
        let id = $(this).data('id');
        let status = confirm("Apkah Anda akan menghapus data "+ $(this).data('title'));
        if(status == true){
         //alert(423);
            window.location.href=url+'mahasiswa/backend/delete_sertifikat/'+id;
        }

      });
    </script>
</body>
</html>
