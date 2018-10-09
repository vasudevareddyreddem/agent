<?php //echo '<pre>';print_r($admin_detail);exit; ?>

<div class="page-content-wrapper">
                <div class="page-content" >
						<div class="page-bar">
						  <div class="page-title-breadcrumb">
							 <div class=" pull-left">
								<div class="page-title">Profile Edit</div>
							 </div>
							 
						  </div>
						</div>
							 
					 <div class="row" style="margin-top:50px;">
                       
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-topline-yellow">
                                
                                <div class="card-body ">
											 <div class="col-sm-12">
										
											 <form id="editprofile" name="editprofile" action="<?php echo base_url('agent/editpost'); ?>" method="POST" enctype="multipart/form-data">
													 <div class="row">
												<div class="form-group col-md-6">
												   <label for="email">Name</label>
												   <input type="text" id="name" name="name" value="<?php echo isset($agent_detail['name'])?$agent_detail['name']:''; ?>" class="form-control"  placeholder="Enter Name" >
												</div>
												<div class="form-group col-md-6">
												   <label for="email">Email Id</label>
												   <input type="text" id="email_id" name="email_id" value="<?php echo isset($agent_detail['email_id'])?$agent_detail['email_id']:''; ?>"  class="form-control"  placeholder="Enter Email Id" >
												</div>
												<div class="form-group col-md-6">
												   <label for="email">Mobile Number</label>
												   <input type="text" id="mobile_number" name="mobile_number" value="<?php echo isset($agent_detail['mobile'])?$agent_detail['mobile']:''; ?>" class="form-control"  placeholder="Enter Mobile Number" >
												</div>
												
									<div class="col-md-6">
									<label> Address</label>
								 <input type="text" id="address" name="address" value="<?php echo isset($agent_detail['address'])?$agent_detail['address']:''; ?>" class="form-control"  placeholder="Enter Address" >	
								</div>
								<div class="col-md-6">
									<label> Bank Account Number</label>
								<input type="text" id="bank_account" name="bank_account" value="<?php echo isset($agent_detail['bank_account'])?$agent_detail['bank_account']:''; ?>" class="form-control"  placeholder="Enter Bank Account Number" >	

								</div>
								<div class="col-md-6">
									<label> Bank Name</label>
									<input type="text" id="bank_name" name="bank_name" value="<?php echo isset($agent_detail['bank_name'])?$agent_detail['bank_name']:''; ?>" class="form-control"  placeholder="Enter  Bank Name" >	

								</div>
								<div class="col-md-6">

									<label> Bank Ifsc Code</label>
									<input type="text" id="ifsccode" name="ifsccode" value="<?php echo isset($agent_detail['ifsccode'])?$agent_detail['ifsccode']:''; ?>" class="form-control"  placeholder="Enter  Bank Ifsc Code" >	
								</div>
								<div class="col-md-6">

									<label> Bank Account Holder Name</label>
									<input type="text" id="bank_holder_name" name="bank_holder_name" value="<?php echo isset($agent_detail['bank_holder_name'])?$agent_detail['bank_holder_name']:''; ?>" class="form-control"  placeholder="Enter Bank Account Holder Name" >	

								</div>
                                     <div class="col-md-6">
									<label> Kyc</label>
									<input class="form-control" id="kyc" name="kyc"  type="file" placeholder="Enter kyc" >
								</div>
								
								<div class="col-md-6">
									<label>Location</label>
									<input type="text" id="location" name="location" value="<?php echo isset($agent_detail['location'])?$agent_detail['location']:''; ?>" class="form-control"  placeholder="Enter Location" >	


								</div>
								 <div class="form-group col-md-6">
												   <label for="email">Profile Pic</label>
												   <input type="file" id="profile_pic" name="profile_pic"   class="form-control"  >
												</div>
												
												<div class="form-actions">
													<div class="row">
													   <div class="offset-md-11 col-md-1">
														  <button type="submit" class="btn btn-info">Update</button>
													   </div>
													</div>
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
					
	<script>
$(document).ready(function() {
    $('#editprofile').bootstrapValidator({
        
        fields: {
            
            name: {
                 validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumeric, space and dot'
					}
				}
            },
			 mobile_number: {
                validators: {
					notEmpty: {
						message: 'Mobile Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10,14}$/,
					message:'Mobile Number must be 10 to 14 digits'
					}
				
				}
            },email_id: {
                validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			
			address: {
                 validators: {
					notEmpty: {
						message: 'Address is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Address wont allow <> [] = % '
					}
				
				}
            },
			bank_account: {
                 validators: 
					{
					    
						regexp: 
						{
					     regexp:  /^[0-9]{9,16}$/,
					     message:'Bank Account  must be 9 to 16 digits'
					    }
				}
            },
			
			bank_name: {
                 validators: {
					
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:' Name of the bank wont allow <> [] = % '
					}
				
				}
            },
			
			ifsccode: {
                 validators: {
					
					regexp: {
					 regexp: /^[A-Za-z0-9]{4}\d{7}$/,
					message: 'IFSC Code must be alphanumeric'
					}
				}
            },
			bank_holder_name:{
			 validators: {
					
					regexp: {
					regexp: /^[a-zA-Z ]+$/,
					message: 'Bank Holder Name can only consist of alphabets and space'
					}
				}
            },
			
			kyc: {
                   validators: {
					regexp: {
					regexp: /\.(docx|doc|pdf|xlsx|xls)$/i,
					message: 'Uploaded file is not a valid. Only docx,doc,xlsx,pdf files are allowed'
					}
				}
            },
			location:{
			validators: {
					notEmpty: {
						message: 'location is required'
					}
				}
            },
			
			profile_pic: {
                 validators: {
					regexp: {
					regexp: "(.*?)\.(png|jpg|jpeg|gif|Png|PNG)$",
					message: 'Uploaded file is not a valid. Only png,jpg,jpeg,gif,Png,PNG files are allowed'
					}
				}
            }
            }
        })
     
});

</script>				
					
					
