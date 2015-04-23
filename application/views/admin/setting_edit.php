<?php
$html_head['title'] = "Setting system";
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager setting</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/setting/"><i class="fa fa-table"></i> Manager setting</a></li>
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
			</div>
			<?php if(isset($msg) && $msg){ echo '<ul class="success msg"><li>'.$msg.'</li></ul>'; }?>
	        <!-- form start -->
	        <?php echo form_open_multipart('/admin/setting/edit/'.@$setting->id, ['role' => 'form', 'class' => '']);?>
		        <div class="box-body">
			        <!-- text input -->
			        <div class="form-group <?php if(form_error('setting[title]')) echo 'has-error'; ?>">
			          <label>Title (max: 60 characters)</label>
			          <input type="text" name="setting[title]" value="<?php echo set_value('setting[title]', @$setting->title); ?>" class="form-control" />
			        </div>
			        <!-- textarea -->
			        <div class="form-group <?php if(form_error('setting[keywords]')) echo 'has-error'; ?>">
			          <label>Keywords (max: 160 characters)</label>
			          <textarea name="setting[keywords]" class="form-control" rows="3" ><?php echo set_value('setting[keywords]', @$setting->keywords); ?></textarea>
			        </div>

			        <!-- textarea -->
			        <div class="form-group <?php if(form_error('setting[description]')) echo 'has-error'; ?>">
			          <label>Description (max: 160 characters)</label>
			          <textarea name="setting[description]" class="form-control" rows="3" ><?php echo set_value('setting[description]', @$setting->description); ?></textarea>
			        </div>

					<!-- text input -->
			        <div class="form-group <?php if(form_error('setting[company_name]')) echo 'has-error'; ?>">
			          <label>Company name</label>
			          <input type="text" name="setting[company_name]" value="<?php echo set_value('setting[company_name]', @$setting->company_name); ?>" class="form-control" />
			        </div>

			        <!-- text input -->
			        <div class="form-group <?php if(form_error('setting[email]')) echo 'has-error'; ?>">
			          <label>Email</label>
			          <input type="text" name="setting[email]" value="<?php echo set_value('setting[email]', @$setting->email); ?>" class="form-control" />
			        </div>

			        <!-- text input -->
			        <div class="form-group <?php if(form_error('setting[phone]')) echo 'has-error'; ?>">
			          <label>Phone</label>
			          <input type="text" name="setting[phone]" value="<?php echo set_value('setting[phone]', @$setting->phone); ?>" class="form-control" />
			        </div>

			        <!-- text input -->
			        <div class="form-group <?php if(form_error('setting[hotline]')) echo 'has-error'; ?>">
			          <label>Hotline</label>
			          <input type="text" name="setting[hotline]" value="<?php echo set_value('setting[hotline]', @$setting->hotline); ?>" class="form-control" />
			        </div>

			        <!-- text input -->
			        <div class="form-group <?php if(form_error('setting[address]')) echo 'has-error'; ?>">
			          <label>Address</label>
			          <input type="text" name="setting[address]" value="<?php echo set_value('setting[address]', @$setting->address); ?>" class="form-control" />
			        </div>

			        <!-- text input -->
			        <div class="form-group <?php if(form_error('setting[map]')) echo 'has-error'; ?>">
			          <label>Google maps</label>
			          <input type="text" name="setting[map]" value="<?php echo set_value('setting[map]', @$setting->map); ?>" class="form-control" />
			        </div>
					
					<!-- textarea -->
			        <div class="form-group <?php if(form_error('setting[analytics]')) echo 'has-error'; ?>">
			          <label>Google analytics</label>
			          <textarea name="setting[analytics]" class="form-control" rows="3" ><?php echo set_value('setting[analytics]', @$setting->analytics); ?></textarea>
			        </div>
			    </div><!-- /.box-body -->
			    <div class="box-footer">
			    	<?php echo form_hidden('id', set_value('id', @$setting->id));  ?>
		            <input type="submit" name="submit[confirm]" class="btn btn-primary" />
		        </div>
	      	<?php echo form_close();?>
	    </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>
<!-- CK Editor -->
<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script type="text/javascript">
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
</script>