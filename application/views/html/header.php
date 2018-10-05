<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Hospital Agent</title>
	<!-- google font -->
     <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="<?php echo base_url(); ?>assets/vendor/assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><!--bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendor/assets/tether/css/tether.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/vendor/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/vendor/css/bootstrapValidator.min.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
	 <link href="<?php echo base_url(); ?>assets/vendor/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
	<link rel="<?php echo base_url(); ?>assets/vendor/stylesheet" href="assets/material/material.min.css">
	<link rel="<?php echo base_url(); ?>assets/vendor/stylesheet" href="css/material_style.css">
	<!-- Theme Styles -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/theme-color.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/vendor/assets/select2/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/assets/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
	  <script src="<?php echo base_url(); ?>assets/vendor/assets/jquery.min.js" ></script>
    
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-indigo white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="<?php echo base_url('Agent/patient'); ?>">
                    
                    <span class="logo-default" >Agent Flow</span> </a>
                </div>
                <!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
                 <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                          <a href="javascript:;" class="btn submit">
                             <i class="icon-magnifier"></i>
                           </a>
                        </span>
                    </div>
                </form>
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                    	<!-- start language menu -->
                       
                        <!-- end language menu -->
                        <!-- start notification dropdown -->
                     
                        <!-- end notification dropdown -->
                        <!-- start message dropdown -->
 						
                        <!-- end message dropdown -->
 						<!-- start manage user dropdown -->
 						<li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                               
						<?php if($userdetails['profile_pic']!=''){?>
							<img src="<?php echo base_url('assets/adminprofilepic/'.$userdetails['profile_pic']);?>" class="img-circle" alt="<?php echo htmlentities($userdetails['profile_pic']); ?>" />
							<?php }else{ ?>
							 <img src="<?php echo base_url();?>assets/vendor/img/dp.jpg" class="img-circle" alt="User Image" />
							<?php } ?>
                               
								<span class="username username-hide-on-mobile">  <?php echo isset($userdetails['name'])?htmlentities($userdetails['name']):''; ?> </span>
								
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url('agent/profile'); ?>">
                                        <i class="icon-user"></i> Profile </a>
                                </li>
                             
                                <li class="divider"> </li>
                                <li>
                                    <a href="<?php echo base_url('Agent/changepassword'); ?>">
                                        <i class="icon-settings"></i> Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Agent/logout'); ?>">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
								
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                       
                    </ul>
                </div>
            </div>
        </div>
      
    </div>
   <?php if($this->session->flashdata('success')): ?>
				<div class="alert_msg1 animated slideInUp bg-succ">
				<?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>
				<div class="alert_msg1 animated slideInUp bg-warn">
				<?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-warning ico_bac" aria-hidden="true"></i>
				</div>
			<?php endif; ?>