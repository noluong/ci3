<?php 
if($method == "add"){
	$html_head['title'] = "Confirm add user";
}else{
	$html_head['title'] = "Confirm edit user";
}
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager user</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/user/"><i class="fa fa-table"></i> Manager user</a></li>
    <li class="active"><?php echo $html_head['title']; ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
	        <div class="box-header">
	          	<h3 class="box-title"><?php echo $html_head['title']; ?></h3>
	        </div><!-- /.box-header -->
	        <!-- form start -->
	        <?php echo form_open("admin/user/confirm"); ?>
		        <div class="box-body">
				    <?php if(is_admin_master()){?>
			        <!-- select -->
			        <div class="form-group">
				        <label>Permission</label>
					    <div><?php echo $user->role ?></div>
			        </div>
					<?php } ?>	

			        <div class="form-group">
			          	<label>Email</label>
						<div><?php echo $user->mail_address; ?></div>
			        </div>
			        <div class="form-group">
			          	<label>Password</label>
						<div><?php echo "********";?></div>
			        </div>
			        <div class="form-group">
			          	<label>Name</label>
						<div><?php echo $user->name;?></div>
			        </div>
			    </div><!-- /.box-body -->
			    <div class="box-footer">
			    	<?php echo form_hidden('id', set_value('id', @$user->id));  ?>
			    	<input type="hidden" name="form_data" value="<?php echo (htmlspecialchars(serialize($user))); ?>"/>
		            <a class="btn btn-default" onclick="document.getElementById('backform').submit()">Back</a>
		            <input type="submit" name="submit[complete]" class="btn btn-primary" />
		        </div>
	      	<?php echo form_close();?>

	      	<?php echo form_open('admin/user/'.$action, array("id"=>"backform")); ?>
				<?php if(isset($user)): ?>
					<?php foreach ($user as $key => $value): ?>
						<?php if($key == "password"){ $value = @$form_password;} ?>
		                <input type="hidden" name = "user[<?php echo $key; ?>]" value = "<?php echo $value; ?>" />
		            <?php endforeach; ?>
					<input type="hidden" name = "password_confirm" value = "<?php echo @$form_password ?>" />
				<?php endif; ?>
				<input type="hidden" name="action" value="back" />
			<?php echo form_close();?>

	    </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>