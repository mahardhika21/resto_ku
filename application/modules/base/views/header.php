<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                 <img src="<?php echo base_url() .'assets/img/logos/name-resto.png'; ?>" />
         
                </a>
            </div>
            <div class="right-div">
                <a href="#" ><img src="<?php echo base_url().'assets/img/logos/resto-logo.png'; ?>" class="img-responsive" style="max-height: 120px;"></a>
            </div>
        </div>
    </div>
    <?php  $segment = $this->uri->segment(2);
       // echo $data; ?>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav ">
                            <li><a href="<?php echo site_url('home'); ?>" class="<?php if(empty($segment)){ echo 'menu-top-active';} ?> " ><i class="fa fa-home fa-lg"></i> DASHBOARD</a></li>
                           <!--  <li><a href="<?php echo base_url() .'home/about'; ?>" class="<?php if($segment === "about"){ echo 'menu-top-active';} ?>"><i class="fa fa-info fa-lg" data-toggle="modal" data-target="#about"></i>TENTANG</a></li> -->
                            
                           
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>