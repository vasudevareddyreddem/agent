
			<div class="page-content-wrapper">
                <div class="page-content">
                    
					<div class="row">
                       <div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                     <header>Patient List</header>
                                   
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
                                                <td><?php  echo $list['hos_bas_name']; ?></td>
                                                <td><?php echo $list['t_name']; ?></td>
                                                <td><?php echo $list['date']; ?>&nbsp;<?php echo $list['time']; ?></td>
                                                <td class="valigntop">
                                                    <div class="btn-group">
														  <a href="<?php echo base_url('agent/view/'.base64_encode($list['b_id']).'/'.base64_encode($list['city']));?>" class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin" data-toggle="tooltip"><i class="fa fa-eye"></i>View</a>
                                                       
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

