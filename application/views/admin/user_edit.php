<?php
if($method == "add"){
	$html_head['title'] = "Add user";
}else{
	$html_head['title'] = "Edit user";
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
			<div class="mr10 ml10">
				<?php if(validation_errors()){ ?>
					<ul class="error">
					<?php echo validation_errors(); ?>
					</ul>
				<?php } ?>
				<?php $this->session->flashdata('msg'); ?>
			</div>
	        <!-- form start -->
       		<?php echo form_open('', ['role' => 'form', 'method' => 'post', 'id' => 'form_member', 'autocomplete' => 'off']); ?>
		        <div class="box-body">
			        <!-- select -->
			        <div class="form-group">
			        <label>Permission</label>
				        <?php if(is_admin_master()){?>
						<?php echo form_dropdown("user[role]", enum_select("user", "role"), set_value("user[role]", @$user->role), ['class' => 'form-control']); ?>
						<?php }else{ ?>
						<input type="text" name="user[role]" value="<?php echo $user->role; ?>" readonly= "true" style="border:none; background: #fff" />
						<?php } ?>	
			        </div>

			        <!-- text input -->
			        <div class="form-group <?php if(form_error('user[mail_address]')) echo 'has-error'; ?>">
			          <label>Email</label>
			          <input name="foilautofill" style="display: none;" type="text" />
			          <input type="text" name="user[mail_address]" <?php if(form_error('user[mail_address]')) echo 'id="inputError"'; ?> value="<?php echo set_value('user[mail_address]', @$user->mail_address); ?>" class="form-control" />
			        </div>
					<div class="form-group <?php if(form_error('user[password]')) echo 'has-error'; ?>">
						<label>Password</label>
						<input name="foilautofill" style="display: none;" type="text" />
			            <input type="password" name="user[password]" <?php if(form_error('user[password]')) echo 'id="inputError"'; ?> class="form-control" autocomplete="off" />
			        </div>
			        <div class="form-group <?php if(form_error('password_confirm')) echo 'has-error'; ?>">
						<label>Password confirm</label>
			            <input type="password" name="password_confirm" <?php if(form_error('password_confirm')) echo 'id="inputError"'; ?> class="form-control" autocomplete="off" />
			        </div>
			        <div class="form-group <?php if(form_error('user[name]')) echo 'has-error'; ?>">
			          	<label>Name</label>
						<?php echo form_input(['name' => 'user[name]', 'value' => set_value('user[name]', @$user->name), 'class' => 'form-control']); ?>
			        </div>
			    </div><!-- /.box-body -->
			    <div class="box-footer">
			    	<?php echo form_hidden('id', set_value('id', @$user->id));  ?>
		            <input type="submit" name="submit[confirm]" class="btn btn-primary" />
		        </div>
	      	<?php echo form_close();?>
	    </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>