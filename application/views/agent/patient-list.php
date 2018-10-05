
			<div class="page-content-wrapper">
                <div class="page-content">
                    
					<div class="row">
                       <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                     <header>Patient List</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
								
								<?php if(isset($location_wise_list) && count($location_wise_list)>0){ ?>
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
                                        <tbody>
										<?php $cnt=1;foreach($location_wise_list as $list){ ?>
										
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $list['patinet_name']; ?></td>
                                                <td><?php echo $list['mobile']; ?></td>
                                                <td>
												<?php if(isset($list['hospital_list']) && count($list['hospital_list'])>0){ ?>
                                                    <ol>
														<?php foreach($list['hospital_list'] as $li){ ?>
                                                        <li><?php echo $li['hos_bas_name']; ?></li>
														<?php } ?>
                                                        
                                                    </ol>
												<?php } ?>
                                                </td>
                                                <td><?php echo $list['t_name']; ?></td>
                                               
                                                <td><?php echo $list['date']; ?>&nbsp;<?php echo $list['time']; ?></td>
                                                <td class="valigntop">
                                                    <div class="btn-group">
														  <a href="<?php echo base_url('agent/view/'.base64_encode($list['b_id']));?>" class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin" data-toggle="tooltip"><i class="fas fa-eye"></i>View</a>
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                          
											<?php $cnt++;} ?>
											
                                        </tbody>
                                    </table>
									
								<?php } else{ ?>
								<div>No data available</div>
								<?php } ?>
                                </div>
								<div class="clearfix">&nbsp;</div>
                            </div>
                        </div>
                    </div>
				
                    
                </div>
            </div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="pull-left" class="modal-title">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="" class="col-xs-12 col-xl-12 form-group">
                        <table id="" class="table" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Patient Name</th>
                                    <th>Mobile No </th>
                                    <th>Hospital Name</th>
                                    <th>Department</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
							
                                <tr>
                                    <td>1</td>
                                    <td>xxxxx</td>
                                    <td>xxxxxx</td>
                                    <td>
                                        <ol>
                                            <li>xxxxxxx <i class="fas fa-circle fa-1x text-success"></i></li>
                                            <li>xxxxxxx <i class="fas fa-circle fa-1x text-danger"></i></li>
                                            <li>xxxxxxx <i class="fas fa-circle fa-1x text-success"></i></li>
                                            <li>xxxxxxx <i class="fas fa-circle fa-1x text-danger"></i></li>
                                        </ol>
                                    </td>
                                    <td>xxxx</td>
                                    <td>xxxx</td>
                                    <td>xxxx</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

