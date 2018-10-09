<?php //echo '<pre>';print_r($admin_detail);exit; ?>

<div class="page-content-wrapper">
                <div class="page-content" >
						<div class="page-bar">
						  <div class="page-title-breadcrumb">
							 <div class=" pull-left">
								<div class="page-title">Profile Details</div>
							 </div>
							 <ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								
								<li class="active">Profile Details</li>
							 </ol>
						  </div>
						</div>
						
					 <div class="row" style="margin-top:50px;">
                       
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-topline-yellow">
                                <div class="card-head">
                                    <header>View</header>
									<a  href="<?php echo base_url('agent/edit/'.base64_encode($agent_detail['e_id'])); ?>" enctype="multipart/form-data">>Edit</a>
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
													 </div>
													</div>
													
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Address</strong>
														 </div>
														<div class=" col-sm-6">
														    <?php echo isset($agent_detail['address'])?$agent_detail['address']:''; ?>
														 </div>
													 </div>
													</div>
													
													
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Bank Account Number</strong>
														 </div>
														<div class=" col-sm-6">
														    <?php echo isset($agent_detail['bank_account'])?$agent_detail['bank_account']:''; ?>
														 </div>
													 </div>
													</div>
													
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Bank Name</strong>
														 </div>
														<div class=" col-sm-6">
														    <?php echo isset($agent_detail['bank_name'])?$agent_detail['bank_name']:''; ?>
														 </div>
													 </div>
													</div>
													
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Bank Ifsc Code</strong>
														 </div>
														<div class=" col-sm-6">
														    <?php echo isset($agent_detail['ifsccode'])?$agent_detail['ifsccode']:''; ?>
														 </div>
													 </div>
													</div>
													
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Bank Account Holder Name</strong>
														 </div>
														<div class=" col-sm-6">
														    <?php echo isset($agent_detail['bank_holder_name'])?$agent_detail['bank_holder_name']:''; ?>
														 </div>
													 </div>
													</div>
													
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Kyc</strong>
														 </div>
														<div class=" col-sm-6">
														  <?php if($agent_detail['kyc']!=''){ ?>
														  <input type="file" <?php echo base_url('assets/kyc_documents/'.$agent_detail['kyc']); ?>" height="50px" width="50px">
														  <?php } ?>
														 </div>
														
													 </div>
													</div>
													
													
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Location</strong>
														 </div>
														<div class=" col-sm-6">
														   <?php echo isset($agent_detail['location'])?$agent_detail['location']:''; ?>
														 </div>
													 </div>
													</div>
													
													<div class="col-md-6">
													<div class="row">												  
														 <div class=" col-sm-6">
														 <strong>Photo</strong>
														 </div>
														<div class=" col-sm-6">
														  <?php if($agent_detail['profile_pic']!=''){ ?>
														  <img src="<?php echo base_url('assets/adminprofilepic/'.$agent_detail['profile_pic']); ?>" height="50px" width="50px">
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