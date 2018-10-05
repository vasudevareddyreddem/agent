<html>

<head>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/vendor/css/agent-login.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/custom.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/vendor/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	
	
	
    <link href="<?php echo base_url(); ?>assets/vendor/css/agent-login.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/custom.css" rel="stylesheet" type="text/css" />
	
    <!-- Bootstrap Core Css -->
    <script src="<?php echo base_url(); ?>assets/vendor/assets/bootstrap/js/bootstrap.min.js" ></script>
	 <script src="<?php echo base_url(); ?>assets/vendor/assets/bootstrap/js/bootstrap.min.js" ></script>
   
  

</head>
<style>
body {
    font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #292b2c;
    background-color:transparent;
}
.help-block{
	color:red;
}
</style>

    <body>
<div class="container">
		  <form id="defaultForm" name="defaultForm" action="<?php echo base_url('agent/forgotpost'); ?>" method="post" enctype="multipart/form-data">
		 <?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
						); ?>
    <div class="box"style="padding:25px;">
	<h2 class="page-header">Agent Forgot Password</h2>
						<div class="form-group">
                            <label class=" control-label">Email</label>
                            <div class="">
                                <input type="text" class="form-control" name="email_id" id="email_id" value="<?php echo $this->input->cookie('email_id');?>">
                            </div>
                        </div>
					
				<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
       <button  type="submit" class="btn btn-primary btn-block btn-flat">Forgot</button>
	   
		</form> 
		 </div>
		
   
	
	<?php if($this->session->flashdata('success')): ?>
				<div class="alert_msg1 animated slideInUp bg-succ">
				<?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('error')): ?>
				<div class="alert_msg1 animated slideInUp bg-warn">
				<?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-warning ico_bac" aria-hidden="true"></i>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('loginerror')): ?>
				<div class="alert_msg1 animated slideInUp bg-warn">
				<?php echo $this->session->flashdata('loginerror');?> &nbsp; <i class="fa fa-exclamation-triangle text-warning ico_bac" aria-hidden="true"></i>
				</div>
			<?php endif; ?>
           <script src="<?php echo base_url(); ?>assets/vendor/assets/jquery.min.js" ></script>

		
		    <script src="<?php echo base_url(); ?>assets/vendor/assets/bootstrapValidator.min.js" ></script>
</div>
  <script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        fields: {
            
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
            }
            
        }
    });

});
</script>
    <script>
        var cont = 0;

        function forgot(){

            cont++;
		
		if(cont==1){
            $('.box').css('display','none');
			$('.box.box1').css('display','block');
            
		}
		else
		{
			$('.show').css('display','none');
			cont = 0;
		}
}    
    
    </script>
</body>

</html>