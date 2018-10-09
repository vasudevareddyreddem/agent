
<?php //echo '<pre>';print_r($executive_list);exit; ?>
<div class="page-content-wrapper">
   <div class="page-content" >
      <div class="page-bar">
         <div class="page-title-breadcrumb">
            <div class=" pull-left">
               <div class="page-title">Executive</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
               <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
               </li>
               <li class="active">Executive</li>
            </ol>
         </div>
      </div>
   
         <div class="panel tab-border card-topline-green">
            <header class="panel-heading panel-heading-gray custom-tab ">
               <ul class="nav nav-tabs">
                  <li class="nav-item"><a href="#tab1" data-toggle="tab" class="<?php if(isset($tab) && $tab ==''){ echo "active"; } ?>">Add Executive</a>
                  </li>
                  <li class="nav-item"><a href="#tab2" data-toggle="tab" class="<?php if(isset($tab) && $tab ==1){ echo "active"; } ?>">Executive List</a>
                  </li>
                   <li class="nav-item"><a href="#tab3" data-toggle="tab" class="<?php if(isset($tab) && $tab ==2){ echo "active"; } ?>">Executive Table</a>
                  </li>
				  
				  
               </ul>
            </header>
            <div class="panel-body">
               <div class="tab-content">
                    <div class="tab-pane <?php if(isset($tab) && $tab==''){  echo "active";} ?>" id="tab1">
				  <div class="container">
                     
					 <form id="defaultForm" method="post" class="" action="<?php echo base_url('Executive/indexpost');  ?>"  enctype="multipart/form-data">
								<div class="row">
								<div class="col-md-6">
									<label> Name</label>
								<input class="form-control" id="name" name="name" type="text" placeholder=" Enter Name">
								</div>
								
								<div class="col-md-6">
									<label>Mobile</label>
								<input class="form-control" id="mobile" name="mobile" type="text" placeholder="Enter Mobile">
								</div>
								<div class="col-md-6">
									<label>Email Address</label>
								<input class="form-control" id="email_id" name="email_id"  type="text" placeholder=" Enter Email Address">
								</div>
								<div class="col-md-6">
									<label>Password</label>
								<input class="form-control" id="password" name="password"  type="password" placeholder=" Enter Password">
								</div>
								<div class="col-md-6">
									<label> Confirm Password</label>
								<input class="form-control" id="org_password" name="org_password" value="" type="password" placeholder="Enter Confirm Password">
								</div>
								<div class="col-md-6">
									<label> Address</label>
								<input class="form-control" id="address" name="address"  type="text" placeholder="Enter Address">
								</div>
								<div class="col-md-6">
									<label> Bank Account Number</label>
									<input class="form-control" id="bank_account" name="bank_account"  type="text" placeholder="Enter Bank Account Number">
								</div>
								<div class="col-md-6">
									<label> Bank Name</label>
									<input class="form-control" id="bank_name" name="bank_name"  type="text" placeholder="Enter Bank Name">
								</div>
								<div class="col-md-6">
									<label> Bank Ifsc Code</label>
									<input class="form-control" id="ifsccode" name="ifsccode"  type="text" placeholder="Enter Bank Ifsc Code">
								</div>
								<div class="col-md-6">
									<label> Bank Account Holder Name</label>
									<input class="form-control" id="bank_holder_name" name="bank_holder_name"  type="text" placeholder="Enter Bank Account Holder Name">
								</div>
                                     <div class="col-md-6">
									<label> Kyc</label>
									<input class="form-control" id="kyc" name="kyc"  type="file" placeholder="Bank Account Holder Name" >
								</div>
								
								<div class="col-md-6">
									<label>Location</label>
									<input class="form-control" id="location" name="location" type="text" placeholder="Enter Location">
								</div>
								
								</div><br>
								<div class="">
								<label>&nbsp;</label>
								<button type="submit" class="btn btn-sm btn-success pull-right" type="button">Add</button>
								</div>	
							
							</form>
						
					
                     </div>
                  </div>
                   
                   <div class="tab-pane  <?php if(isset($tab) && $tab==1){  echo "active";} ?>" id="tab2">
                     <div class="container">
                        <div class="row">
                            <div class="col-md-12">
								<div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
										<label class=" control-label">Executive Name</label>
									<div class="">
									<select id="name" name="name" class="form-control" >
										<option value="">Select</option>
										<?php if(isset($executive_name) && count($executive_name)>0){ ?>
											<?php foreach($executive_name as $list){ ?>
												<option value="<?php echo $list['e_id']; ?>"><?php echo $list['name']; ?></option>
												
											<?php } ?>
								<?php } ?>
									</select>
									</div>
								</div>
                                        </div>

                                         <div class="col-md-6">
                                         <div class="form-group">
										<label class=" control-label">Location</label>
									<div class="">
									<select id="location" name="location" class="form-control" >
										<option value="">Select</option>
										<?php if(isset($executive_location) && count($executive_location)>0){ ?>
											<?php foreach($executive_location as $list){ ?>
												<option value="<?php echo $list['e_id']; ?>"><?php echo $list['location']; ?></option>
												
											<?php } ?>
										<?php } ?>
									</select>
									</div>
								</div>
                                        </div>
                                </div>
                            <div class="card card-topline-aqua active">
                                
                                <div class="card-body ">
                                    <table id="saveStage" class="display" style="width:100%;">
                                        <thead>
										
                                            <tr>
											    <th>S.no</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
												<th>Email Address</th>
                                                <th>Address</th>
                                                <th>Location<th>
                                                <th>Status<th>
												<th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $cnt=1;foreach($executive_list as $list){ ?>
				                            <tr>
                                                 <td><?php echo $cnt; ?></td>
                                                <td><?php echo $list['name']; ?></td>
                                                <td><?php echo $list['mobile']; ?></td>
                                                <td><?php echo $list['email_id']; ?></td>
                                                <td><?php echo $list['address']; ?></td>
                                                <td><?php echo $list['location']; ?></td>
												<td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
												<td>
						                       <a href="<?php echo base_url('Executive/edit/'.base64_encode($list['e_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									          <a href="<?php echo base_url('Executive/executivestatus/'.base64_encode($list['e_id']).'/'.base64_encode($list['status'])); ?>" data-toggle="tooltip" title="status"><i class="fa fa-info-circle btn btn-warning"></i></a> 
						                       <a href="<?php echo base_url('Executive/delete/'.base64_encode($list['e_id']));?>"  data-toggle="tooltip" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
					                             </td>
												
                
											
										<?php $cnt++;} ?>
										 </tr>
                                        </tbody>
										
                                    </table>
                                </div>
								<div class="clearfix">&nbsp;</div>
                                <div class="text-center">
                                    <div class="col-md-12">
                                        <a href="financial.php" class="btn btn-info">Save</a>
                                        <a href="#"type="button" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                       
                     </div>
                  </div>
                   
                   <div class="tab-pane  <?php if(isset($tab) && $tab==2){  echo "active";} ?>" id="tab3">
                     <div class="container">
                        <div class="row">
                            <div class="col-md-12">
								<div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
										<label class=" control-label">Agent Name</label>
									<div class="">
									<select id="name" name="name" class="form-control" >
										<option value="">Select</option>
										<option value="">xxxxx</option>
										<option value="">xxxxx</option>
										<option value="">xxxxx</option>
										<option value="">xxxxx</option>
									</select>
									</div>
								</div>
                                        </div>
                                </div>
                            <div class="">
                                
                                <div class="card-body ">
                                    <table id="saveStage" class="table table-bordered display" style="width:100%;">
                                        <thead>
                                            <tr>
											    <th>S.no</th>
                                                <th>Date</th>
                                                <th>Total Patients</th>
												<th>Received Patients</th>
                                                <th>Not Received Patients</th>
                                                <th>Login Time</th>
                                                <th>Logout Time</th>
												<th>Patient List</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>xxxxxx</td>
                                                <td>xxxxxx</td>
                                                <td>xxxxxx</td>
                                                <td class="valigntop">
                                                    <button class="btn btn-xs deepPink-bgcolor no-margin" type="button" data-toggle="modal" data-target="#myModal1">View</button>
                                                </td>
                                                <td>xxxxxx</td>
                                                <td>xxxxxx</td>
                                                <td class="valigntop">
                                                    <button class="btn btn-xs deepPink-bgcolor no-margin" type="button" data-toggle="modal" data-target="#myModal2">View</button>
                                                </td>
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
            <div class="clearfix">&nbsp;</div>
       
      </div>
   </div>
