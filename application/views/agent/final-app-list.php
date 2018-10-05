
			<div class="page-content-wrapper">
                <div class="page-content">
                    
					<div class="row">
                       <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                     <header>Patient History</header>
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
												<th>Action</th>
												
                                            </tr>
                                        </thead>
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
												
                                                   <td class="valigntop">
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                           
                                                           
															<li>
                                                                <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['b_id'])).'/'.base64_encode(htmlentities($list['event_status']));?>');adminstatus('<?php echo $list['event_status'];?>')" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                                                    <i class="fa fa-edit"></i><?php if($list['event_status']==1){ echo "Received";}else{ echo "Not Received"; } ?> </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </td>			
												  	

                                            </tr>
											<?php $cnt++;} ?>
                                        </tbody>
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
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <button type="button" aria-label="Close" data-dismiss="modal" class="btn  blueBtn">Cancel</button>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="?id=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
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
			<script>
$(document).ready(function() {
    $('#example4').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );

 function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('agent/status/'); ?>"+"/"+id);
}
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to Not Received');
		
	}if(id==2){
			$('#content1').html('Are you sure you want to Received');
	}
}
</script>