<?php //echo '<pre>';print_r($admin_detail);exit; ?>

<div class="page-content-wrapper">
                <div class="page-content" >
						<div class="page-bar">
						  <div class="page-title-breadcrumb">
							 <div class=" pull-left">
								<div class="page-title">Profile Details</div>
							 </div>
							
						  </div>
						</div>
						
					 <div class="row" style="margin-top:50px;">
                       
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-topline-yellow">
                                <div class="card-head">
                                    <header>View</header>
									<a  href="<?php echo base_url('agent/edit/'.base64_encode($agent_detail['e_id'])); ?>">Edit</a>
                                </div>
                                <div class="card-body ">
											 <div class="col-sm-12">
												 <div class="row">
												  <div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Name</strong>
														 </div>
														 <div class=" col-sm-6">
														  <?php echo isset($agent_detail['name'])?$agent_detail['name']:''; ?>
														 </div>
													 </div>
													</div>
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Email Address</strong>
														 </div>
														<div class=" col-sm-6">
														  <?php echo isset($agent_detail['email_id'])?$agent_detail['email_id']:''; ?>
														 </div>
													 </div>
													</div>
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Mobile Number</strong>
														 </div>
														<div class=" col-sm-6">
														  <?php echo isset($agent_detail['mobile'])?$agent_detail['mobile']:''; ?>
														 </div>
														 <div class=" col-sm-6">
														 <strong>Photo</strong>
														 </div>
														 <div class=" col-sm-6">
														  <?php if($agent_detail['profile_pic']!=''){ ?>
														  <img src="<?php echo base_url('assets/adminpic/'.$agent_detail['profile_pic']); ?>" height="50px" width="50px">
														  <?php } ?>
														 </div>
													 </div>
													</div>
													
													
													
													
													
													
												</div>
												
												
												
												
											 </div>
											
									
										
                                    
								</div>
							</div>
						</div>
					</div>
                    </div>
                    </div>