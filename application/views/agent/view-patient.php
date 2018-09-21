

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="pull-left" class="modal-title">Confirmation</h4>
               <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
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
						<?php $cnt=1;foreach($app_appointment_view_list as $lis){ ?>
                                <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $lis['patinet_name']; ?></td>
                                            <td><?php echo $lis['mobile']; ?></td>
                                    <td>
                                        <ol>
                                            <li><?php echo $lis['hos_bas_name']; ?><i class="fas fa-circle fa-1x text-success"></i></li>
                                           
                                        </ol>
                                    </td>
                                    <td><?php echo $lis['t_name']; ?></td>
                                               
                                   <td><?php echo $lis['date']; ?></td>
								   <td><?php echo $lis['time']; ?></td>
                                </tr>
							<?php $cnt++;} ?>
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


