<div class="page-content-wrapper">
    <div class="page-content">

        <div class="row">
            <div class="col-md-12">
                <div class="card card-topline-aqua">
                    <div class="card-head">
                        <header>Patient Details</header>
                    </div>
                    <div class="card-body ">
                        
                        <div class="table-responsive">
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
                                        <td>
                                            <?php echo $app_appointment_view_list['patinet_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $app_appointment_view_list['mobile']; ?>
                                        </td>
                                        <td>
                                            <?php if($app_appointment_view_list['status']==1){ ?>
                                            <?php echo $app_appointment_view_list['hos_bas_name']; ?> <i class="fa fa-circle fa-1x text-success"></i>

                                            <?php }else{ ?>
                                            <?php echo $app_appointment_view_list['hos_bas_name']; ?> <i class="fa fa-circle fa-1x text-danger"></i>
                                            <?php  }?>
                                        </td>
                                        <td>
                                            <?php echo $app_appointment_view_list['t_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $app_appointment_view_list['date']; ?>&nbsp;
                                            <?php echo $app_appointment_view_list['time']; ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <a href="<?php echo base_url('agent/patient/');  ?>" type="button" class="btn btn-primary btn-sm">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>