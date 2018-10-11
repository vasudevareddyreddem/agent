
			<div class="page-content-wrapper">
                <div class="page-content">
                    
					<div class="row">
                       <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                     <header>Finalized Appointment List</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <table id="saveStage" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
												<th>Patient Name</th>
                                                <th>Mobile No </th>
                                                <th>Hospital Name</th>
                                                <th>Department</th>
                                                <th>Appointment Date&Time </th>
												<th>Patient Appointment</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
										<?php if(isset($appointments) && count($appointments)>0){ ?>
                                        <?php $cnt=1;foreach($appointments as $list){ ?>
										
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $list['patinet_name']; ?></td>
                                                <td><?php echo $list['mobile']; ?></td>
                                                <td>
												<?php foreach($list['hospital_list'] as $li){ ?>
												<?php echo $li['hos_bas_name']; ?>
												<?php } ?>
												</td>
                                                 <td><?php echo $list['t_name']; ?></td> 
                                                <td><?php echo $list['date']; ?>&nbsp;<?php echo $list['time']; ?></td>
								   <td><?php  if($list['event_status']==1){  echo "Recived";}else if($list['event_status']==2){  echo "Not Recived";}?></td>
												<td>
								   <div class="btn-group">
                                             <button class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                             <i class="fa fa-angle-down"></i>
                                             </button>
                                             <ul class="dropdown-menu pull-left" role="menu" style="padding:5px;">
											 
                                                             <li>
															
                                                                <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['b_id'])).'/'.base64_encode(htmlentities($list['event_status']));?>');adminstatus('<?php echo $list['event_status'];?>')" href="javascript:void(0)" data-toggle="modal" data-target="#myModal2">
                                                                <i class="fa fa-thumbs-up"><?php ?></i>Recived</a>
                                                           </li>
															
															 
													           <li>
															   
                                                                <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['b_id'])).'/'.base64_encode(htmlentities($list['event_status']));?>');adminstatus('<?php echo $list['event_status'];?>')" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                                                <i class="fa fa-thumbs-down"></i>Not Recived</a>
															
                                                            </li>
															
                                             </ul>
                                          </div>
										  </td>

                                            </tr>
											<?php $cnt++;} ?>
                                        </tbody>
										<?php } else{ ?>
								<div>No data available</div>
								<?php } ?>
                                    </table>
                                </div>
								<div class="clearfix">&nbsp;</div>
								
								
		
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div style="padding:10px">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="pull-left" class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="defaultForm" method="post" action="<?php echo base_url('agent/formpost'); ?>">
                            <div id="content1" class="col-lg-12 form-group">
                                Are you sure ?
                            </div>

                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="reason" id="reason" placeholder="Enter reason" value="">
                            </div>
                            <br>
                            <div class="col-lg-12">
							<input type="hidden" name="b_id" id="b_id" class="popid" value="">
                                <button type="button" aria-label="Close" data-dismiss="modal" class="btn blueBtn float-right">Cancel</button>
                            </div>
							<button type="submit" class="btn btn-primary" name="Submit" value="Submit">Submit</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div style="padding:10px">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="pull-left" class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="defaultForm" method="post" action="<?php echo base_url('agent/formpost'); ?>">
                            <div id="content1" class="col-lg-12 form-group">
                                Are you sure ?
                            </div>

                             <div class="col-lg-12">
							<input type="hidden" name="b_id" id="b_id" class="popid" value="">
                                <a href="?id=value" class="btn blueBtn popid"><span aria-hidden="true">Ok</span></a>
                                <button type="button" aria-label="Close" data-dismiss="modal" class="btn blueBtn float-right">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
								
                            </div>
                        </div>
                    </div>
				
                    </form>
                </div>
            </div>
			<script>
$(document).ready(function() {
    $('#example4').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );

 function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('agent/status/'); ?>"+"/"+id);
	$("#b_id").val(id);
}
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to Not Received');
		
	}if(id==2){
			$('#content1').html('Are you sure you want to Received');
	}
}




</script>
<script>
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
           
			
            
			reason: {
                validators: {
					notEmpty: {
						message: 'reason is required'
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



