<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>AdminLTE 2 | Log in</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- Bootstrap 3.3.2 -->
	<link href="<?php echo ADMIN_THEME;?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="<?php echo ADMIN_THEME;?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<!-- iCheck -->
	<link href="<?php echo ADMIN_THEME;?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo ADMIN_THEME;?>css/admin.css" rel="stylesheet" type="text/css" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
    	<div class="login-box">
    		<div class="login-logo">
    			<a href="/admin/"></a>
    		</div><!-- /.login-logo -->
    		<div class="login-box-body">
    			<p class="login-box-msg"><img src="<?php echo ADMIN_THEME;?>img/admin.jpg" width="200" /></p>
    			<?php echo $this->session->flashdata('error');  ?>
    			<?php echo form_open("", array('autocomplete' => 'off'));?>
    			<div class="form-group has-feedback">
    				<input name="foilautofill" class="noDisplay" type="text" />
    				<input type="text" autocomplete="off" id="admin_mail_address" name="admin_mail_address" class="form-control" placeholder="Email"/>
    				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    				<?php echo form_error('admin_mail_address'); ?>
    			</div>
    			<div class="form-group has-feedback">
    				<input name="foilautofill" class="noDisplay" type="text" />
    				<input type="password" autocomplete="off" id="admin_password" name="admin_password" class="form-control" placeholder="Password"/>
    				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
    				<?php echo form_error('admin_password'); ?>
    			</div>
    			<div class="row">
    				<div class="col-xs-8">                       
    				</div><!-- /.col -->
    				<div class="col-xs-4">
    					<button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    				</div><!-- /.col -->
    			</div>
    			<?php echo form_close();?>

    		</div><!-- /.login-box-body -->
    	</div><!-- /.login-box -->

    	<!-- jQuery 2.1.3 -->
    	<script src="<?php echo ADMIN_THEME;?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
    	<!-- Bootstrap 3.3.2 JS -->
    	<script src="<?php echo ADMIN_THEME;?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    	<!-- iCheck -->
    	<script src="<?php echo ADMIN_THEME;?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    	<script>
    		$(function () {
    			$('input').iCheck({
    				checkboxClass: 'icheckbox_square-blue',
    				radioClass: 'iradio_square-blue',
		          increaseArea: '20%' // optional
		      });
    		});
    	</script>
    </body>
    </html>