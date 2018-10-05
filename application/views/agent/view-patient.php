
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
               
              
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="" class="col-xs-12 col-xl-12 form-group">
                        <table id="" class="table" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Mobile No </th>
                                    <th>Hospital Name</th>
                                    <th>Department</th>
                                    <th>Appointment Date&Time </th>
                                </tr>
                            </thead>
                            <tbody>
							
                                <tr>
                                    <td><?php echo $app_appointment_view_list['patinet_name']; ?></td>
                                    <td><?php echo $app_appointment_view_list['mobile']; ?></td>
                                    <td>
                                        <ol>
											<?php foreach($app_appointment_view_list['hospital_list'] as $li){ ?>
												<?php if($li['status']==1){ ?>
													  <li><?php echo $li['hos_bas_name']; ?> <i class="fas fa-circle fa-1x text-success"></i></li>

												<?php }else{ ?>
													<li><?php echo $li['hos_bas_name']; ?> <i class="fas fa-circle fa-1x text-danger"></i></li>
												<?php  }?>
												
										   <?php }?>
                                        </ol>
                                    </td>
                                    <td><?php echo $app_appointment_view_list['t_name']; ?></td>
                                     <td><?php echo $app_appointment_view_list['date']; ?>&nbsp;<?php echo $app_appointment_view_list['time']; ?></td>
                                </tr>
								
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <a  href="<?php echo base_url('agent/patient/');  ?>" type="button" class="btn btn-default" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
