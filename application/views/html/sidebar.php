<div class="page-container">
 			<!-- start sidebar menu -->
 			<div class="sidebar-container">
 				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
	                <div id="remove-scroll">
	                    <ul class="sidemenu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
	                        <li class="sidebar-toggler-wrapper hide">
	                            <div class="sidebar-toggler">
	                                <span></span>
	                            </div>
	                        </li>
	                        <li class="sidebar-user-panel">
	                            <div class="user-panel">
	                                <div class="pull-left image">
	                                    <?php if($userdetails['profile_pic']!=''){?>
														<img src="<?php echo base_url('assets/adminprofilepic/'.$userdetails['profile_pic']);?>" class="img-circle" alt="<?php echo htmlentities($userdetails['profile_pic']); ?>" />
														<?php }else{ ?>
														 <img src="<?php echo base_url();?>assets/vendor/img/dp.jpg" class="img-circle" alt="User Image" />
														<?php } ?>
	                                </div>
	                                  <div class="pull-left info">
	                                    <p> <?php echo isset($userdetails['name'])?$userdetails['name']:''; ?></p>
	                                    <a href="<?php echo base_url('agent/profile');?>"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
	                                </div>
	                            </div>
	                        </li>
                            <li class="nav-item  ">
	                            <a href="<?php echo base_url('agent/patient'); ?>" class="nav-link "> <i class="material-icons">person</i>
	                                <span class="title">Patient List</span> <span class="arrow"></span>
	                            </a>
	                        </li>
                            <li class="nav-item  ">
	                            <a href="<?php echo base_url('agent/finalappointment'); ?>" class="nav-link "> <i class="material-icons">person</i>
	                                <span class="title">Finalized Appointment List</span> <span class="arrow"></span>
	                            </a>
	                        </li>
                            <li class="nav-item  ">
	                            <a href="<?php echo base_url('agent/patientlist'); ?>" class="nav-link "> <i class="material-icons">person</i>
	                                <span class="title">Patient History</span> <span class="arrow"></span>
	                            </a>
	                        </li>
	                    </ul>
	                </div>
                </div>
            </div>
            <!-- end sidebar menu --> 
			
			