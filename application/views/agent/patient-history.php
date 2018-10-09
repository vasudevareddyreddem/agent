
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
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php if(isset($patient_history) && count($patient_history)>0){ ?>
										<?php  foreach($patient_history as $list){?>
										<?php $cnt=1; foreach($list['patient_history_list'] as $li){ ?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                               <td><?php echo $li['patinet_name']; ?></td>
                                                <td><?php echo $li['mobile']; ?></td>
                                                <td><?php echo $li['hos_bas_name']; ?></td>
                                                 <td><?php echo $li['t_name']; ?></td> 
                                                <td><?php echo $li['date']; ?>&nbsp;<?php echo $li['time']; ?></td>
                                                
                                            </tr>
                                           
                                            
                                           
										<?php $cnt++;} ?>
										<?php }?>
                                        </tbody>
										<?php } else{ ?>
								<div>No data available</div>
								<?php } ?>
										
										
                                    </table>
                                </div>
								<div class="clearfix">&nbsp;</div>
                            </div>
                        </div>
                    </div>
				
                    
                </div>
            </div>
