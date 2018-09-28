<html>

<head>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/agent-login.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/vendor/css/custom.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/vendor/assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="<?php echo base_url(); ?>assets/vendor/assets/jquery.min.js" ></script>
	<script src="<?php echo base_url(); ?>http://localhost/agent/assets/vendor/assets/bootstrapValidator.min.js"></script>
</head>

<body>

<div class="container">
    <h1 class="page-header">Agent Login</h1>
    <div class="box">
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
        <h1>Login</h1>
		  <form id="loginform" name="loginform" action="<?php echo base_url('agent/loginpost'); ?>" method="post" enctype="multipart/form-data">
		  <?php $csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
						); ?>
        <div class="group">
            <input class="inputField" type="email" required id="email_id" name="email_id" value="<?php echo $this->input->cookie('email_id');?>">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label class="inputName">Email</label>
        </div>
        <div class="group">
            <input class="inputField" type="password" required id="password" name="password" value="<?php echo $this->input->cookie('password');?>" >
            <span class="highlight"></span>
            <span class="bar"></span>
            <label class="inputName">Password</label>
        </div>
		<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
        <button type="submit">Login</button>
		</form> 
        <a href="<?php echo base_url('agent/forgotpassword'); ?>">I forgot my password</a><br>
		
    </div>
	
	
   
</div>
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
<script type="text/javascript">
$(document).ready(function() {
   
    $('#loginform').bootstrapValidator({
//      
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
</body>
</html>