</div>

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="max-width:600px;">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header" style="padding:10px">
                <h4 style="pull-left" class="modal-title">Not Received Ptients Reason</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="saveStage" class="table table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>xxxxxxx</td>
                                <td>xxxxxx</td>
                                <td>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                            </tr>
                            <tr>
                                <td>xxxxxxx</td>
                                <td>xxxxxx</td>
                                <td>xxxxxxxxxxxxxxxxxxxxxxxxxxx
                                    xxxxxxxxxxxxxxxxxxxxxxxxxxx
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog" style="max-width:700px;">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header" style="padding:10px">
                <h4 style="pull-left" class="modal-title">Patient List</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="saveStage" class="table table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Patient Name</th>
                                <th>Mobile No </th>
                                <th>Hospital Name</th>
                                <th>Coupon Code</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>xxxxx</td>
                                <td>xxxxxx</td>
                                <td>xxxxx</td>
                                <td>xxxx</td>
                                <td>xxxx</td>
                                <td>xxxx</td>
                                <td>Received</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>xxxxx</td>
                                <td>xxxxxx</td>
                                <td>xxxxx</td>
                                <td>xxxx</td>
                                <td>xxxx</td>
                                <td>xxxx</td>
                                <td>Received</td>
                            </tr>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
</div>




 <script>
  
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
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
			
            email_id: {
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
			mobile: {
                 validators: {
					notEmpty: {
						message: 'Mobile Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 digits'
					}
				
				}
            },
			password: {
                validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },
           
           org_password: {
					 validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'password',
						message: 'password and confirm Password do not match'
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
            }
		   
			
        }
    });
    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });
    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
	
});
</script>
