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
      //  $acces = $access;
     ?>
    <!-- LOGO HEADER END-->
   
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo site_url('admin'); ?>" class="<?php if(empty($segment)){ echo 'menu-top-active';} ?> " >DASHBOARD  <i class="fa fa-home fa-lg"></i></a></li>
                            <li><a href="<?php echo site_url('admin/profile'); ?>" class="<?php if($segment === "profile"){ echo 'menu-top-active';} ?>"">PROFILE <i class="fa fa-user fa-lg"></i></a></li>
                             <li>
                                <a href="" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">MENU ADMIN<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('admin/user'); ?>">USER</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('admin/menu'); ?>">Menu</a></li>
                                                                
                                </ul>
                                 
                            </li>
                            <li><a href="<?php echo site_url('admin/reset_password'); ?>" class="<?php if($segment === "reset_password"){ echo 'menu-top-active';} ?>">RESET PASSWORD <i class="fa fa-key fa-lg"></i></a></li>
                            <li><a href="<?php echo base_url() .'home/backend/logout'; ?>">LOG OUT <i class="fa fa-sign-out fa-lg"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>