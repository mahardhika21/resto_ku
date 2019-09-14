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
    <?php  $segment = $this->uri->segment(2); ?>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo site_url('kasir'); ?>" class="<?php if(empty($segment)){ echo 'menu-top-active';} ?> " >DASHBOARD  <i class="fa fa-home fa-lg"></i></a></li>
                            <li>
                                <a href="<?php echo site_url('kasir/profile'); ?>" class="<?php if($segment === "profile"){ echo 'menu-top-active';} ?>">PROFILE <i class="fa fa-user fa-lg"></i></a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">MENU KASIR <i class="fa fa-sort-desc fa-lg"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a href="<?php echo site_url('kasir/menu'); ?>" role="menuitem" tabindex="-1" href="l">DATA MENU</a></li>
                                     <li role="presentation"><a href="<?php echo site_url('kasir/reservation'); ?>" role="menuitem" tabindex="-1" href="#">DATA PEMESANAN</a></li>
                                    
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('kasir/reset_password/'); ?> " class="<?php if($segment === "reset_password"){ echo 'menu-top-active';} ?>">RESET PASSWORD <i class="fa fa-key fa-lg"></i></a></li>
                            <li><a href="<?php echo base_url() .'home/backend/logout'; ?>">LOG OUT <i class="fa fa-sign-out fa-lg"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>