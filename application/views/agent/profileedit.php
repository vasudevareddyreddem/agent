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